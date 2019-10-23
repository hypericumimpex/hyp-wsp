<?php

/*
 * Plugin Name: HYP WSP
 * Description: Send SMS or WhatsApp message to your customers or inform them about their WooCommerce order updates.
 * Version: 1.5.2
 * Plugin URI: https://github.com/hypericumimpex/hyp-wsp/
 * Author URI: https://github.com/hypericumimpex/
 * Author: Romeo C
 * Text Domain: wpnotif
 * Requires PHP: 5.5
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;


require dirname( __FILE__ ) . '/update/Puc/v4p6/Factory.php';
require dirname( __FILE__ ) . '/update/Puc/v4/Factory.php';
require dirname( __FILE__ ) . '/update/Puc/v4p6/Autoloader.php';
new Puc_v4p6_Autoloader();
update_option( 'wpnotif_purchasecode', '8699958a-77f3-4db8-9422-126b0836e1c5' );
update_option( 'wpnotif_license_type', 1 );
foreach (
	array(
		'Plugin_UpdateChecker'    => 'Puc_v4p6_Plugin_UpdateChecker',
		'Vcs_PluginUpdateChecker' => 'Puc_v4p6_Vcs_PluginUpdateChecker',
	)
	as $pucGeneralClass => $pucVersionedClass
) {
	Puc_v4_Factory::addVersion( $pucGeneralClass, $pucVersionedClass, '4.6' );

	Puc_v4p6_Factory::addVersion( $pucGeneralClass, $pucVersionedClass, '4.6' );
}


function wpnotif() {
	return WPNotif::instance();
}

wpnotif();

final class WPNotif {

	protected static $_instance = null;

	public static $version = '1.5.2';

	public static function get_version() {
		return WPNotif::$version;
	}

	/**
	 *  Constructor.
	 */
	public function __construct() {
		$this->init_hooks();
		require_once( 'includes/functions.php' );
		WPNotif_Handler::instance();


	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {
		add_action( 'wp_ajax_wpnotif_save_settings', array( $this, 'save_settings' ) );


		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_quick_sms_meta_box' ) );

		add_action( 'admin_bar_menu', array( $this, 'add_admin_wpnotif' ), 100 );

		add_action( 'admin_footer', array( $this, 'add_wp_footer' ), 100 );
		add_action( 'wp_footer', array( $this, 'add_wp_footer' ), 100 );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public static function add_wp_footer() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( ! WPNotif_Handler::isWhatsappWebEnabled() ) {
			return;
		}

		global $wpdb;

		$tb = $wpdb->prefix . 'wpnotif_whatsapp_messages';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$tb'" ) != $tb ) {
			return;
		}
		$messages = $wpdb->get_results(
			'SELECT * FROM ' . $tb . ' ORDER BY time ASC'
		);

		$nonce = wp_create_nonce( 'wpnotif' );
		?>
        <div class="wpnotif-box">
            <div class="wpnotif-list-head"><?php esc_attr_e( 'Pending WhatsApp Web Messages', 'wpnotif' ); ?></div>
            <input type="hidden" value="<?php echo esc_html( $nonce ); ?>" class="wpnotif_del_nonce"/>
			<?php
			$i = 0;
			foreach ( $messages as $message ) {
				$i ++;
				?>
                <div class="wpnotif-list wpnotif-pending-whatsapp-messages"
                     data-id="<?php echo esc_html( $message->id ); ?>"
                     data-mobile="<?php echo esc_html( $message->countrycode . $message->mobileno ); ?>">
                    <div class="wpnotif-inline wpnotif-float-left wpnotif-whatsapp-logo">
                        <div></div>
                    </div>
                    <div class="wpnotif-inline wpnoti-float-left wpnotif-whatsapp-message">

                        <div class="wpnotif-mobile">
                            +<?php echo esc_html( $message->countrycode . ' ' . $message->mobileno ); ?></div>
                        <div class="wpnotif-message"><?php echo esc_html( $message->message ); ?></div>
                    </div>
                    <div class="wpnotif-inline wpnotif-float-right wpnotif-whatsapp-send-parent">
                        <div class="wpnotif-center-align">
                            <div class="wpnotif-whatsapp-send"><?php esc_attr_e( 'Send', 'wpnotif' ); ?></div>
                        </div>
                    </div>

                </div>
				<?php
				if ( $i == 4 ) {
					$remaining_messages = ( count( $messages ) - 4 );
					if ( $remaining_messages < 1 ) {
						return;
					}
					?>
                    <div class="wpnotif-pending-messages">
                        <div class="content"><span><?php echo esc_html( $remaining_messages ); ?></span> more
                        </div>
                    </div>
					<?php
				}
			}
			?>
        </div>
		<?php

	}

	public function add_admin_wpnotif( $admin_bar ) {

		if ( ! WPNotif_Handler::isWhatsappWebEnabled() ) {
			return;
		}
		global $wpdb;

		$tb             = $wpdb->prefix . 'wpnotif_whatsapp_messages';
		$messages       = $wpdb->get_results(
			'SELECT * FROM ' . $tb . ' ORDER BY time DESC'
		);
		$total_messages = count( $messages );

		$admin_bar->add_menu( array(
			'id'     => 'wpnotif-pending-messages',
			'parent' => 'top-secondary',
			'title'  => '<span class="wp-notif-total_messages">' . $total_messages . '</span> Pending Messages',
			'href'   => '#',
			'meta'   => array(
				'title' => __( 'Pending Messages', 'wpnotif' ),
			),
		) );
	}

	public function add_quick_sms_meta_box() {
		add_meta_box( 'quick_sms_meta_box', esc_attr__( 'WPNotif Quick SMS' ), array(
			$this,
			'quick_sms_meta_box'
		), 'shop_order', 'side', 'core' );
	}

	public function quick_sms_meta_box() {
		global $post;

		$this->send_quick_sms_ui( $post->ID );
	}

	public function send_quick_sms_ui( $order_id = 0 ) {
		$nonce        = wp_create_nonce( 'wpnotif' );
		$user_consent = array();
		$show_trigger = true;

		?>
		<?php if ( $order_id != 0 ) {
			$order = new WC_Order( $order_id );

			$user_consent  = WPNotif_Handler::get_user_consent( $order, - 1 );
			$check_consent = $user_consent['check_consent'];
			if ( $check_consent == 1 ) {
				?>
                <div style="padding-bottom: 8px;"><?php esc_attr_e( 'User Consent', 'wpnotif' ); ?></div>
				<?php
				if ( $user_consent['sms_consent'] == 1 ) {
					?>
                    <div><input type="checkbox"
                                disabled="disabled" <?php if ( $user_consent['sms_notifications'] == 1 ) {
							echo 'checked';
						} ?>/> <?php esc_attr_e( 'SMS', 'wpnotif' ); ?></div>
					<?php
				}
				if ( $user_consent['whatsapp_consent'] == 1 ) {
					?>
                    <div><input type="checkbox"
                                disabled="disabled" <?php if ( $user_consent['whatsapp_notifications'] == 1 ) {
							echo 'checked';
						} ?>/> <?php esc_attr_e( 'Whatsapp', 'wpnotif' ); ?></div>
					<?php
				}
				if ( $user_consent['sms_notifications'] != 1 && $user_consent['whatsapp_notifications'] != 1 ) {
					$show_trigger = false;
				}
			}

			?>

			<?php
		} ?>
        <input type="hidden" class="wpnotif_nonce" value="<?php echo esc_attr( $nonce ); ?>"/>
        <div class="quick_sms_grid">
            <div class="quick_sms">
                <input type="hidden" value="<?php echo esc_html( $order_id ); ?>" name="order_id"
                       class="wpnotif_order_id"/>
				<?php if ( $order_id == 0 ) { ?>
                    <div class="mobile_number_container">
                        <label for="wpnotif_mobile"><?php esc_html_e( 'Phone Number(s)', 'wpnotif' ); ?></label>
                        <div class="mobile_number_field">
                            <div class="digcon">
                                <select class="wpnotif_multiselect_dynamic_enable mobile" id="wpnotif_mobile" multiple>

                                </select>
                            </div>
                        </div>
                    </div>
                    <p class="wpnotif_desc"><?php esc_attr_e( 'Please input numbers with country code', 'wpnotif' ); ?></p>
					<?php
				} else {
					$mobile = WPNotif_Handler::get_customer_mobile( $order->get_customer_id(), $order );
					?>
                    <input type="hidden" class="mobile" name="mobile"
                           value="<?php echo esc_html( $mobile['countrycode'] );
					       echo esc_html( $mobile['mobile'] ); ?>"/>
					<?php
				}
				?>
                <div class="message">
                    <label for="quick_message"><?php esc_html_e( 'Message', 'wpnotif' ); ?></label>
                    <div class="position-relative">
                        <textarea id="quick_message" name="quick_message"></textarea>
                        <a href="https://help.unitedover.com/wpnotif/kb/placeholders" target="_blank">
                            <span class="placeholder_list"><?php esc_html_e( 'Placeholder List', 'wpnotif' ); ?></span>
                        </a>
                    </div>

                </div>
                <div class="send_sms_button_container">
                    <button class="send_quick_sms" data-processing="<?php esc_html_e( 'Processing', 'wpnotif' ); ?>"
                            data-send="<?php esc_html_e( 'Send', 'wpnotif' ); ?>">
                        <span><?php esc_html_e( 'Send', 'wpnotif' ); ?></span>
                        <div></div>
                    </button>
                </div>
            </div>
            <div class="quick_sms_response">
                <div class="quick_sms_response_box"><i></i><span class="msg"></span></div>
            </div>
			<?php if ( $order_id != 0 && $show_trigger ) {

				?>
                <div class="quick_sms">
                    <hr/>
                    <h2><?php esc_html_e( 'Trigger Order Status Message', 'wpnotif' ); ?></h2>
                    <button class="send_quick_sms trigger_order_status"
                            data-processing="<?php esc_html_e( 'Processing', 'wpnotif' ); ?>"
                            data-send="<?php esc_html_e( 'Send', 'wpnotif' ); ?>">
                        <span><?php esc_html_e( 'Send', 'wpnotif' ); ?></span>
                        <div></div>
                    </button>
                </div>
				<?php

			} ?>

        </div>
		<?php
	}

	public function save_settings() {
		if ( ! current_user_can( 'manage_options' ) ) {

			die();
		}


		if ( empty( $_POST['wpnotif_purchasecode'] ) ) {
			delete_option( 'wpnotif_purchasecode' );
			delete_option( 'wpnotif_purchasecode' );
		} else {
			$pcsave = true;
			if ( isset( $_REQUEST['pca'] ) ) {
				if ( $_REQUEST['pca'] == 1 ) {
					$pcsave = true;
				} else {
					$pcsave = false;
				}
			}
			if ( $pcsave ) {

				update_option( 'wpnotif_purchasecode', $_POST['wpnotif_purchasecode'] );
				update_option( 'wpnotif_license_type', $_POST['wpnotif_license_type'] );
			}
		}
		if ( isset( $_POST['wpnotif_gateways'] ) ) {
			$wpnotif_gateways = $_POST['wpnotif_gateways'];
			update_option( 'wpnotif_gateways', $wpnotif_gateways );
		}


		update_option( 'wpnotf_admin_user_role', $_POST['wpnotf_admin_user_role'] );

		if ( isset( $_POST['twiliosid'] ) ) {
			$twiliosid      = sanitize_text_field( $_POST['twiliosid'] );
			$twiliotoken    = sanitize_text_field( $_POST['twiliotoken'] );
			$twiliosenderid = sanitize_text_field( $_POST['twiliosenderid'] );


			$tiwilioapicred = array(
				'twiliosid'      => $twiliosid,
				'twiliotoken'    => $twiliotoken,
				'twiliosenderid' => $twiliosenderid
			);

			if ( get_option( 'wpnotif_twilio_api' ) !== false ) {
				update_option( 'wpnotif_twilio_api', $tiwilioapicred );
			} else {
				add_option( 'wpnotif_twilio_api', $tiwilioapicred );
			}


		}

		if ( isset( $_POST['msg91authkey'] ) ) {
			$msg91authkey  = sanitize_text_field( $_POST['msg91authkey'] );
			$msg91senderid = sanitize_text_field( $_POST['msg91senderid'] );
			$msg91route    = sanitize_text_field( $_POST['msg91route'] );
			$msg91apicred  = array(
				'msg91authkey'  => $msg91authkey,
				'msg91senderid' => $msg91senderid,
				'msg91route'    => $msg91route
			);
			if ( get_option( 'wpnotif_msg91_api' ) !== false ) {
				update_option( 'wpnotif_msg91_api', $msg91apicred );
			} else {
				add_option( 'wpnotif_msg91_api', $msg91apicred );
			}

		}

		if ( isset( $_POST['yunpianapikey'] ) ) {
			$yunpianapikey = sanitize_text_field( $_POST['yunpianapikey'] );
			update_option( 'wpnotif_yunpianapi', $yunpianapikey );
		}


		$smsgateways = $this->getGateWayArray();

		foreach ( $smsgateways as $name => $details ) {
			$name        = strtolower( str_replace( [ ".", " " ], "_", $name ) );
			$gatewaycred = array();
			foreach ( $details['inputs'] as $inputlabel => $input ) {

				$inputValue = sanitize_text_field( $_POST[ $name . "_" . $input['name'] ] );

				$gatewaycred[ $input['name'] ] = $inputValue;

			}
			update_option( 'wpnotif_' . strtolower( $name ), $gatewaycred );
		}

		update_option( 'wpnotif_gateway_customer_notifications', $_POST['wpnotif_gateway_customer_notifications'] );


		$wpnotif_user_consent_inputs = $this->get_user_consent_settings();
		$user_consent_settings       = array();
		foreach ( $wpnotif_user_consent_inputs as $key => $consent_settings_input ) {
			$user_consent_settings[ $key ]['enable'] = sanitize_text_field( $_POST[ 'user_' . $key ] );
			$user_consent_settings[ $key ]['msg']    = sanitize_textarea_field( $_POST[ 'user_' . $key . '_msg' ] );
		}
		update_option( 'wpnotif_user_consent', $user_consent_settings );


		$admin_settings_inputs = $this->get_admin_settings();
		$admin_settings        = array();
		foreach ( $admin_settings_inputs as $key => $admin_settings_input ) {
			$admin_settings[ $key ]['enable'] = sanitize_text_field( $_POST[ 'admin_' . $key ] );
			$admin_settings[ $key ]['msg']    = sanitize_textarea_field( $_POST[ 'admin_' . $key . '_msg' ] );
		}
		update_option( 'wpnotif_admin_notifications', $admin_settings );

		$customer_settings_inputs = $this->get_admin_settings();
		$customer_settings        = array();
		foreach ( $customer_settings_inputs as $key => $customer_settings_input ) {
			$customer_settings[ $key ]['enable'] = sanitize_text_field( $_POST[ 'customer_' . $key ] );
			$customer_settings[ $key ]['msg']    = sanitize_textarea_field( $_POST[ 'customer_' . $key . '_msg' ] );
		}
		update_option( 'wpnotif_customer_notifications', $customer_settings );


		update_option( 'different_gateway_content', $_POST['different_gateway_content'] );

		wp_die();
	}

	public function getGateWayArray() {

		/// next 34
		$smsgateways = array(
			'Whatsapp' => array(
				'value'  => 1001,
				'inputs' =>
					array(
						esc_attr__( 'Whatsapp Gateway' )   => array(
							'select' => true,
							'value'  => $this->WhatsAppGateways(),
							'name'   => 'whatsapp_gateway'
						),
						esc_attr__( 'Twilio Account SID' ) => array(
							'text'    => true,
							'value'   => 1,
							'name'    => 'account_sid',
							'show_if' => 'whatsapp_gateway_1'
						),
						esc_attr__( 'Twilio Auth Token' )  => array(
							'text'    => true,
							'value'   => 1,
							'name'    => 'auth_token',
							'show_if' => 'whatsapp_gateway_1'
						),
						esc_attr__( 'Whatsapp Number' )    => array(
							'text'    => true,
							'value'   => 1,
							'name'    => 'whatsappnumber',
							'show_if' => 'whatsapp_gateway_1'
						)
					),
				'hide'   => 1,
			),

			'Amazon SNS'      => array(
				'value'  => 25,
				'inputs' =>
					array(
						__( 'Access Key ID' )     => array( 'text' => true, 'name' => 'access_key' ),
						__( 'Secret Access Key' ) => array( 'text' => true, 'name' => 'access_secret' ),
						__( 'Region' )            => array( 'text' => true, 'name' => 'region' ),
						__( 'Sender ID' )         => array( 'text' => true, 'name' => 'sender_id' )
					),
			),
			'Amazon Pinpoint' => array(
				'value'  => 30,
				'inputs' =>
					array(
						__( 'Application ID' )    => array( 'text' => true, 'name' => 'app_id' ),
						__( 'Access Key ID' )     => array( 'text' => true, 'name' => 'access_key' ),
						__( 'Secret Access Key' ) => array( 'text' => true, 'name' => 'access_secret' ),
						__( 'Region' )            => array( 'text' => true, 'name' => 'region' ),
						__( 'Sender ID' )         => array( 'text' => true, 'name' => 'sender_id' )
					),
			),
			'Alibaba'         => array(
				'value'  => 18,
				'inputs' =>
					array(
						esc_attr__( 'Access Key' )    => array( 'text' => true, 'name' => 'access_key' ),
						esc_attr__( 'Access Secret' ) => array( 'text' => true, 'name' => 'access_secret' ),
						esc_attr__( 'From' )          => array( 'text' => true, 'name' => 'from', 'optional' => 1 )
					)
			),

			'Clickatell'  => array(
				'value'  => 5,
				'inputs' => array(
					esc_attr__( 'API Key' ) => array( 'text' => true, 'name' => 'api_key' ),
					esc_attr__( 'From' )    => array(
						'text'     => true,
						'name'     => 'from',
						'optional' => 1
					)
				)
			),
			'ClickSend'   => array(
				'value'  => 6,
				'inputs' => array(
					esc_attr__( 'API Username' ) => array(
						'text' => true,
						'name' => 'apiusername'
					),
					esc_attr__( 'API Key' )      => array(
						'text' => true,
						'name' => 'apikey'
					),
					esc_attr__( 'From' )         => array( 'text' => true, 'name' => 'from' )
				)
			),
			'ClockWork'   => array(
				'value'  => 7,
				'inputs' => array(
					esc_attr__( 'ClockWork API' ) => array(
						'text' => true,
						'name' => 'clockworkapi'
					),
					esc_attr__( 'From' )          => array( 'text' => true, 'name' => 'from' )
				)
			),
			'Kaleyra'     => array(
				'value'  => 15,
				'inputs' => array(
					esc_attr__( 'API Key' )   => array( 'text' => true, 'name' => 'api_key' ),
					esc_attr__( 'Sender ID' ) => array(
						'text' => true,
						'name' => 'sender_id'
					)
				)
			),
			'MessageBird' => array(
				'value'  => 8,
				'inputs' => array(
					esc_attr__( 'Access Key' ) => array(
						'text' => true,
						'name' => 'accesskey'
					),
					esc_attr__( 'Originator' ) => array(
						'text' => true,
						'name' => 'originator'
					)
				)
			),
			'Mobily.ws'   => array(
				'value'  => 9,
				'inputs' => array(
					esc_attr__( 'Mobile' )   => array( 'text' => true, 'name' => 'mobile' ),
					esc_attr__( 'Password' ) => array(
						'text' => true,
						'name' => 'password'
					),
					esc_attr__( 'Sender' )   => array( 'text' => true, 'name' => 'sender' )
				)
			),
			'Alfa Cell'   => array(
				'value'  => 28,
				'inputs' => array(
					__( 'API Key' ) => array( 'text' => true, 'name' => 'api_key' ),
					__( 'Sender' )  => array( 'text' => true, 'name' => 'sender' )
				)
			),
			'Nexmo'       => array(
				'value'  => 10,
				'inputs' => array(
					esc_attr__( 'API Key' )    => array(
						'text' => true,
						'name' => 'api_key'
					),
					esc_attr__( 'API Secret' ) => array(
						'text' => true,
						'name' => 'api_secret'
					),
					esc_attr__( 'From' )       => array( 'text' => true, 'name' => 'from' )
				)
			),
			'Plivo'       => array(
				'value'  => 11,
				'inputs' => array(
					esc_attr__( 'Auth ID' )    => array(
						'text' => true,
						'name' => 'auth_id'
					),
					esc_attr__( 'Auth Token' ) => array(
						'text' => true,
						'name' => 'auth_token'
					),
					esc_attr__( 'Sender' )     => array(
						'text' => true,
						'name' => 'sender_id'
					)
				)
			),
			/*'CM'          => array(
				'value'  => 27,
				'inputs' => array(
					__( 'API Key' ) => array(
						'text' => true,
						'name' => 'api_key'
					),
					__( 'From' )    => array( 'text' => true, 'name' => 'from' )
				)
			),*/
			'SMSAPI'      => array(
				'value'  => 12,
				'inputs' => array(
					esc_attr__( 'Token' ) => array( 'text' => true, 'name' => 'token' ),
					esc_attr__( 'From' )  => array( 'text' => true, 'name' => 'from' )
				)
			),

			'Textlocal' => array(
				'value'  => 17,
				'inputs' =>
					array(
						esc_attr__( 'API Key' ) => array( 'text' => true, 'name' => 'api_key' ),
						esc_attr__( 'Sender' )  => array( 'text' => true, 'name' => 'sender' )
					)
			),
			'Unifonic'  => array(
				'value'  => 14,
				'inputs' =>
					array(
						esc_attr__( 'AppSid' )    => array( 'text' => true, 'name' => 'appsid' ),
						esc_attr__( 'Sender ID' ) => array( 'text' => true, 'name' => 'senderid', 'optional' => 1 )
					)
			),

			'Melipayamak' => array(
				'value'  => 16,
				'inputs' => array(
					esc_attr__( 'Username' ) => array( 'text' => true, 'name' => 'username' ),
					esc_attr__( 'Password' ) => array( 'text' => true, 'name' => 'password' ),
					esc_attr__( 'From' )     => array( 'text' => true, 'name' => 'from' ),

				)
			),

			'Infobip' => array(
				'value'  => 32,
				'inputs' =>
					array(
						__( 'Base URL' ) => array( 'text' => true, 'name' => 'base_url' ),
						__( 'API Key' )  => array( 'text' => true, 'name' => 'api_key' ),
						__( 'From' )     => array( 'text' => true, 'name' => 'from', 'optional' => 1 )
					)
			),

			'AfricasTalking' => array(
				'value'  => 26,
				'inputs' =>
					array(
						__( 'Username' ) => array( 'text' => true, 'name' => 'username' ),
						__( 'API Key' )  => array( 'text' => true, 'name' => 'api_key' ),
						__( 'From' )     => array( 'text' => true, 'name' => 'from', 'optional' => 1 )
					)
			),

			'Adnsms' => array(
				'value'  => 19,
				'inputs' =>
					array(
						esc_attr__( 'API Key' )    => array( 'text' => true, 'name' => 'api_key' ),
						esc_attr__( 'API Secret' ) => array( 'text' => true, 'name' => 'api_secret' )
					)
			),

			'Netgsm' => array(
				'value'  => 20,
				'inputs' =>
					array(
						esc_attr__( 'Username' ) => array( 'text' => true, 'name' => 'username' ),
						esc_attr__( 'Password' ) => array( 'text' => true, 'name' => 'password' ),
						esc_attr__( 'From' )     => array( 'text' => true, 'name' => 'from' )
					)
			),

			'SMSC'        => array(
				'value'  => 21,
				'inputs' =>
					array(
						esc_attr__( 'Login' )    => array( 'text' => true, 'name' => 'login' ),
						esc_attr__( 'Password' ) => array( 'text' => true, 'name' => 'password' ),
						esc_attr__( 'Sender' )   => array( 'text' => true, 'name' => 'sender', 'optional' => 1 )
					)
			),
			'TargetSMS'   => array(
				'value'  => 22,
				'inputs' =>
					array(
						esc_attr__( 'Login' )    => array( 'text' => true, 'name' => 'login' ),
						esc_attr__( 'Password' ) => array( 'text' => true, 'name' => 'password' ),
						esc_attr__( 'Sender' )   => array( 'text' => true, 'name' => 'sender' )
					)
			),
			'Ghasedak'    => array(
				'value'  => 23,
				'inputs' =>
					array(
						__( 'API Key' ) => array( 'text' => true, 'name' => 'api_key' )
					)
			),
			'Farapayamak' => array(
				'value'  => 24,
				'inputs' =>
					array(
						__( 'Username' ) => array( 'text' => true, 'name' => 'username' ),
						__( 'Password' ) => array( 'text' => true, 'name' => 'password' ),
						__( 'From' )     => array( 'text' => true, 'name' => 'from' )
					)
			),
			'SendinBlue'  => array(
				'value'  => 31,
				'inputs' =>
					array(
						__( 'API Key' ) => array( 'text' => true, 'name' => 'api_key' ),
						__( 'Sender' )  => array( 'text' => true, 'name' => 'sender' )
					)
			),
			'IBulksms'    => array(
				'value'  => 29,
				'inputs' =>
					array(
						__( 'Auth Key' )  => array( 'text' => true, 'name' => 'auth_key' ),
						__( 'Sender ID' ) => array( 'text' => true, 'name' => 'sender' )
					)
			),
//        'LimeCellular'=>array('value'=>999,'inputs'=>array(esc_attr__('User Name')=>array('text'=>true,'name'=>'user'), esc_attr__('API ID')=>array('text'=>true,'name'=>'api_id'), esc_attr__('Short Code')=>array('text'=>true,'name'=>'short_code','optional'=>1))),
		);

		return $smsgateways;
	}

	public function WhatsAppGateways() {
		return array(
			esc_attr__( 'Twilio' )       => array( 'value' => 1 ),
			esc_attr__( 'WhatsApp Web' ) => array( 'value' => 2 ),
		);
	}

	public function get_user_consent_settings() {
		return array(
			'notify_user'      => array(
				'label'         => __( 'For SMS Message', 'wpnotif' ),
				'message'       => '1',
				'message_label' => __( 'Checkbox Text', 'wpnotif' ),
				'placeholder'   => '0',
			),
			'whatsapp_message' => array(
				'label'         => __( 'For WhatsApp Message', 'wpnotif' ),
				'message'       => '1',
				'message_label' => __( 'Checkbox Text', 'wpnotif' ),
				'placeholder'   => '0',
			),
			'combine_both'     => array(
				'label'         => __( 'Combine Both', 'wpnotif' ),
				'message'       => '1',
				'message_label' => __( 'Checkbox Text', 'wpnotif' ),
				'placeholder'   => '0',
			)


		);
	}

	public function get_admin_settings() {

		$list = array();
		if ( function_exists( 'wc_get_order_statuses' ) ) {
			$statuses = wc_get_order_statuses();
		} else {
			$statuses = array();
		}
		foreach ( $statuses as $key => $status ) {
			if ( $key == 'wc-processing' ) {
				$status = $status . ' ' . esc_attr__( '(New Order)', 'wpnotif' );
			}
			$list[ $key ] = array(
				'label'       => $status,
				'message'     => '1',
				'placeholder' => '1',
			);
		}

		return $list;
	}

	public function enqueue_scripts() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		wp_register_script( 'lottie', plugins_url( '/assets/js/lottie_html.min.js', __FILE__ ), null, '5.5.3', false );
		wp_enqueue_script( 'lottie' );


		wp_register_script( 'jquery-mask', plugins_url( '/assets/js/jquery.mask.min.js', __FILE__ ), array( 'jquery' ), null, false );
		wp_enqueue_script( 'jquery-mask' );

		wp_enqueue_style( 'nice-select', plugins_url( '/assets/css/nice-select.css', __FILE__ ), array(), null, 'all' );
		wp_enqueue_script( 'nice-select', plugins_url( '/assets/js/jquery.nice-select.min.js', __FILE__ ), array( 'jquery' ), null );

		wp_enqueue_style( 'select2', plugins_url( '/assets/css/select2.min.css', __FILE__ ), array(), null, 'all' );
		wp_enqueue_script( 'select2', plugins_url( '/assets/js/select2.min.js', __FILE__ ), array( 'jquery' ), null );

		wp_register_script( 'wpnotif-settings', plugins_url( '/assets/js/settings.js', __FILE__ ), array(
			'jquery',
			'nice-select',
			'select2',
			'jquery-mask',
			'lottie'
		), self::get_version(), true );
		$settings_array = array(
			"Invalidmsg91senderid"          => esc_attr__( "Invalid msg91 sender id!", 'wpnotif' ),
			"invalidpurchasecode"           => esc_attr__( "Invalid Purchase Code", 'wpnotif' ),
			"Error"                         => esc_attr__( "Error! Please try again later", "wpnotif" ),
			"PleasecompleteyourSettings"    => esc_attr__( "Please complete your Settings", 'wpnotif' ),
			"PleasecompleteyourAPISettings" => esc_attr__( "Please complete your API Settings", 'wpnotif' ),
			'ajax_url'                      => admin_url( 'admin-ajax.php' ),
			'face'                          => plugins_url( '/assets/images/face.png', __FILE__ ),
			'cross'                         => plugins_url( '/assets/images/cross.png', __FILE__ ),
			'anim'                          => plugins_url( '/assets/data.json', __FILE__ ),
			"ohsnap"                        => esc_attr__( "Oh Snap!", "wpnotif" )
		);
		wp_localize_script( 'wpnotif-settings', 'wpnotifobj', $settings_array );

		wp_enqueue_script( 'wpnotif-settings' );

		wp_enqueue_style( 'wpnotif-settings', plugins_url( '/assets/css/settings.min.css', __FILE__ ), array(), self::get_version(), 'all' );


	}

	public function plugin_menu() {

		$m = add_menu_page(
			'WPNotif',
			'WPNotif',
			'manage_options',
			'wpnotif-settings',
			array( $this, 'plugin_settings' ),
			'',
			56
		);

		add_submenu_page(
			'wpnotif-settings',
			'WPNotif',
			'Settings',
			'manage_options',
			'wpnotif-settings'
		);


	}

	public function plugin_settings() {
		if ( isset( $_GET['tab'] ) ) {
			$active_tab = sanitize_text_field( $_GET['tab'] );
		} else {
			$active_tab = 'apisettings';
		}
		$plugin_data = get_plugin_data( __FILE__ );

		$code = get_option( 'wpnotif_purchasecode' );


		if ( empty( $active_tab ) ) {
			$active_tab = 'activate';
		}

		$request_link  = admin_url( 'admin.php?page=wpnotif-settings&tab=activate' );
		$purchase_link = 'https://1.envato.market/G4eZm';
		if ( empty( $code ) ) {
			echo '<div class="wpnotif_red_notice wpnotif_pc_notice wpnotif_notice">This is a trial version of WPNotif, please register the plugin using purchase code <a href="' . $request_link . '">here</a> to use full version. If you have not purchased WPNotif yet, then please visit this <a href="' . $purchase_link . '">link</a> to buy a genuine licensed copy.</div>';
		}


		?>
        <div class="wpnotif_load_overlay">
            <div class="wpnotif_load_content">
                <div class="wpnotif_spinner">
                    <div class="wpnotif_double-bounce1"></div>
                    <div class="wpnotif_double-bounce2"></div>
                </div>
            </div>
        </div>
        <div class="wpnotif_admim_conf">

            <div class="wpnotif_load_overlay_gs">
                <div class="wpnotif_load_content">

                    <div class="circle-loader">
                        <div class="checkmark draw"></div>
                    </div>

                </div>
            </div>

            <div class="wpnotif_log_setge">
                <div class="wpnotif_ad_left_side">
                    <div class="wpnotif_ad_left_side_content">


                        <div class="wpnotif_sts_logo">
                            <a href="https://wpnotif.unitedover.com/" target="_blank">
                                <img src="<?php echo esc_html( plugins_url( 'assets/images/WPNotif.svg', __FILE__ ) ); ?>"
                                     alt="WPNotif"/></a></h1>
                            <span class="untdovr_plugin_version"><?php echo esc_html( self::get_version() ); ?></span>
                            </a>
                            <ul class="wpnotif_gs_log_men">
                                <li><a class="wpnotif_ngmc"
                                       href="https://help.unitedover.com/?utm_source=wpnotif-wp-settings&utm_medium=kb-button"
                                       target="_blank"><?php esc_html_e( 'Knowledgebase', 'wpnotif' ); ?></a>
                                </li>
                                <li><a class="wpnotif_ngmc" href="https://wpnotif.unitedover.com/changelog/"
                                       target="_blank"><?php esc_html_e( 'Changelog', 'wpnotif' ); ?></a>
                                </li>

                                <li><a id="wpnotif_activatetab" href="?page=wpnotif-settings&amp;tab=activate"
                                       class="wpnotif_ngmc updatetabview <?php echo $active_tab == 'activate' ? 'wpnotif-nav-tab-active' : ''; ?>"
                                       tab="activatetab"><?php esc_html_e( 'Register', 'wpnotif' ); ?></a></li>
                            </ul>
                        </div>

                        <input type="hidden" id="wpnotif_activated" value="1">

                        <div class="wpnotif-tab-wrapper">

                            <ul class="wpnotif-tab-ul">
                                <li><a href="?page=wpnotif-settings&amp;tab=apisettings"
                                       class="updatetabview wpnotif-nav-tab  <?php echo $active_tab == 'apisettings' ? 'wpnotif-nav-tab-active' : ''; ?>"
                                       tab="apisettingstab"><?php esc_html_e( 'Gateway', 'wpnotif' ); ?></a></li>

                                <li><a href="?page=wpnotif-settings&amp;tab=notifications"
                                       class="updatetabview wpnotif-nav-tab  <?php echo $active_tab == 'notifications' ? 'wpnotif-nav-tab-active' : ''; ?>"
                                       tab="notificationstab"><?php esc_html_e( 'Notifications', 'wpnotif' ); ?></a>
                                </li>

                                <li><a href="?page=wpnotif-settings&amp;tab=sendquicksms"
                                       class="customfieldsNavTab updatetabview wpnotif-nav-tab  <?php echo $active_tab == 'sendquicksms' ? 'wpnotif-nav-tab-active' : ''; ?>"
                                       tab="sendquicksmstab"><?php esc_html_e( 'Send Quick SMS', 'wpnotif' ); ?></a>
                                </li>


                            </ul>

                        </div>


                        <form method="post" autocomplete="off" id="wpnotif_setting_update"
                              class="wpnotif_activation_form"
                              enctype="multipart/form-data">
                            <div id="wpnotif_loading_container">
                                <div id="wpnotif_loading_anim"></div>
                            </div>

                            <div data-tab="apisettingstab"
                                 class="wpnotif_ad_in_pt apisettingstab digtabview <?php echo $active_tab == 'apisettings' ? 'digcurrentactive' : '" style="display:none;'; ?>">
								<?php $this->wpnotif_api_settings(); ?>
                            </div>

                            <div data-tab="notificationstab"
                                 class="wpnotif_ad_in_pt notificationstab digtabview <?php echo $active_tab == 'notifications' ? 'digcurrentactive' : '" style="display:none;'; ?>">
								<?php $this->notifications_settings(); ?>
                            </div>

                            <div data-tab="activatetab"
                                 class="wpnotif_ad_in_pt activatetab digtabview <?php echo $active_tab == 'activate' ? 'digcurrentactive' : '" style="display:none;'; ?>">
								<?php $this->activation(); ?>
                            </div>

                            <div data-tab="sendquicksmstab"
                                 class="wpnotif_ad_in_pt sendquicksmstab digtabview <?php echo $active_tab == 'sendquicksms' ? 'digcurrentactive' : '" style="display:none;'; ?>">
								<?php $this->send_quick_sms_ui(); ?>
                            </div>


                            <button type="submit" class="wpnotif_ad_submit"
                                    disabled=""><?php esc_html_e( 'Save Changes', 'wpnotif' ); ?></button>
                        </form>


                    </div>

                </div>


                <div class="wpnotif_ad_side">


                </div>

            </div>

        </div>
		<?php
        self::WPNotif_loading();
	}

	public function wpnotif_api_settings() {


		$wpnotif_tapp = get_option( 'wpnotif_tapp', 2 );

		$app             = get_option( 'wpnotif_api' );
		$appid           = "";
		$appsecret       = "";
		$accountkit_type = "";
		if ( $app !== false ) {
			$appid     = $app['appid'];
			$appsecret = $app['appsecret'];
			if ( isset( $app['accountkit_type'] ) ) {
				$accountkit_type = $app['accountkit_type'];
			} else {
				$accountkit_type = "modal";
			}
		}

		$tiwilioapicred = get_option( 'wpnotif_twilio_api' );
		$twiliosid      = "";
		$twiliotoken    = "";
		$twiliosenderid = "";


		if ( $tiwilioapicred !== false ) {
			$twiliosid      = $tiwilioapicred['twiliosid'];
			$twiliotoken    = $tiwilioapicred['twiliotoken'];
			$twiliosenderid = $tiwilioapicred['twiliosenderid'];
		}


		$msg91apicred  = get_option( 'wpnotif_msg91_api' );
		$msg91authkey  = "";
		$msg91senderid = "";

		$msg91route = 1;
		if ( $msg91apicred !== false ) {
			$msg91authkey  = $msg91apicred['msg91authkey'];
			$msg91senderid = $msg91apicred['msg91senderid'];

			$msg91route = $msg91apicred['msg91route'];

			if ( empty( $msg91route ) ) {
				$msg91route = 2;
			}
		}


		$yunpianapi = get_option( 'wpnotif_yunpianapi' );

		$smsgateways = $this->getGateWayArray();
		?>


        <input type="hidden" class="wpnotif_save" value='1' name="wpnotif_save"/>
        <div class="wpnotif_gateway_container">
            <table class="form-table wpnotif_default_gateway_details gateway_table">
				<?php $this->wpnotif_select_gateway( 'name="wpnotif_tapp" id="wpnotif_tapp"', $wpnotif_tapp ); ?>

                <tr class="twiliocred gateway_conf" <?php if ( $wpnotif_tapp != 2 ) {
					echo 'style="display:none;"';
				} ?> >
                    <th scope="row"><label for="twiliosid"><?php esc_html_e( 'Account SID', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="twiliosid" name="twiliosid" class="regular-text"
                               value="<?php echo esc_html( $twiliosid ); ?>"
                               placeholder="<?php esc_html_e( 'Account SID', 'wpnotif' ); ?>"
                               autocomplete="off"/>
                    </td>
                </tr>
                <tr class="twiliocred gateway_conf" <?php if ( $wpnotif_tapp != 2 ) {
					echo 'style="display:none;"';
				} ?> >
                    <th scope="row"><label for="twiliotoken"><?php esc_html_e( 'Auth Token', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="twiliotoken" name="twiliotoken" class="regular-text"
                               value="<?php echo esc_html( $twiliotoken ); ?>" autocomplete="off"
                               placeholder="<?php esc_html_e( 'Auth Token', 'wpnotif' ); ?>"/>
                    </td>
                </tr>
                <tr class="twiliocred gateway_conf" <?php if ( $wpnotif_tapp != 2 ) {
					echo 'style="display:none;"';
				} ?> >
                    <th scope="row"><label for="twiliosenderid"><?php esc_html_e( 'Sender ID', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="twiliosenderid" name="twiliosenderid" class="regular-text"
                               value="<?php echo esc_html( $twiliosenderid ); ?>" autocomplete="off"
                               placeholder="<?php esc_html_e( 'Sender ID', 'wpnotif' ); ?>"/>
                    </td>
                </tr>

                <tr class="msg91cred gateway_conf" <?php if ( $wpnotif_tapp != 3 ) {
					echo 'style="display:none;"';
				} ?>>
                    <th scope="row"><label
                                for="msg91authkey"><?php esc_html_e( 'Authentication Key', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="msg91authkey" name="msg91authkey" class="regular-text"
                               value="<?php echo esc_html( $msg91authkey ); ?>" autocomplete="off"
                               placeholder="<?php esc_html_e( 'Authentication Key', 'wpnotif' ); ?>"/>
                        <input type="hidden" name="msg91route" value="2"/>
                    </td>
                </tr>
                <tr class="msg91cred gateway_conf" <?php if ( $wpnotif_tapp != 3 ) {
					echo 'style="display:none;"';
				} ?>>
                    <th scope="row"><label for="msg91senderid"><?php esc_html_e( 'Sender ID', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="msg91senderid" name="msg91senderid" class="regular-text"
                               value="<?php echo esc_html( $msg91senderid ); ?>" autocomplete="off"
                               placeholder="<?php esc_html_e( 'Sender ID', 'wpnotif' ); ?>"
                               maxlength="6"/>
                    </td>
                </tr>


                <tr class="yunpiancred gateway_conf" <?php if ( $wpnotif_tapp != 4 ) {
					echo 'style="display:none;"';
				} ?>>
                    <th scope="row"><label for="yunpianapikey"><?php esc_html_e( 'API Key', 'wpnotif' ); ?> </label>
                    </th>
                    <td>
                        <input type="text" id="yunpianapikey" name="yunpianapikey" class="regular-text"
                               value="<?php echo esc_html( $yunpianapi ); ?>" autocomplete="off"
                               placeholder="<?php esc_html_e( 'API Key', 'wpnotif' ); ?>"/>
                    </td>
                </tr>

				<?php
				foreach ( $smsgateways as $name => $details ) {
					$value = $details['value'];
					$name  = str_replace( array( ".", " " ), "_", strtolower( $name ) );

					$gatewayCreds = get_option( 'wpnotif_' . strtolower( $name ) );


					foreach ( $details['inputs'] as $inputLabel => $input ) {
						$inputname  = esc_html( $name . "_" . $input['name'] );
						$inputValue = esc_html( $gatewayCreds[ $input['name'] ] );

						$optional = 0;
						if ( isset( $input['optional'] ) ) {
							$optional = $input['optional'];
						}
						$class = '';
						$hide  = false;
						if ( isset( $input['show_if'] ) ) {
							$hide  = true;
							$class = ' wpnotif-hide-elem ' . $input['show_if'];
						}

						?>
                        <tr class="<?php echo esc_html( $name ); ?>cred gateway_conf <?php echo esc_html( $class ); ?>" <?php if ( $wpnotif_tapp != $value || $hide ) {
							echo 'style="display:none;"';
						} ?>>
                            <th scope="row"><label
                                        for="<?php echo $inputname; ?>"> <?php esc_html_e( $inputLabel, 'wpnotif' );
									if ( $optional == 1 ) {
										echo ' (Optional)';
									} ?> </label></th>
                            <td>
								<?php

								if ( isset( $input['select'] ) ) {

									echo '<select name="' . $inputname . '" class="' . $inputname . '">';
									foreach ( $input['value'] as $optionName => $optionValues ) {

										?>
                                        <option value="<?php echo $optionValues['value']; ?>" <?php if ( $inputValue == $optionValues['value'] ) {
											echo 'selected';
										} ?>><?php echo $optionName; ?></option>
										<?php
									}
									echo '</select>';
								} else {
									?>
                                    <input type="text" id="<?php echo $inputname; ?>" name="<?php echo $inputname; ?>"
                                           class="regular-text"
                                           value="<?php echo $inputValue; ?>" autocomplete="off"
                                           placeholder="<?php esc_html_e( $inputLabel, 'wpnotif' ); ?>"
                                           wpnotif-optional="<?php echo esc_html( $optional ); ?>"/>
									<?php
								}
								?>

                            </td>
                        </tr>
						<?php
					}
				}
				?>


            </table>


			<?php
			$this->wpnotif_test_api_box();
			?>
        </div>
		<?php
		$this->wpnotif_show_digcountrygateways_settings();
		//
	}

	public function wpnotif_select_gateway( $gatewayAttributes, $wpnotif_tapp = - 1 ) {
		$smsgateways = $this->getGateWayArray();
		$gatewayName = $this->wpnotif_getGatewayName( $wpnotif_tapp );

		?>

        <tr>
            <th scope="row" valign="top" style="vertical-align: top;">
                <label><?php esc_html_e( 'SMS Gateway', 'wpnotif' ); ?> </label></th>
            <td class="wpnotif-gs-gatway-select-td">

                <select class="wpnotif_gateway" <?php echo $gatewayAttributes; ?> autocomplete="off">
                    <option <?php if ( $wpnotif_tapp == 2 ) {
						echo 'selected="selected"';
					} ?> data-value="2" value="2" han="twilio">Twilio
                    </option>
                    <option <?php if ( $wpnotif_tapp == 3 ) {
						echo 'selected="selected"';
					} ?> data-value="3" value="3" han="msg91">Msg91
                    </option>
					<?php

					foreach ( $smsgateways as $name => $details ) {
						$sel   = "";
						$value = $details['value'];

						if ( $value == $wpnotif_tapp ) {

							$gatewayName = $name;
							$sel         = 'selected="selected"';
						}
						$name  = esc_html( $name );
						$value = esc_html( $value );
						$sel   = esc_attr( $sel );
						if ( isset( $details['label'] ) ) {
							$gateway_label = $details['label'];
						} else {
							$gateway_label = $name;
						}
						echo '<option data-value="' . $value . '" value="' . $value . '" ' . $sel . ' han="' . strtolower( str_replace( array(
								".",
								" "
							), "_", strtolower( $name ) ) ) . '">' . $gateway_label . '</option>';
					}
					?>
                    <option value="4" <?php if ( $wpnotif_tapp == 4 ) {
						echo 'selected="selected"';
					} ?> data-value="4" han="yunpian">Yunpian
                    </option>
                </select><br/>

            </td>
        </tr>
		<?php
	}

	public function wpnotif_getGatewayName( $wpnotif_tapp ) {
		switch ( $wpnotif_tapp ) {
			case 2:
				return "Twilio";
				break;
			case 3:
				return "Msg91";
				break;
			case 4:
				return "Yunpian";
				break;
			default:
				return '';
				break;
		}
	}

	public function wpnotif_test_api_box() {
		$countrycode = esc_attr( get_the_author_meta( 'digt_countrycode', get_current_user_id() ) );
		?>
        <div class="wpnotif_api_test">
            <div class="wpnotif_gateway_sep_line"></div>

            <div class="wpnotif_call_test_api">
                <div><?php esc_html_e( 'TEST GATEWAY SETTINGS', 'wpnotif' ); ?></div>
                <div class="wpnotif_test_mob_ho">

                    <div class="digcon">
                        <div class="wpnotif_wc_countrycodecontainer wpnotif_wc_logincountrycodecontainer"
                             style="display: inline-block;">
                            <input wpnotif-save="0" type="text" name="digt_countrycode"
                                   class="input-text countrycode wpnotif_wc_logincountrycode"
                                   value="<?php echo $countrycode; ?>" maxlength="6" size="3"
                                   placeholder="<?php echo $countrycode; ?>">
                        </div>
                        <input wpnotif-save="0" class="mobile" type="text"
                               placeholder="<?php esc_html_e( 'Your Mobile Number', 'wpnotif' ); ?>"
                               value="<?php echo esc_attr( get_the_author_meta( 'digits_phone_no', get_current_user_id() ) ); ?>"
                               name="mobile/email" style="padding-left:107px !important;"></div>

                    <div class="wpnotif_call_test_api_btn"><?php esc_html_e( 'Test', 'wpnotif' ); ?></div>
                </div>

            </div>

            <div class="wpnotif_call_test_response">
                <div class="wpnotif_call_test_response_head"><?php esc_html_e( 'Response', 'wpnotif' ); ?></div>
                <div class="wpnotif_call_test_response_msg"></div>
            </div>
        </div>
		<?php
	}

	function wpnotif_show_digcountrygateways_settings() {

		?>

        <input type="hidden" name="wpnotif_gateways" class="wpnotif_gateways"
               value='<?php echo esc_attr( $this->wpnotif_cgr_get_gateways() ); ?>'/>


        <script id="gateway_template" type="text/x-html-template">

            <div class="wpnotif_gateway_box">
                <div class="wpnotif_gateway_target_head"><?php esc_html_e( 'All Countries', 'wpnotif' ); ?></div>
                <div class="wpnotif_gateway_box_close"></div>

                <div class="wpnotif_gateway_collapse_box">
                    <div class="wpnotif_gateway_for_list"><span
                                class="wpnotif_gate_for"><?php esc_html_e( 'for', 'wpnotif' ); ?> </span><span
                                class="wpnotif_ctr_list"></span></div>
                    <div class="icon-gear icon-gear-dims wpnotif_gateway_configure_gateway wpnotif_gateay_conf_expand"></div>
                </div>
                <div class="icon-shape icon-shape-dims wpnotif_gateway_configure_gateway wpnotif_gateay_conf_delete"></div>

                <div class="enable_disable_gateway">
                    <div class="input-switch">
                        <input type="checkbox" class="enable_disable_gateway" name="enable_disable_gateway"/>
                        <label for="enable_disable_gateway"></label>
                        <span class="status_text yes"><?php esc_html_e( 'On', 'wpnotif' ); ?></span>
                        <span class="status_text no"><?php esc_html_e( 'Off', 'wpnotif' ); ?></span>
                    </div>
                </div>
                <div class="wpnotif_gateway_configuation_expand_box">
                    <div class="wpnotif_gateway_configuation_expand_box_contents">
                        <div class="wpnotif_gateway_sep_line wpnotif_gateway_sel_sep"></div>

                        <table class="form-table wpnotif-gs-trigger">
							<?php $this->wpnotif_select_gateway( '', - 1 ); ?>
                            <tr class="gateway_countries wpnotif_hide_allc">
                                <th scope="row"><label><?php esc_html_e( 'Countries', 'wpnotif' ); ?> </label></th>
                                <td>
                                    <select multiple="multiple">
										<?php
										$countryList = $this->getCountryList();


										foreach ( $countryList as $key => $value ) {
											$key   = esc_html( $key );
											$value = esc_html( $value );
											echo '<option value="' . $value . '" data-country="' . $key . '">' . $key . ' (+' . $value . ')</option>';
										}

										?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="wpnotif_gateway_sep_line wpnotif_hide_allc"></div>
                        <table class="form-table selected_gateway_conf"></table>
						<?php
						$this->wpnotif_test_api_box();
						?>
                    </div>
                </div>

            </div>
        </script>

        <div class="wpnotif_gateway_settings">

        </div>

        <div class="add_gateway_group_button"><?php esc_html_e( 'Add Group', 'wpnotif' ); ?></div>
		<?php
	}

	public function wpnotif_cgr_get_gateways() {
		$wpnotif_gateways = get_option( 'wpnotif_gateways', - 1 );

		if ( $wpnotif_gateways == - 1 ) {
			$wpnotif_tapp = get_option( 'wpnotif_tapp', 2 );

			$gateway_array                          = array();
			$gateway_array[ 'gc_' . $wpnotif_tapp ] = array(
				'gateway' => $wpnotif_tapp,
				'country' => 'all',
				'all'     => 1,
				'ccodes'  => 0,
				'enable'  => 'on'
			);
			$gateway_array['gc_1001']               = array(
				'gateway'    => 1001,
				'country'    => 'all',
				'class'      => 'hideGatewayList',
				'data-label' => 'Whatsapp',
				'all'        => 1,
				'ccodes'     => 0,
				'enable'     => 'off'
			);

			return stripslashes( json_encode( $gateway_array ) );
		}


		return stripslashes( $wpnotif_gateways );

	}

	function getCountryList() {
		return array(
			esc_attr__( "Afghanistan", "wpnotif" )                      => "93",
			esc_attr__( "Albania", "wpnotif" )                          => "355",
			esc_attr__( "Algeria", "wpnotif" )                          => "213",
			esc_attr__( "American Samoa", "wpnotif" )                   => "1",
			esc_attr__( "Andorra", "wpnotif" )                          => "376",
			esc_attr__( "Angola", "wpnotif" )                           => "244",
			esc_attr__( "Anguilla", "wpnotif" )                         => "1",
			esc_attr__( "Antigua", "wpnotif" )                          => "1",
			esc_attr__( "Argentina", "wpnotif" )                        => "54",
			esc_attr__( "Armenia", "wpnotif" )                          => "374",
			esc_attr__( "Aruba", "wpnotif" )                            => "297",
			esc_attr__( "Australia", "wpnotif" )                        => "61",
			esc_attr__( "Austria", "wpnotif" )                          => "43",
			esc_attr__( "Azerbaijan", "wpnotif" )                       => "994",
			esc_attr__( "Bahrain", "wpnotif" )                          => "973",
			esc_attr__( "Bangladesh", "wpnotif" )                       => "880",
			esc_attr__( "Barbados", "wpnotif" )                         => "1",
			esc_attr__( "Belarus", "wpnotif" )                          => "375",
			esc_attr__( "Belgium", "wpnotif" )                          => "32",
			esc_attr__( "Belize", "wpnotif" )                           => "501",
			esc_attr__( "Benin", "wpnotif" )                            => "229",
			esc_attr__( "Bermuda", "wpnotif" )                          => "1",
			esc_attr__( "Bhutan", "wpnotif" )                           => "975",
			esc_attr__( "Bolivia", "wpnotif" )                          => "591",
			esc_attr__( "Bonaire, Sint Eustatius and Saba", "wpnotif" ) => "599",
			esc_attr__( "Bosnia and Herzegovina", "wpnotif" )           => "387",
			esc_attr__( "Botswana", "wpnotif" )                         => "267",
			esc_attr__( "Brazil", "wpnotif" )                           => "55",
			esc_attr__( "British Indian Ocean Territory", "wpnotif" )   => "246",
			esc_attr__( "British Virgin Islands", "wpnotif" )           => "1",
			esc_attr__( "Brunei", "wpnotif" )                           => "673",
			esc_attr__( "Bulgaria", "wpnotif" )                         => "359",
			esc_attr__( "Burkina Faso", "wpnotif" )                     => "226",
			esc_attr__( "Burundi", "wpnotif" )                          => "257",
			esc_attr__( "Cambodia", "wpnotif" )                         => "855",
			esc_attr__( "Cameroon", "wpnotif" )                         => "237",
			esc_attr__( "Canada", "wpnotif" )                           => "1",
			esc_attr__( "Cape Verde", "wpnotif" )                       => "238",
			esc_attr__( "Cayman Islands", "wpnotif" )                   => "1",
			esc_attr__( "Central African Republic", "wpnotif" )         => "236",
			esc_attr__( "Chad", "wpnotif" )                             => "235",
			esc_attr__( "Chile", "wpnotif" )                            => "56",
			esc_attr__( "China", "wpnotif" )                            => "86",
			esc_attr__( "Colombia", "wpnotif" )                         => "57",
			esc_attr__( "Comoros", "wpnotif" )                          => "269",
			esc_attr__( "Cook Islands", "wpnotif" )                     => "682",
			esc_attr__( "Costa Rica", "wpnotif" )                       => "506",
			esc_attr__( "Côte d'Ivoire", "wpnotif" )                    => "225",
			esc_attr__( "Croatia", "wpnotif" )                          => "385",
			esc_attr__( "Cuba", "wpnotif" )                             => "53",
			esc_attr__( "Curaçao", "wpnotif" )                          => "599",
			esc_attr__( "Cyprus", "wpnotif" )                           => "357",
			esc_attr__( "Czech Republic", "wpnotif" )                   => "420",
			esc_attr__( "Democratic Republic of the Congo", "wpnotif" ) => "243",
			esc_attr__( "Denmark", "wpnotif" )                          => "45",
			esc_attr__( "Djibouti", "wpnotif" )                         => "253",
			esc_attr__( "Dominica", "wpnotif" )                         => "1",
			esc_attr__( "Dominican Republic", "wpnotif" )               => "1",
			esc_attr__( "Ecuador", "wpnotif" )                          => "593",
			esc_attr__( "Egypt", "wpnotif" )                            => "20",
			esc_attr__( "El Salvador", "wpnotif" )                      => "503",
			esc_attr__( "Equatorial Guinea", "wpnotif" )                => "240",
			esc_attr__( "Eritrea", "wpnotif" )                          => "291",
			esc_attr__( "Estonia", "wpnotif" )                          => "372",
			esc_attr__( "Ethiopia", "wpnotif" )                         => "251",
			esc_attr__( "Falkland Islands", "wpnotif" )                 => "500",
			esc_attr__( "Faroe Islands", "wpnotif" )                    => "298",
			esc_attr__( "Federated States of Micronesia", "wpnotif" )   => "691",
			esc_attr__( "Fiji", "wpnotif" )                             => "679",
			esc_attr__( "Finland", "wpnotif" )                          => "358",
			esc_attr__( "France", "wpnotif" )                           => "33",
			esc_attr__( "French Guiana", "wpnotif" )                    => "594",
			esc_attr__( "French Polynesia", "wpnotif" )                 => "689",
			esc_attr__( "Gabon", "wpnotif" )                            => "241",
			esc_attr__( "Georgia", "wpnotif" )                          => "995",
			esc_attr__( "Germany", "wpnotif" )                          => "49",
			esc_attr__( "Ghana", "wpnotif" )                            => "233",
			esc_attr__( "Gibraltar", "wpnotif" )                        => "350",
			esc_attr__( "Greece", "wpnotif" )                           => "30",
			esc_attr__( "Greenland", "wpnotif" )                        => "299",
			esc_attr__( "Grenada", "wpnotif" )                          => "1",
			esc_attr__( "Guadeloupe", "wpnotif" )                       => "590",
			esc_attr__( "Guam", "wpnotif" )                             => "1",
			esc_attr__( "Guatemala", "wpnotif" )                        => "502",
			esc_attr__( "Guernsey", "wpnotif" )                         => "44",
			esc_attr__( "Guinea", "wpnotif" )                           => "224",
			esc_attr__( "Guinea-Bissau", "wpnotif" )                    => "245",
			esc_attr__( "Guyana", "wpnotif" )                           => "592",
			esc_attr__( "Haiti", "wpnotif" )                            => "509",
			esc_attr__( "Honduras", "wpnotif" )                         => "504",
			esc_attr__( "Hong Kong", "wpnotif" )                        => "852",
			esc_attr__( "Hungary", "wpnotif" )                          => "36",
			esc_attr__( "Iceland", "wpnotif" )                          => "354",
			esc_attr__( "India", "wpnotif" )                            => "91",
			esc_attr__( "Indonesia", "wpnotif" )                        => "62",
			esc_attr__( "Iran", "wpnotif" )                             => "98",
			esc_attr__( "Iraq", "wpnotif" )                             => "964",
			esc_attr__( "Ireland", "wpnotif" )                          => "353",
			esc_attr__( "Isle Of Man", "wpnotif" )                      => "44",
			esc_attr__( "Israel", "wpnotif" )                           => "972",
			esc_attr__( "Italy", "wpnotif" )                            => "39",
			esc_attr__( "Jamaica", "wpnotif" )                          => "1",
			esc_attr__( "Japan", "wpnotif" )                            => "81",
			esc_attr__( "Jersey", "wpnotif" )                           => "44",
			esc_attr__( "Jordan", "wpnotif" )                           => "962",
			esc_attr__( "Kazakhstan", "wpnotif" )                       => "7",
			esc_attr__( "Kenya", "wpnotif" )                            => "254",
			esc_attr__( "Kiribati", "wpnotif" )                         => "686",
			esc_attr__( "Kuwait", "wpnotif" )                           => "965",
			esc_attr__( "Kyrgyzstan", "wpnotif" )                       => "996",
			esc_attr__( "Laos", "wpnotif" )                             => "856",
			esc_attr__( "Latvia", "wpnotif" )                           => "371",
			esc_attr__( "Lebanon", "wpnotif" )                          => "961",
			esc_attr__( "Lesotho", "wpnotif" )                          => "266",
			esc_attr__( "Liberia", "wpnotif" )                          => "231",
			esc_attr__( "Libya", "wpnotif" )                            => "218",
			esc_attr__( "Liechtenstein", "wpnotif" )                    => "423",
			esc_attr__( "Lithuania", "wpnotif" )                        => "370",
			esc_attr__( "Luxembourg", "wpnotif" )                       => "352",
			esc_attr__( "Macau", "wpnotif" )                            => "853",
			esc_attr__( "Macedonia", "wpnotif" )                        => "389",
			esc_attr__( "Madagascar", "wpnotif" )                       => "261",
			esc_attr__( "Malawi", "wpnotif" )                           => "265",
			esc_attr__( "Malaysia", "wpnotif" )                         => "60",
			esc_attr__( "Maldives", "wpnotif" )                         => "960",
			esc_attr__( "Mali", "wpnotif" )                             => "223",
			esc_attr__( "Malta", "wpnotif" )                            => "356",
			esc_attr__( "Marshall Islands", "wpnotif" )                 => "692",
			esc_attr__( "Martinique", "wpnotif" )                       => "596",
			esc_attr__( "Mauritania", "wpnotif" )                       => "222",
			esc_attr__( "Mauritius", "wpnotif" )                        => "230",
			esc_attr__( "Mayotte", "wpnotif" )                          => "262",
			esc_attr__( "Mexico", "wpnotif" )                           => "52",
			esc_attr__( "Moldova", "wpnotif" )                          => "373",
			esc_attr__( "Monaco", "wpnotif" )                           => "377",
			esc_attr__( "Mongolia", "wpnotif" )                         => "976",
			esc_attr__( "Montenegro", "wpnotif" )                       => "382",
			esc_attr__( "Montserrat", "wpnotif" )                       => "1",
			esc_attr__( "Morocco", "wpnotif" )                          => "212",
			esc_attr__( "Mozambique", "wpnotif" )                       => "258",
			esc_attr__( "Myanmar", "wpnotif" )                          => "95",
			esc_attr__( "Namibia", "wpnotif" )                          => "264",
			esc_attr__( "Nauru", "wpnotif" )                            => "674",
			esc_attr__( "Nepal", "wpnotif" )                            => "977",
			esc_attr__( "Netherlands", "wpnotif" )                      => "31",
			esc_attr__( "New Caledonia", "wpnotif" )                    => "687",
			esc_attr__( "New Zealand", "wpnotif" )                      => "64",
			esc_attr__( "Nicaragua", "wpnotif" )                        => "505",
			esc_attr__( "Niger", "wpnotif" )                            => "227",
			esc_attr__( "Nigeria", "wpnotif" )                          => "234",
			esc_attr__( "Niue", "wpnotif" )                             => "683",
			esc_attr__( "Norfolk Island", "wpnotif" )                   => "672",
			esc_attr__( "North Korea", "wpnotif" )                      => "850",
			esc_attr__( "Northern Mariana Islands", "wpnotif" )         => "1",
			esc_attr__( "Norway", "wpnotif" )                           => "47",
			esc_attr__( "Oman", "wpnotif" )                             => "968",
			esc_attr__( "Pakistan", "wpnotif" )                         => "92",
			esc_attr__( "Palau", "wpnotif" )                            => "680",
			esc_attr__( "Palestine", "wpnotif" )                        => "970",
			esc_attr__( "Panama", "wpnotif" )                           => "507",
			esc_attr__( "Papua New Guinea", "wpnotif" )                 => "675",
			esc_attr__( "Paraguay", "wpnotif" )                         => "595",
			esc_attr__( "Peru", "wpnotif" )                             => "51",
			esc_attr__( "Philippines", "wpnotif" )                      => "63",
			esc_attr__( "Poland", "wpnotif" )                           => "48",
			esc_attr__( "Portugal", "wpnotif" )                         => "351",
			esc_attr__( "Puerto Rico", "wpnotif" )                      => "1",
			esc_attr__( "Qatar", "wpnotif" )                            => "974",
			esc_attr__( "Republic of the Congo", "wpnotif" )            => "242",
			esc_attr__( "Romania", "wpnotif" )                          => "40",
			esc_attr__( "Runion", "wpnotif" )                           => "262",
			esc_attr__( "Russia", "wpnotif" )                           => "7",
			esc_attr__( "Rwanda", "wpnotif" )                           => "250",
			esc_attr__( "Saint Helena", "wpnotif" )                     => "290",
			esc_attr__( "Saint Kitts and Nevis", "wpnotif" )            => "1",
			esc_attr__( "Saint Pierre and Miquelon", "wpnotif" )        => "508",
			esc_attr__( "Saint Vincent and the Grenadines", "wpnotif" ) => "1",
			esc_attr__( "Samoa", "wpnotif" )                            => "685",
			esc_attr__( "San Marino", "wpnotif" )                       => "378",
			esc_attr__( "Sao Tome and Principe", "wpnotif" )            => "239",
			esc_attr__( "Saudi Arabia", "wpnotif" )                     => "966",
			esc_attr__( "Senegal", "wpnotif" )                          => "221",
			esc_attr__( "Serbia", "wpnotif" )                           => "381",
			esc_attr__( "Seychelles", "wpnotif" )                       => "248",
			esc_attr__( "Sierra Leone", "wpnotif" )                     => "232",
			esc_attr__( "Singapore", "wpnotif" )                        => "65",
			esc_attr__( "Sint Maarten", "wpnotif" )                     => "1",
			esc_attr__( "Slovakia", "wpnotif" )                         => "421",
			esc_attr__( "Slovenia", "wpnotif" )                         => "386",
			esc_attr__( "Solomon Islands", "wpnotif" )                  => "677",
			esc_attr__( "Somalia", "wpnotif" )                          => "252",
			esc_attr__( "South Africa", "wpnotif" )                     => "27",
			esc_attr__( "South Korea", "wpnotif" )                      => "82",
			esc_attr__( "South Sudan", "wpnotif" )                      => "211",
			esc_attr__( "Spain", "wpnotif" )                            => "34",
			esc_attr__( "Sri Lanka", "wpnotif" )                        => "94",
			esc_attr__( "St. Lucia", "wpnotif" )                        => "1",
			esc_attr__( "Sudan", "wpnotif" )                            => "249",
			esc_attr__( "Suriname", "wpnotif" )                         => "597",
			esc_attr__( "Swaziland", "wpnotif" )                        => "268",
			esc_attr__( "Sweden", "wpnotif" )                           => "46",
			esc_attr__( "Switzerland", "wpnotif" )                      => "41",
			esc_attr__( "Syria", "wpnotif" )                            => "963",
			esc_attr__( "Taiwan", "wpnotif" )                           => "886",
			esc_attr__( "Tajikistan", "wpnotif" )                       => "992",
			esc_attr__( "Tanzania", "wpnotif" )                         => "255",
			esc_attr__( "Thailand", "wpnotif" )                         => "66",
			esc_attr__( "The Bahamas", "wpnotif" )                      => "1",
			esc_attr__( "The Gambia", "wpnotif" )                       => "220",
			esc_attr__( "Timor-Leste", "wpnotif" )                      => "670",
			esc_attr__( "Togo", "wpnotif" )                             => "228",
			esc_attr__( "Tokelau", "wpnotif" )                          => "690",
			esc_attr__( "Tonga", "wpnotif" )                            => "676",
			esc_attr__( "Trinidad and Tobago", "wpnotif" )              => "1",
			esc_attr__( "Tunisia", "wpnotif" )                          => "216",
			esc_attr__( "Turkey", "wpnotif" )                           => "90",
			esc_attr__( "Turkmenistan", "wpnotif" )                     => "993",
			esc_attr__( "Turks and Caicos Islands", "wpnotif" )         => "1",
			esc_attr__( "Tuvalu", "wpnotif" )                           => "688",
			esc_attr__( "U.S. Virgin Islands", "wpnotif" )              => "1",
			esc_attr__( "Uganda", "wpnotif" )                           => "256",
			esc_attr__( "Ukraine", "wpnotif" )                          => "380",
			esc_attr__( "United Arab Emirates", "wpnotif" )             => "971",
			esc_attr__( "United Kingdom", "wpnotif" )                   => "44",
			esc_attr__( "United States", "wpnotif" )                    => "1",
			esc_attr__( "Uruguay", "wpnotif" )                          => "598",
			esc_attr__( "Uzbekistan", "wpnotif" )                       => "998",
			esc_attr__( "Vanuatu", "wpnotif" )                          => "678",
			esc_attr__( "Venezuela", "wpnotif" )                        => "58",
			esc_attr__( "Vietnam", "wpnotif" )                          => "84",
			esc_attr__( "Wallis and Futuna", "wpnotif" )                => "681",
			esc_attr__( "Western Sahara", "wpnotif" )                   => "212",
			esc_attr__( "Yemen", "wpnotif" )                            => "967",
			esc_attr__( "Zambia", "wpnotif" )                           => "260",
			esc_attr__( "Zimbabwe", "wpnotif" )                         => "263"
		);

	}

	public function notifications_settings() {


		$admin_options = $this->get_admin_settings();
		$admin_values  = get_option( 'wpnotif_admin_notifications', $this->admin_default_notifications() );

		$admin_roles = get_option( 'wpnotf_admin_user_role', array( 'administrator' ) );

		$user_consent_values = get_option( 'wpnotif_user_consent', $this->user_consent_default_settings() );


		?>
        <div class="wpnotif_ad_head"><span><?php esc_html_e( 'User Consent', 'wpnotif' ); ?></span></div>
		<?php $this->render_notifications_ui( $this->get_user_consent_settings(), $user_consent_values, 'user' ); ?>


        <div class="wpnotif_ad_head"><span><?php esc_html_e( 'Admin Notifications', 'wpnotif' ); ?></span></div>
        <table class="form-table form-switch">
            <tr>
                <th scope="row"><label><?php esc_html_e( 'User Role', 'wpnotif' ); ?></label></th>
                <td>
                    <select name="wpnotf_admin_user_role[]" class="wpnotif_multiselect_enable" multiple="multiple">
						<?php
						foreach ( wp_roles()->roles as $rkey => $rvalue ) {
							$ac = '';
							if ( in_array( $rkey, $admin_roles ) ) {
								$ac = "selected=selected";
							}

							echo '<option value="' . esc_html( $rkey ) . '" ' . esc_attr( $ac ) . '>' . esc_html( $rkey ) . '</option>';
						}
						?>
                    </select>
                </td>
            </tr>
        </table>

		<?php $this->render_notifications_ui( $admin_options, $admin_values, 'admin' ); ?>


        <div class="wpnotif_ad_head"><span><?php esc_html_e( 'Customer Notifications', 'wpnotif' ); ?></span></div>

        <table class="form-table form-switch">
            <tr>
                <th scope="row">
                    <label><?php esc_html_e( 'Enable gateway based different content', 'wpnotif' ); ?></label></th>
                <td>
                    <div class="input-switch">
                        <input type="checkbox" id="country_based"
                               name="different_gateway_content" <?php if ( get_option( 'different_gateway_content' ) == 'on' ) {
							echo 'checked';
						} ?>/>
                        <label for="country_based"></label>
                        <span class="status_text yes"><?php esc_html_e( 'On', 'wpnotif' ); ?></span>
                        <span class="status_text no"><?php esc_html_e( 'Off', 'wpnotif' ); ?></span>
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" name="wpnotif_gateway_customer_notifications" id="wpnotif_gateway_customer_notifications"
               value='<?php echo esc_attr( get_option( 'wpnotif_gateway_customer_notifications' ) ); ?>'/>
        <div class="gateway_based_notifications">

        </div>

		<?php

		echo '<div style="display: none"><div class="user_notifications">';
		$this->render_notifications_ui( $admin_options, $this->gateway_based_default_notifications(), 'key' );
		echo '</div></div>';

		echo '<div class="simple_user_notifications">';
		$this->render_notifications_ui( $admin_options, get_option( 'wpnotif_customer_notifications', $this->customer_default_notifications() ), 'customer' );
		echo '</div>';
	}

	public function admin_default_notifications() {
		$values = array(
			'wc-processing' => array(
				'enable' => 'on',
				'msg'    => __( 'You\'ve received a new order for amount {{wc-order-amount}}', 'wpnotif' )
			)
		);

		return $values;
	}

	public function user_consent_default_settings() {

		$values = array(
			'notify_user'      => array(
				'enable' => 'off',
				'msg'    => __( 'I would like to receive order updates on SMS', 'wpnotif' ),
			),
			'whatsapp_message' => array(
				'enable' => 'off',
				'msg'    => __( 'I would like to receive order updates on WhatsApp', 'wpnotif' ),
			),
			'combine_both'     => array(
				'enable' => 'off',
				'msg'    => __( 'I would like to receive order updates on SMS and WhatsApp', 'wpnotif' ),
			)
		);

		return $values;
	}

	public function render_notifications_ui( $admin_options, $admin_values, $suffix ) {
		$suffix = esc_html( $suffix );
		foreach ( $admin_options as $key => $values ) {
			$checked = '';
			$message = '';
			if ( isset( $admin_values[ $key ] ) ) {
				if ( $admin_values[ $key ]['enable'] == 'on' ) {
					$checked = 'checked';
				}
				$message = $admin_values[ $key ]['msg'];
			}
			$key = esc_html( $key );
			?>
            <table class="form-table form-switch">
                <tr>
                    <th scope="row"><label><?php echo esc_html( $values['label'] ); ?></label></th>
                    <td>
                        <div class="input-switch">
                            <input type="checkbox" class="<?php if ( $values['message'] == 1 ) {
								echo 'notification_toggle';
							} ?> show_message"
                                   name="<?php echo $suffix; ?>_<?php echo $key; ?>"
                                   id="<?php echo $suffix; ?>_<?php echo $key; ?>" <?php echo esc_attr( $checked ); ?>/>
                            <label for="<?php echo $suffix; ?>_<?php echo $key; ?>"></label>
                            <span class="status_text yes"><?php esc_html_e( 'On', 'wpnotif' ); ?></span>
                            <span class="status_text no"><?php esc_html_e( 'Off', 'wpnotif' ); ?></span>
                        </div>
                    </td>
                </tr>
            </table>
			<?php
			if ( $values['message'] == 1 ) {
				?>
                <div class="notification_message">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="<?php echo $suffix; ?>_<?php echo $key; ?>_msg">
									<?php
									if ( isset( $values['message_label'] ) ) {
										echo esc_html( $values['message_label'] );
									} else {
										esc_html_e( 'Message', 'wpnotif' );
									}
									?>
                                </label></th>
                            <td>
                                <div class="position-relative">

                            <textarea id="<?php echo $suffix; ?>_<?php echo $key; ?>_msg"
                                      name="<?php echo $suffix; ?>_<?php echo $key; ?>_msg"><?php echo esc_html( stripslashes( $message ) ); ?></textarea>

									<?php
									if ( isset( $values['placeholder'] ) ) {
										if ( $values['placeholder'] != 0 ) {
											?>
                                            <a href="https://help.unitedover.com/wpnotif/kb/placeholders"
                                               target="_blank">
                                                <span class="placeholder_list"><?php esc_html_e( 'Placeholder List', 'wpnotif' ); ?></span>
                                            </a>
											<?php
										}
									}
									?>

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
				<?php
			}
		}

	}

	public function gateway_based_default_notifications() {

		$values = array(
			'wc-processing' => array(
				'enable' => 'on',
				'msg'    => __( 'Hey! Your order #{{wc-order}} has been received by {{sitename}}. :)', 'wpnotif' )
			)
		);

		return $values;
	}

	public function customer_default_notifications() {
		$values = array(
			'wc-processing' => array(
				'enable' => 'on',
				'msg'    => __( 'Hey! Your order #{{wc-order}} has been received by {{sitename}}. :)', 'wpnotif' )
			)
		);

		return $values;
	}

	public static function WPNotif_loading() {
		?>
        <div class="wpnotif_load_overlay">
            <div class="wpnotif_load_content">
                <div class="wpnotif_spinner">
                    <div class="wpnotif_double-bounce1"></div>
                    <div class="wpnotif_double-bounce2"></div>
                </div>
            </div>
        </div>
		<?php
	}

	function activation() {

		$code         = get_option( 'wpnotif_purchasecode' );
		$license_type = get_option( 'wpnotif_license_type', 1 );

		$plugin_version = $this->get_version();
		?>


        <input type="hidden" name="wpnotif_license_type"
               value="<?php echo esc_html( get_option( 'wpnotif_license_type', 1 ) ); ?>"/>

        <input type="hidden" name="wpnotif_domain" value="<?php echo esc_html( network_home_url() ); ?>"/>

        <input type="hidden" name="wpnotif_version" value="<?php echo esc_html( $plugin_version ); ?>"/>

        <table class="form-table">
            <tr class="wpnotif_domain_type" <?php if ( ! empty( $code ) ) {
				echo 'style="display:none;"';
			} ?>>
                <th scope="row"><label
                            for="wpnotif_purchasecode"><?php esc_attr_e( "Is this domain your", "wpnotif" ); ?> </label>
                </th>
                <td>
                    <button class="button" type="button"
                            val="1"><?php esc_attr_e( 'Live Server', 'wpnotif' ); ?></button>
                    <button class="button" type="button"
                            val="2"><?php esc_attr_e( 'Testing Server', 'wpnotif' ); ?></button>
                </td>
            </tr>
            <tr class="wpnotif_prchcde" <?php if ( ! empty( $code ) ) {
				echo 'style="display:table-row;"';
			} ?>>
                <th scope="row"><label for="wpnotif_purchasecode"><?php _e( "Purchase code", "wpnotif" ); ?> </label>
                </th>
                <td>
                    <div class="wpnotif_shortcode_tbs wpnotif_shortcode_stb">
                        <input class="wpnotif_inp_wid31" nocop="1" type="text" name="wpnotif_purchasecode"
                               id="wpnotif_purchasecode"
                               placeholder="<?php esc_attr_e( "Purchase Code", "wpnotif" ); ?>" autocomplete="off"
                               value="<?php echo $code ?>" readonly>
                        <button class="button wpnotif_btn_unregister"
                                type="button"><?php _e( 'UNREGISTER', 'wpnotif' ); ?></button>
                        <img class="wpnotif_prc_ver"
                             src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/check_animated.svg'; ?>"
                             draggable="false" <?php if ( ! empty( $code ) ) {
							echo 'style="display:block;"';
						} ?>>
                        <img class="wpnotif_prc_nover"
                             src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/cross_animated.svg'; ?>"
                             draggable="false">
                    </div>
                </td>
            </tr>
        </table>

        <div class="wpnotif_desc_sep_pc wpnotif_prchcde" <?php if ( ! empty( $code ) ) {
			echo 'style="display:block;"';
		} ?>></div>
        <p class="wpnotif_ecr_desc wpnotif_cntr_algn_clr wpnotif_prchcde" <?php if ( ! empty( $code ) ) {
			echo 'style="display:block;"';
		} ?>>
			<?php _e( 'Please activate your plugin to receive updates', 'wpnotif' ); ?>
        </p>


        <table class="form-table wpnotif_prchcde" <?php if ( ! empty( $code ) ) {
			echo 'style="display:table-row;"';
		} ?>>
            <tr>
                <td>
                    <p class="wpnotif_ecr_desc wpnotif_cntr_algn wpnotif_sme_lft_algn request_live_server_addition" <?php if ( $license_type == 1 ) {
						echo 'style="display:none;"';
					} ?>>
						<?php _e( 'If you want to use same purchase code on your live server then please click the below button to request for it. Our team will take less than 12 hours to respond to your request, and will notify via email.', 'wpnotif' ); ?>
                    </p>
                    <p class="wpnotif_ecr_desc wpnotif_cntr_algn wpnotif_sme_lft_algn request_testing_server_addition" <?php if ( $license_type == 2 ) {
						echo 'style="display:none;"';
					} ?>>
						<?php _e( 'If you want to use same purchase code on your testing server then please click the below button to request for it. Our team will take less than 12 hours to respond to your request, and will notify via email.', 'wpnotif' ); ?>
                    </p>
                    <button href="https://help.unitedover.com/request-production/"
                            class="button wpnotif_request_server_addition request_live_server_addition"
                            type="button" <?php if ( $license_type == 1 ) {
						echo 'style="display:none;"';
					} ?>><?php _e( 'Request Live Server Addition', 'wpnotif' ); ?></button>
                    <button href="https://help.unitedover.com/request-staging/"
                            class="button wpnotif_request_server_addition request_testing_server_addition"
                            type="button" <?php if ( $license_type == 2 ) {
						echo 'style="display:none;"';
					} ?>><?php _e( 'Request Testing Server Addition', 'wpnotif' ); ?></button>
                </td>
            </tr>
        </table>

		<?php

	}
}


$wpnotifUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://bridge.unitedover.com/updates/changelog/updates.php?plugin=wpnotif',
	__FILE__,
	'wpnotif'
);

$wpnotifUpdateChecker->addQueryArgFilter( 'wpnotif_filter_update_checks' );
function wpnotif_filter_update_checks( $queryArgs ) {


	$queryArgs['license_key'] = get_option( 'wpnotif_purchasecode' );


	$queryArgs['request_site'] = network_home_url();

	$queryArgs['license_type'] = get_option( 'wpnotif_license_type', 1 );

	$plugin_data    = get_plugin_data( __FILE__ );
	$plugin_version = $plugin_data['Version'];

	$queryArgs['version'] = $plugin_version;


	return $queryArgs;
}

/**
 * Add a settings to plugin_action_links
 */
function wpnotif_add_plugin_action_links( $links, $file ) {
	static $this_plugin;

	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( $file == $this_plugin ) {
		$uri       = admin_url( "admin.php?page=wpnotif-settings" );
		$wsl_links = '<a href="' . $uri . '">' . esc_attr__( "Settings" ) . '</a>';

		array_unshift( $links, $wsl_links );
	}

	return $links;
}

add_filter( 'plugin_action_links', 'wpnotif_add_plugin_action_links', 10, 2 );


register_activation_hook( __FILE__, 'wpnotif_activate' );
function wpnotif_activate() {
	WPNotif_Handler::wpnotif_check();
}