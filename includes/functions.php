<?php
defined( 'ABSPATH' ) || exit;

require_once( 'filters.php' );

final class WPNotif_Handler {

	protected static $_instance = null;

	public $update_web_db = true;

	public $order_note = false;

	public $notify_admin = true;

	/**
	 *  Constructor.
	 */
	public function __construct() {
		$this->init_hooks();
	}

	/**
	 * Hook into actions and filters.
	 */
	private function init_hooks() {

		add_action( 'woocommerce_loaded', array( $this, 'woocommerce_loaded' ) );


		add_action( 'wp_ajax_wpnotif_test_api', array( $this, 'wpnotif_test_api' ) );
		add_action( 'wp_ajax_wpnotif_send_quick_sms', array( $this, 'wpnotif_send_quick_sms_ajax' ) );

		add_action( 'wp_ajax_wpnotif_update_message', array( $this, 'wpnotif_update_message' ) );

		add_action( 'init', array( $this, 'init' ) );

		add_action( 'woocommerce_review_order_before_submit', array( $this, 'user_consent_checkout' ) );
		add_action( 'woocommerce_edit_account_form', array( $this, 'user_consent_checkout' ) );

		add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'update_user_consent_checkout' ) );
		add_action( 'woocommerce_save_account_details', array( $this, 'update_user_consent_user' ) );

		add_action( 'show_user_profile', array( $this, 'user_profile_consent' ), 105 );
		add_action( 'edit_user_profile', array( $this, 'user_profile_consent' ), 105 );
		add_action( 'personal_options_update', array( $this, 'update_user_consent_admin' ) );
		add_action( 'edit_user_profile_update', array( $this, 'update_user_consent_admin' ) );

		add_action( 'init', array( $this, 'init' ) );


		add_action( 'wpnotif_chck', array( $this, 'wpnotif_chck' ) );

		add_action( 'init', array( $this, 'wpnotif_load_gateways' ), 5 );

	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function wpnotif_chck() {
		if ( ! function_exists( 'get_plugin_data' ) ) {
			/** @noinspection PhpIncludeInspection */
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
		}

		$code = get_option( 'wpnotif_purchasecode' );


		$plugin_version = WPNotif::get_version();

		$type = 'wpnotif_license_type';

		$params = array(
			'json'         => 1,
			'code'         => $code,
			'request_site' => network_home_url(),
			'slug'         => 'wpnotif',
			$type          => get_option( 'wpnotif_license_type', 1 ),
			'version'      => $plugin_version,
			'schedule'     => 1
		);

		$u = "https://bridge.unitedover.com/updates/verify.php";
		$c = curl_init();
		curl_setopt( $c, CURLOPT_URL, $u );
		curl_setopt( $c, CURLOPT_POST, true );
		curl_setopt( $c, CURLOPT_POSTFIELDS, $params );
		curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $c, CURLOPT_SSL_VERIFYPEER, false );
		$result = curl_exec( $c );

		$http_status = curl_getinfo( $c, CURLINFO_HTTP_CODE );

		$ds = 'wpnotif_dsb';

		if ( ! curl_errno( $c ) ) {


			$pcf = 'wpnotif_purchasefail';

			if ( $http_status == 200 ) {

				$response = json_decode( $result );

				if ( empty( $response ) || ! isset( $response->code ) ) {
					return;
				}

				$result = $response->code;

				if ( $result == - 99 ) {
					update_option( $ds, 1 );
					delete_option( 'wpnotif_purchasecode' );
				} else if ( $result != 1 ) {
					$check = get_option( $pcf, 2 );
					if ( $check == 2 ) {
						delete_option( 'wpnotif_purchasecode' );
						delete_option( $pcf );
						delete_option( $type );
					} else {
						update_option( $pcf, 2 );
					}


				} else if ( $result == 1 ) {
					delete_option( $pcf );
					if ( isset( $response->type ) ) {
						if ( $response->type != - 1 ) {
							update_option( $type, $response->type );
						}
					}
				}
			}
		}


		curl_close( $c );


	}

	public function wpnotif_load_gateways() {
		require_once( 'gateways.php' );
	}

	public function update_user_consent_checkout( $order_id ) {
		$this->update_user_consent( $order_id, 0 );
	}

	public function update_user_consent( $order_id, $user_id ) {
		$date            = sanitize_text_field( date( "Y-m-d H:i:s" ) );
		$enable_whatsapp = 0;
		$enable_sms      = 0;


		if ( isset( $_POST['recieve_notifications'] ) ) {
			$enable_whatsapp = 1;
			$enable_sms      = 1;
		} else {
			if ( isset( $_POST['sms_notifications'] ) ) {
				$enable_sms = 1;
			}
			if ( isset( $_POST['whatsapp_notifications'] ) ) {
				$enable_whatsapp = 1;
			}

		}
		if ( is_user_logged_in() ) {
			if ( $user_id == 0 ) {
				$user_id = get_current_user_id();
			}
			update_user_meta( $user_id, 'whatsapp_notifications', $enable_whatsapp );
			update_user_meta( $user_id, 'sms_notifications', $enable_sms );
			update_user_meta( $user_id, 'sms_notifications_time', $date );
			update_user_meta( $user_id, 'whatsapp_notifications_time', $date );

		}
		if ( $order_id != 0 ) {

			add_post_meta( $order_id, 'whatsapp_notifications', $enable_whatsapp );
			add_post_meta( $order_id, 'sms_notifications', $enable_sms );
			add_post_meta( $order_id, 'sms_notifications_time', $date );
			add_post_meta( $order_id, 'whatsapp_notifications_time', $date );
		}
	}

	public function update_user_consent_user( $user_id ) {
		$this->update_user_consent( 0, $user_id );
	}

	public function update_user_consent_admin( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		}
		$this->update_user_consent( 0, $user_id );
	}

	public function user_consent_checkout() {
		$user_id = 0;
		if ( is_user_logged_in() ) {
			$user_id = get_current_user_id();
		}
		$this->user_consent_ui( $user_id, false );
	}

	public function user_consent_ui( $user_id, $show_heading ) {


		$user_consent_values = get_option( 'wpnotif_user_consent', array() );
		if ( empty( $user_consent_values ) ) {
			return;
		}


		$notify_user          = $user_consent_values['notify_user'];
		$notify_user_whatsapp = $user_consent_values['whatsapp_message'];
		$notify_user_combine  = $user_consent_values['combine_both'];
		if ( ! $this->isEnable( $notify_user ) && ! $this->isEnable( $notify_user_whatsapp ) ) {
			return;
		}
		$whatsapp_notifications = '';
		$sms_notifications      = '';
		$combine_notifications  = '';
		if ( is_user_logged_in() ) {
			if ( get_user_meta( $user_id, 'whatsapp_notifications', true ) == 1 ) {
				$whatsapp_notifications = 'checked';
			}
			if ( get_user_meta( $user_id, 'sms_notifications', true ) == 1 ) {
				$sms_notifications = 'checked';
			}
			if ( ! empty( $sms_notifications ) && ! empty( $whatsapp_notifications ) ) {
				$combine_notifications = 'checked';
			}
		}
		if ( $show_heading ) {
			echo '<h3>' . esc_attr__( 'WPNotif User Consent', 'wpnotif' ) . '</h3>';
		}
		if ( $this->isEnable( $notify_user_combine ) ) {
			?>
            <div class="form-row form-row-wide" style="padding: 3px;">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                           type="checkbox" name="recieve_notifications"
                           value="1" <?php echo $combine_notifications; ?>/>
					<?php esc_attr_e( $notify_user_combine['msg'], 'wpnotif' ); ?>
                </label>
            </div>
			<?php
		} else {
			if ( $this->isEnable( $notify_user ) ) {
				?>
                <div class="form-row form-row-wide" style="padding: 3px;">

                    <label>
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                               type="checkbox" name="sms_notifications" value="1" <?php echo $sms_notifications; ?>/>
						<?php esc_attr_e( $notify_user['msg'], 'wpnotif' ); ?>
                    </label>
                </div>
				<?php
			}
			if ( $this->isEnable( $notify_user_whatsapp ) ) {
				?>
                <div class="form-row form-row-wide" style="padding: 3px;">

                    <label>
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                               type="checkbox" name="whatsapp_notifications"
                               value="1" <?php echo $whatsapp_notifications; ?>/>
						<?php esc_attr_e( $notify_user_whatsapp['msg'], 'wpnotif' ); ?>
                    </label>
                </div>
				<?php
			}

		}

	}

	public static function isEnable( $value ) {
		if ( $value['enable'] == 'on' ) {
			return true;
		}

		return false;
	}

	public function user_profile_consent( $user ) {
		$this->user_consent_ui( $user->ID, true );
	}

	public function wpnotif_update_message() {
		$nonce = $_REQUEST['wpnotif_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'wpnotif' ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		global $wpdb;
		$tb = $wpdb->prefix . 'wpnotif_whatsapp_messages';

		$id = sanitize_text_field( $_POST['id'] );
		if ( $id != 0 ) {
			$wpdb->delete( $tb, array(
				'id' => $id,
			), array(
					'%d'
				)
			);
		}
		WPNotif::add_wp_footer();
		die();

	}

	public function init() {
		WPNotif_Handler::wpnotif_check();
	}

	public static function wpnotif_check() {
		if ( ! wp_next_scheduled( 'wpnotif_chck' ) ) {
			wp_schedule_event( time(), 'daily', 'wpnotif_chck' );
		}
	}

	public function woocommerce_loaded() {
		$statuses = wc_get_order_statuses();
		foreach ( $statuses as $key => $status ) {
			$key = str_replace( 'wc-', '', $key );
			add_action( 'woocommerce_order_status_' . $key, array( $this, 'order_status_change' ) );
		}
	}

	public function order_status_change( $order_id ) {

		$this->process_message( $order_id, - 1 );
	}

	public function process_message( $order_id, $key = - 1 ) {

		try {
			$order = new WC_Order( $order_id );
		} catch ( Exception $e ) {
			return;
		}


		$fail = false;
		$data = $this->notify_user_order( $order_id, $order, $key, 1 );

		if ( $data == - 10 ) {
			$fail = true;
		}

		if ( $this->isWhatsappEnabled() ) {
			$data = $this->notify_user_order( $order_id, $order, $key, 1001 );
		}

		if ( $data == - 10 || ! $data ) {
			if ( $fail ) {
				return - 10;
			}
		}

		return $data;
	}

	public function notify_user_order( $order_id, $order, $key, $gateway ) {

		if ( $key == - 1 ) {
			$key = $order->get_status();
		}


		$admin_values = get_option( 'wpnotif_admin_notifications' );

		if ( $this->notify_admin ) {
			if ( isset( $admin_values[ 'wc-' . $key ] ) ) {
				$admin_notification = $admin_values[ 'wc-' . $key ];
				if ( $admin_notification['enable'] == 'on' ) {

					$admin_user_ids = $this->admin_user_ids();
					if ( ! empty( $admin_user_ids ) ) {
						$msg = $admin_notification['msg'];
						$msg = $this->parse_message( $order, $msg );
						foreach ( $admin_user_ids as $admin_user_id ) {
							$countrycode = get_the_author_meta( 'digt_countrycode', $admin_user_id );
							$mobile      = get_the_author_meta( 'digits_phone_no', $admin_user_id );
							if ( empty( $countrycode ) || empty( $mobile ) ) {

								$phone = $this->get_customer_mobile( $admin_user_id, false );

								if ( is_array( $phone ) ) {
									$countrycode = $phone['countrycode'];
									$mobile      = $phone['mobile'];
								}
							}
							if ( ! empty( $countrycode ) && ! empty( $mobile ) ) {
								$this->send_notification( $countrycode, $mobile, $msg, $gateway );
							}
						}
					}
				}
			}
		}

		$customer_id = $order->get_customer_id();
		$msg         = '';

		if ( $this->get_user_consent( $order, $gateway ) != 1 ) {
			return;
		}
		if ( get_option( 'different_gateway_content' ) == 'on' ) {
			$gateway_notifications = get_option( 'wpnotif_gateway_customer_notifications' );
			if ( ! empty( $gateway_notifications ) ) {


				$gateway_notifications = json_decode( stripslashes( $gateway_notifications ), true );
				$user_mobile           = $this->get_customer_mobile( $customer_id, $order );

				if ( is_array( $user_mobile ) ) {
					if ( $gateway == 1 ) {
						$gateway_to_use = $this->gatewaytoUse( $user_mobile['countrycode'] );
					} else {
						$gateway_to_use = $gateway;
					}

					if ( isset( $gateway_notifications[ 'wpnotif_' . $gateway_to_use ] ) ) {
						$customer_notification = $gateway_notifications[ 'wpnotif_' . $gateway_to_use ];

						if ( isset( $customer_notification[ 'key_wc-' . $key ] ) ) {
							$customer_notification = $customer_notification[ 'key_wc-' . $key ];
							if ( $customer_notification['enable'] == 'on' ) {
								$msg         = $customer_notification['msg'];
								$user_mobile = $this->get_customer_mobile( $customer_id, $order );
							}
						}
					}
				}


			}

		} else {
			$customer_values = get_option( 'wpnotif_customer_notifications' );
			if ( isset( $customer_values[ 'wc-' . $key ] ) ) {
				$customer_notification = $customer_values[ 'wc-' . $key ];
				if ( $customer_notification['enable'] == 'on' ) {
					$msg         = $customer_notification['msg'];
					$user_mobile = $this->get_customer_mobile( $customer_id, $order );
				}
			}
		}


		if ( is_array( $user_mobile ) && ! empty( $msg ) ) {
			$msg = $this->parse_message( $order, $msg );

			if ( $gateway == 1001 ) {
				$msg = str_replace( '\n', '%0A', $msg );
			}
			if ( ! $this->order_note ) {
				$this->order_note = true;
				$order->add_order_note( $msg );
				$order->save();
			}

			$this->send_notification( $user_mobile['countrycode'], $user_mobile['mobile'], $msg, $gateway );

			return array( $user_mobile['countrycode'] . $user_mobile['mobile'] => $msg );

		} else {
			return - 10;
		}


	}

	public function admin_user_ids() {
		$admins = get_option( 'wpnotf_admin_user_role', array( 'administrator' ) );
		if ( empty( $admins ) ) {
			return array();
		}

		//Grab wp DB
		global $wpdb;
		//Get all users in the DB
		$wp_user_search = $wpdb->get_results( "SELECT ID, display_name FROM $wpdb->users ORDER BY ID" );

		//Blank array
		$adminArray = array();
		//Loop through all users
		foreach ( $wp_user_search as $userid ) {
			//Current user ID we are looping through
			$curID = $userid->ID;
			//Grab the user info of current ID
			$curuser = get_userdata( $curID );
			//Current user level
			$user_roles = $curuser->roles;
			foreach ( $admins as $admin ) {
				if ( in_array( $admin, $user_roles, true ) ) {
					{
						$adminArray[] = $curID;
					}

				}
			}
		}

		return $adminArray;
	}

	public function parse_message( $order, $message ) {

		if ( !$order ) {
			return $message;
		}
		$products = array();

		foreach ( $order->get_items() as $item ) {
			$products[] = $item['name'];

		}

		$message = stripslashes( $message );

		$refund_reason = '';
		if ( ! empty( $order->get_refunds() ) ) {
			$refund_reason = $order->get_refunds()[0]->get_reason();
		}
		$order_id  = $order->get_id();
		$site_name = get_bloginfo();

		$items_name_collapse = '';
		if ( sizeof( $products ) > 1 ) {
			$total_item = sizeof( $products ) - 1;
			if ( $total_item == 1 ) {
				$collapse_count = sprintf( esc_html__( 'and %s item', 'wpnotif' ), $total_item );
			} else {
				$collapse_count = sprintf( esc_html__( 'and %s items', 'wpnotif' ), $total_item );
			}
			$items_name_collapse = $products[0] . ' ' . $collapse_count;
		} else {
			$items_name_collapse = $products[0];
		}

		$placeholder_values = array(
			'{{sitename}}'                   => $site_name,
			'{{wc-order}}'                   => $order->get_order_number(),
			'{{wc-order-id}}'                => $order_id,
			'{{wc-order-date}}'              => $order->get_date_created()->format( 'Y F j, g:i a' ),
			'{{wc-order-status}}'            => wc_get_order_status_name( $order->get_status() ),
			'{{wc-payment-method}}'          => $order->get_payment_method(),
			'{{wc-transaction-id}}'          => $order->get_transaction_id(),
			'{{wc-shipping-method}}'         => $order->get_shipping_method(),
			'{{wc-product-names}}'           => implode( ", ", $products ),
			'{{wc-product-name-count}}'      => $items_name_collapse,
			'{{wc-total-products}}'          => count( $order->get_items() ),
			'{{wc-total-item}}'              => $order->get_item_count(),
			'{{wc-order-amount}}'            => $order->get_total(),
			'{{wc-discount}}'                => $order->get_discount_total(),
			'{{wc-tax}}'                     => $order->get_tax_totals(),
			'{{wc-order-amount-ex-tax}}'     => $order->get_subtotal(),
			'{{wc-shipping-cost}}'           => $order->get_shipping_total(),
			'{{wc-refund-amount}}'           => $order->get_total_refunded(),
			'{{wc-refund-reason}}'           => $refund_reason,
			'{{wc-billing-first-name}}'      => $order->get_billing_first_name(),
			'{{wc-billing-last-name}}'       => $order->get_billing_last_name(),
			'{{wc-billing-company}}'         => $order->get_billing_company(),
			'{{wc-billing-address-line-1}}'  => $order->get_billing_address_1(),
			'{{wc-billing-address-line-2}}'  => $order->get_billing_address_2(),
			'{{wc-billing-city}}'            => $order->get_billing_city(),
			'{{wc-billing-postcode}}'        => $order->get_billing_postcode(),
			'{{wc-billing-state}}'           => $order->get_billing_state(),
			'{{wc-billing-country}}'         => $order->get_billing_country(),
			'{{wc-billing-email}}'           => $order->get_billing_email(),
			'{{wc-billing-phone}}'           => $order->get_billing_phone(),
			'{{wc-shipping-first-name}}'     => $order->get_shipping_first_name(),
			'{{wc-shipping-last-name}}'      => $order->get_shipping_last_name(),
			'{{wc-shipping-company}}'        => $order->get_shipping_company(),
			'{{wc-shipping-address-line-1}}' => $order->get_shipping_address_1(),
			'{{wc-shipping-address-line-2}}' => $order->get_shipping_address_2(),
			'{{wc-shipping-city}}'           => $order->get_shipping_city(),
			'{{wc-shipping-postcode}}'       => $order->get_shipping_postcode(),
			'{{wc-shipping-state}}'          => $order->get_shipping_state(),
			'{{wc-shipping-country}}'        => $order->get_shipping_country(),
		);
		$message            = str_replace( array_keys( $placeholder_values ), $placeholder_values, $message );

		$message = $this->replace_placeholders( $order, $message );

		return $message;
	}

	public function replace_placeholders( $order, $msg ) {

		$msg = apply_filters( 'wpnotif_filter_message', $msg, $order );

		$placeholders = array();

		$customer = $order->get_customer_id();
		preg_match_all( '/{{([^#]+?)}}/', $msg, $placeholders );
		if ( is_array( $placeholders ) ) {
			if ( isset( $placeholders[1] ) ) {
				foreach ( $placeholders[1] as $placeholder ) {
					$value = '';
					if ( strpos( $placeholder, 'user-' ) === 0 ) {

						$meta_key = $this->str_replace_once( 'user-', '', $placeholder );
						$value    = get_user_meta( $customer, $meta_key, true );
						if ( ! $value ) {
							$value = '';
						}

					} else if (
						strpos( $placeholder, 'order-' ) === 0 ||
						strpos( $placeholder, 'post-' ) === 0
					) {

						$type = 0;
						if ( strpos( $placeholder, 'order-' ) === 0 ) {
							$type     = 1;
							$meta_key = $this->str_replace_once( 'order-', '', $placeholder );
						} else if ( strpos( $placeholder, 'post-' ) === 0 ) {
							$type     = 2;
							$meta_key = $this->str_replace_once( 'post-', '', $placeholder );
						}

						$is_array = false;
						if ( strpos( $meta_key, ':' ) !== false ) {
							$meta_key_array = explode( ":", $meta_key, 2 );
							$meta_key       = $meta_key_array[0];
							$array_key      = $meta_key_array[1];
							$is_array       = true;
						}
						if ( $type == 1 ) {
							$value = $order->get_meta( $meta_key );
						} else if ( $type == 2 ) {
							$value = get_post_meta( $order->get_id(), $meta_key, ! $is_array );

						}

						if ( empty( $value ) ) {
							$value = '';
						} else if ( $is_array ) {
							if ( $type == 2 ) {
								$value = $value[0];
							}

							$value = $value[0][ $array_key ];
						}


					}
					$value = apply_filters( 'wpnotif_placeholder_args', $value, $placeholder, $msg, $order );


					$msg = str_replace( '{{' . $placeholder . '}}', $value, $msg );


				}
			}
		}

		return $msg;
	}

	public function str_replace_once( $str_pattern, $str_replacement, $string ) {
		if ( strpos( $string, $str_pattern ) !== false ) {
			return substr_replace( $string, $str_replacement, strpos( $string, $str_pattern ), strlen( $str_pattern ) );
		}

		return $string;
	}

	public static function get_customer_mobile( $user_id, $order = false ) {
		if ( ! $order && $user_id != 0 ) {
			$billing_country = get_user_meta( $user_id, 'billing_country', true );
			$billing_phone   = get_user_meta( $user_id, 'billing_phone', true );
		} else {
			$billing_country = $order->get_billing_country();
			$billing_phone   = $order->get_billing_phone();
		}

		$billing_country_code = WPNotif_Handler::getCountryCode( $billing_country );
		$parse_mobile         = WPNotif_Handler::parseMobile( $billing_country_code . $billing_phone );

		if ( ! $parse_mobile ) {
			$parse_mobile = WPNotif_Handler::parseMobile( $billing_phone );
		}

		if ( ! $parse_mobile ) {
			$dig_countrycode = get_the_author_meta( 'digt_countrycode', $user_id );
			$dig_mobile      = get_the_author_meta( 'digits_phone_no', $user_id );

			return array( 'countrycode' => $dig_countrycode, 'mobile' => $dig_mobile );
		}

		return $parse_mobile;
	}

	public static function getCountryCode( $country ) {
		$country_codes = array(
			"AF" => "93",
			"AL" => "355",
			"DZ" => "213",
			"AS" => "1",
			"AD" => "376",
			"AO" => "244",
			"AI" => "1",
			"AQ" => "672",
			"AG" => "1",
			"AR" => "54",
			"AM" => "374",
			"AW" => "297",
			"AU" => "61",
			"AT" => "43",
			"AZ" => "994",
			"BS" => "1",
			"BH" => "973",
			"BD" => "880",
			"BB" => "1",
			"BY" => "375",
			"BE" => "32",
			"BZ" => "501",
			"BJ" => "229",
			"BM" => "1",
			"BT" => "975",
			"BO" => "591",
			"BA" => "387",
			"BW" => "267",
			"BR" => "55",
			"IO" => "246",
			"VG" => "1",
			"BN" => "673",
			"BG" => "359",
			"BF" => "226",
			"BI" => "257",
			"KH" => "855",
			"CM" => "237",
			"CA" => "1",
			"CV" => "238",
			"KY" => "1",
			"CF" => "236",
			"TD" => "235",
			"CL" => "56",
			"CN" => "86",
			"CX" => "61",
			"CC" => "61",
			"CO" => "57",
			"KM" => "269",
			"CK" => "682",
			"CR" => "506",
			"HR" => "385",
			"CU" => "53",
			"CW" => "599",
			"CY" => "357",
			"CZ" => "420",
			"CD" => "243",
			"DK" => "45",
			"DJ" => "253",
			"DM" => "1",
			"DO" => "1",
			"TL" => "670",
			"EC" => "593",
			"EG" => "20",
			"SV" => "503",
			"GQ" => "240",
			"ER" => "291",
			"EE" => "372",
			"ET" => "251",
			"FK" => "500",
			"FO" => "298",
			"FJ" => "679",
			"FI" => "358",
			"FR" => "33",
			"PF" => "689",
			"GA" => "241",
			"GM" => "220",
			"GE" => "995",
			"DE" => "49",
			"GH" => "233",
			"GI" => "350",
			"GR" => "30",
			"GL" => "299",
			"GD" => "1",
			"GU" => "1",
			"GT" => "502",
			"GG" => "44",
			"GN" => "224",
			"GW" => "245",
			"GY" => "592",
			"HT" => "509",
			"HN" => "504",
			"HK" => "852",
			"HU" => "36",
			"IS" => "354",
			"IN" => "91",
			"ID" => "62",
			"IR" => "98",
			"IQ" => "964",
			"IE" => "353",
			"IM" => "44",
			"IL" => "972",
			"IT" => "39",
			"CI" => "225",
			"JM" => "1",
			"JP" => "81",
			"JE" => "44",
			"JO" => "962",
			"KZ" => "7",
			"KE" => "254",
			"KI" => "686",
			"XK" => "383",
			"KW" => "965",
			"KG" => "996",
			"LA" => "856",
			"LV" => "371",
			"LB" => "961",
			"LS" => "266",
			"LR" => "231",
			"LY" => "218",
			"LI" => "423",
			"LT" => "370",
			"LU" => "352",
			"MO" => "853",
			"MK" => "389",
			"MG" => "261",
			"MW" => "265",
			"MY" => "60",
			"MV" => "960",
			"ML" => "223",
			"MT" => "356",
			"MH" => "692",
			"MR" => "222",
			"MU" => "230",
			"YT" => "262",
			"MX" => "52",
			"FM" => "691",
			"MD" => "373",
			"MC" => "377",
			"MN" => "976",
			"ME" => "382",
			"MS" => "1",
			"MA" => "212",
			"MZ" => "258",
			"MM" => "95",
			"NA" => "264",
			"NR" => "674",
			"NP" => "977",
			"NL" => "31",
			"AN" => "599",
			"NC" => "687",
			"NZ" => "64",
			"NI" => "505",
			"NE" => "227",
			"NG" => "234",
			"NU" => "683",
			"KP" => "850",
			"MP" => "1",
			"NO" => "47",
			"OM" => "968",
			"PK" => "92",
			"PW" => "680",
			"PS" => "970",
			"PA" => "507",
			"PG" => "675",
			"PY" => "595",
			"PE" => "51",
			"PH" => "63",
			"PN" => "64",
			"PL" => "48",
			"PT" => "351",
			"PR" => "1",
			"QA" => "974",
			"CG" => "242",
			"RE" => "262",
			"RO" => "40",
			"RU" => "7",
			"RW" => "250",
			"BL" => "590",
			"SH" => "290",
			"KN" => "1",
			"LC" => "1",
			"MF" => "590",
			"PM" => "508",
			"VC" => "1",
			"WS" => "685",
			"SM" => "378",
			"ST" => "239",
			"SA" => "966",
			"SN" => "221",
			"RS" => "381",
			"SC" => "248",
			"SL" => "232",
			"SG" => "65",
			"SX" => "1",
			"SK" => "421",
			"SI" => "386",
			"SB" => "677",
			"SO" => "252",
			"ZA" => "27",
			"KR" => "82",
			"SS" => "211",
			"ES" => "34",
			"LK" => "94",
			"SD" => "249",
			"SR" => "597",
			"SJ" => "47",
			"SZ" => "268",
			"SE" => "46",
			"CH" => "41",
			"SY" => "963",
			"TW" => "886",
			"TJ" => "992",
			"TZ" => "255",
			"TH" => "66",
			"TG" => "228",
			"TK" => "690",
			"TO" => "676",
			"TT" => "1",
			"TN" => "216",
			"TR" => "90",
			"TM" => "993",
			"TC" => "1",
			"TV" => "688",
			"VI" => "1",
			"UG" => "256",
			"UA" => "380",
			"AE" => "971",
			"GB" => "44",
			"US" => "1",
			"UY" => "598",
			"UZ" => "998",
			"VU" => "678",
			"VA" => "379",
			"VE" => "58",
			"VN" => "84",
			"WF" => "681",
			"EH" => "212",
			"YE" => "967",
			"ZM" => "260",
			"ZW" => "263"
		);

		return $country_codes[ $country ];
	}

	public static function parseMobile( $mobile ) {
		if ( strpos( $mobile, '+' ) !== 0 ) {
			$mobile = '+' . $mobile;
		}
		$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
		try {
			$numberProto = $phoneUtil->parse( $mobile );
			$isValid     = $phoneUtil->isValidNumber( $numberProto );
			if ( $isValid ) {
				$ccode = $numberProto->getCountryCode();
				$mob   = $numberProto->getNationalNumber();

				return array( 'countrycode' => $ccode, 'mobile' => $mob );
			}

			return false;

		} catch ( \libphonenumber\NumberParseException $e ) {
			return false;
		}
	}

	public function send_notification( $countrycode, $mobile, $message, $gateway ) {
		$message = trim( $message );

		if ( empty( $message ) ) {
			return;
		}
		if ( $gateway == 1 ) {
			$gateway = $this->gatewaytoUse( $countrycode );
		}
		$status = $this->send_message( $gateway, $countrycode, $mobile, $message );
	}

	public function gatewaytoUse( $countrycode ) {


		$wpnotif_gateways = get_option( 'wpnotif_gateways', - 1 );
		if ( $wpnotif_gateways == - 1 || empty( $wpnotif_gateways ) ) {
			return - 1;
		} else {
			$countrycode  = str_replace( "+", "", $countrycode );
			$gateways     = json_decode( stripslashes( $wpnotif_gateways ), true );
			$gatewayToUse = 0;
			foreach ( $gateways as $gc => $values ) {
				$gatewayCode = $values['gateway'];
				$countries   = $values['countries'];
				if ( $gatewayCode > 1000 ) {
					continue;
				}
				if ( $values['enable'] != 'on' ) {
					continue;
				}

				if ( $countries == 'all' && $gatewayToUse == 0 ) {
					$gatewayToUse = $gatewayCode;
				} else if ( $countries != 'all' && ! empty( $countries ) ) {
					$countriesArray = explode( ",", $values['ccodes'] );
					if ( in_array( $countrycode, $countriesArray ) ) {
						$gatewayToUse = $gatewayCode;
						break;
					}
				}
			}

			return $gatewayToUse;

		}


	}

	public function send_message( $gateway, $countrycode, $mobile, $messagetemplate, $testCall = false ) {
		if ( $gateway == 0 ) {
			return;
		}

		if ( ! $testCall ) {
			$code = get_option( 'wpnotif_purchasecode' );
			if ( empty( $code ) ) {
				return false;
			}
		}

		return WPNotif_SMS_handler::send_sms( $gateway, $countrycode, $mobile, $messagetemplate, $testCall, $this->update_web_db );
	}

	public static function get_user_consent( $order, $gateway = - 1 ) {
		$user_consent_values    = get_option( 'wpnotif_user_consent', array() );
		$whatsapp_notifications = 0;
		$sms_notifications      = 0;
		$check_consent          = 0;
		$sms_consent            = 1;
		$whatsapp_consent       = 1;

		if ( empty( $user_consent_values ) ) {
			$whatsapp_notifications = 1;
			$sms_notifications      = 1;
		} else {
			$notify_user          = $user_consent_values['notify_user'];
			$notify_user_whatsapp = $user_consent_values['whatsapp_message'];


			if ( ! WPNotif_Handler::isEnable( $notify_user ) && ! WPNotif_Handler::isEnable( $notify_user_whatsapp ) ) {
				$check_consent          = 0;
				$sms_notifications      = 1;
				$whatsapp_notifications = 1;
			} else {

				$check_consent = 1;
				$customer_id   = 0;
				if ( is_object( $order ) ) {
					$customer_id = $order->get_customer_id();
				}
				if ( ! $customer_id || $customer_id == 0 ) {
					$order_id = $order->get_id();

					if ( get_post_meta( $order_id, 'whatsapp_notifications', true ) == 1 ) {
						$whatsapp_notifications = 1;
					}
					if ( get_post_meta( $order_id, 'sms_notifications', true ) == 1 ) {
						$sms_notifications = 1;
					}
				} else {
					if ( get_user_meta( $customer_id, 'whatsapp_notifications', true ) == 1 ) {
						$whatsapp_notifications = 1;
					}
					if ( get_user_meta( $customer_id, 'sms_notifications', true ) == 1 ) {
						$sms_notifications = 1;
					}
				}

				if ( ! WPNotif_Handler::isEnable( $notify_user ) ) {
					$sms_notifications = 1;
					$sms_consent       = 0;
				}
				if ( ! WPNotif_Handler::isEnable( $notify_user_whatsapp ) ) {
					$whatsapp_notifications = 1;
					$whatsapp_consent       = 0;
				}
			}

		}
		if ( $gateway == - 1 ) {
			return array(
				'check_consent'          => $check_consent,
				'sms_notifications'      => $sms_notifications,
				'sms_consent'            => $sms_consent,
				'whatsapp_consent'       => $whatsapp_consent,
				'whatsapp_notifications' => $whatsapp_notifications,
			);
		} else if ( $gateway == 1001 ) {
			return $whatsapp_notifications;
		} else {
			return $sms_notifications;
		}

	}

	public static function isWhatsappEnabled() {
		$wpnotif_gateways = get_option( 'wpnotif_gateways', - 1 );
		if ( $wpnotif_gateways == - 1 || empty( $wpnotif_gateways ) ) {
			return - 1;
		} else {
			$gateways         = json_decode( stripslashes( $wpnotif_gateways ), true );
			$whatsapp_gateway = $gateways['gc_1001'];
			if ( $whatsapp_gateway['enable'] == 'on' ) {
				return true;
			}
		}

		return false;
	}

	public function wpnotif_send_quick_sms_ajax() {
		if ( ! current_user_can( 'manage_options' ) ) {
			echo '0';
			die();
		}

		$nonce = $_REQUEST['wpnotif_nonce'];
		if ( ! wp_verify_nonce( $nonce, 'wpnotif' ) ) {
			wp_send_json_error( array( 'msg' => esc_attr__( 'Error', 'wpnotif' ) ) );

			die();
		}

		$mobiles = $_POST['mobile'];
		if ( ! is_array( $mobiles ) ) {
			$mobiles = array( $mobiles );
		}
		if ( empty( $mobiles ) ) {
			wp_send_json_error( array( 'msg' => esc_attr__( 'Invalid Mobile Number', 'wpnotif' ) ) );
			die();
		}
		$message = $_POST['quick_message'];
		if ( empty( $message ) && $_POST['trigger_order_status'] != 1 ) {
			wp_send_json_error( array( 'msg' => esc_attr__( 'Please enter a valid message!', 'wpnotif' ) ) );
			die();
		}

		if ( ! empty( $message ) ) {
			if ( isset( $_POST['order_id'] ) && $_POST['order_id'] != 0 ) {
				try {
					$order_id = $_POST['order_id'];
					$order    = new WC_Order( $order_id );

					$message = $this->parse_message( $order, $message );
				} catch ( Exception $e ) {
					$order = 0;
				}
			} else {
				$order = 0;
			}


		}

		$phoneUtil            = \libphonenumber\PhoneNumberUtil::getInstance();
		$message_send         = false;
		$phone_valid          = false;
		$data                 = array();
		$isWhatsappWebEnabled = $this->isWhatsappWebEnabled();
		$isWhatsappEnabled    = $this->isWhatsappEnabled();
		$mobile_count         = count( $mobiles );
		if ( $mobile_count == 1 || $_POST['trigger_order_status'] == 1 ) {
			$this->update_web_db = false;
		}
		foreach ( $mobiles as $mobile ) {
			$mobile = trim( $mobile );
			try {
				if ( strpos( $mobile, '+' ) !== 0 ) {
					$mobile = '+' . $mobile;
				}

				$numberProto = $phoneUtil->parse( $mobile );

				$isValid = $phoneUtil->isValidNumber( $numberProto );
				if ( $isValid ) {
					$gateway     = $this->gatewaytoUse( $numberProto->getCountryCode() );
					$phone_valid = true;
					if ( $_POST['trigger_order_status'] == 1 ) {
						$this->notify_admin = false;
						$data               = $this->process_message( sanitize_text_field( $_POST['order_id'] ), - 1 );
						if ( $data == - 10 ) {
							wp_send_json_error( array( 'msg' => esc_attr__( 'Error: Message template not found!', 'wpnotif' ) ) );
						}

						break;
					} else {

						$status = $this->send_message( $gateway, $numberProto->getCountryCode(), $numberProto->getNationalNumber(), $message );
						if ( $isWhatsappEnabled ) {

							$this->send_whatsapp_message( $numberProto->getCountryCode(), $numberProto->getNationalNumber(), $message );

						}
						if ( $isWhatsappWebEnabled && $mobile_count == 1 ) {
							$data[ $numberProto->getCountryCode() . $numberProto->getNationalNumber() ] = $message;
						}
					}
				}
			} catch ( \libphonenumber\NumberParseException $e ) {

			}
		}
		if ( is_object( $order ) ) {

			if ( ! $this->order_note ) {
				$this->order_note = true;
				$order->add_order_note( $message );
				$order->save();
			}


		}
		if ( $phone_valid ) {
			wp_send_json_success( array( 'msg' => esc_attr__( 'Message Sent', 'wpnotif' ), 'data' => $data ) );
			die();
		} else {
			wp_send_json_error( array( 'msg' => esc_attr__( 'Invalid Mobile Number', 'wpnotif' ) ) );
			die();
		}

	}

	public static function isWhatsappWebEnabled() {
		if ( WPNotif_Handler::isWhatsappEnabled() ) {
			$whatsapp         = get_option( 'wpnotif_whatsapp' );
			$whatsapp_gateway = $whatsapp['whatsapp_gateway'];
			if ( $whatsapp_gateway == 2 ) {
				return true;
			}
		}

		return false;
	}

	public function send_whatsapp_message( $countrycode, $mobile, $messagetemplate, $testCall = false ) {
		$messagetemplate = str_replace( '\n', '%0A', $messagetemplate );

		$this->send_message( 1001, $countrycode, $mobile, $messagetemplate, $testCall );
	}

	public function sanitize_mobile( $mobile ) {
		$pl = '';
		if ( substr( $mobile, 0, 1 ) == '+' ) {
			$pl = '+';
		}
		$mobile = $pl . preg_replace( '/[\s+()-]+/', '', $mobile );

		return ltrim( sanitize_text_field( $mobile ), '0' );
	}

	public function wpnotif_test_api() {

		if ( ! current_user_can( 'manage_options' ) ) {
			echo '0';
			die();
		}

		$mobile      = sanitize_text_field( $_POST['digt_mobile'] );
		$countrycode = sanitize_text_field( $_POST['digt_countrycode'] );
		if ( empty( $mobile ) || ! is_numeric( $mobile ) || empty( $countrycode ) || ! is_numeric( $countrycode ) ) {
			esc_attr_e( 'Invalid Mobile Number', 'wpnotif' );
			die();
		}

		$gateway = sanitize_text_field( $_POST['gateway'] );


		$messagetemplate = 'Congrats, your API details is correct. - Bot WPNotif';
		$result          = $this->send_message( $gateway, $countrycode, $mobile, $messagetemplate, true );
		if ( ! $result ) {
			esc_attr_e( 'Error', 'wpnotif' );
			die();
		}
		print_r( $result );
		die();

	}
}


if ( ! function_exists( 'convertToUnicode' ) ) {
//This function to convert messages to our special UNICODE, use it to convert message before send it through the API
	function convertToUnicode( $message ) {
		$chrArray[0]       = "،";
		$unicodeArray[0]   = "060C";
		$chrArray[1]       = "؛";
		$unicodeArray[1]   = "061B";
		$chrArray[2]       = "؟";
		$unicodeArray[2]   = "061F";
		$chrArray[3]       = "ء";
		$unicodeArray[3]   = "0621";
		$chrArray[4]       = "آ";
		$unicodeArray[4]   = "0622";
		$chrArray[5]       = "أ";
		$unicodeArray[5]   = "0623";
		$chrArray[6]       = "ؤ";
		$unicodeArray[6]   = "0624";
		$chrArray[7]       = "إ";
		$unicodeArray[7]   = "0625";
		$chrArray[8]       = "ئ";
		$unicodeArray[8]   = "0626";
		$chrArray[9]       = "ا";
		$unicodeArray[9]   = "0627";
		$chrArray[10]      = "ب";
		$unicodeArray[10]  = "0628";
		$chrArray[11]      = "ة";
		$unicodeArray[11]  = "0629";
		$chrArray[12]      = "ت";
		$unicodeArray[12]  = "062A";
		$chrArray[13]      = "ث";
		$unicodeArray[13]  = "062B";
		$chrArray[14]      = "ج";
		$unicodeArray[14]  = "062C";
		$chrArray[15]      = "ح";
		$unicodeArray[15]  = "062D";
		$chrArray[16]      = "خ";
		$unicodeArray[16]  = "062E";
		$chrArray[17]      = "د";
		$unicodeArray[17]  = "062F";
		$chrArray[18]      = "ذ";
		$unicodeArray[18]  = "0630";
		$chrArray[19]      = "ر";
		$unicodeArray[19]  = "0631";
		$chrArray[20]      = "ز";
		$unicodeArray[20]  = "0632";
		$chrArray[21]      = "س";
		$unicodeArray[21]  = "0633";
		$chrArray[22]      = "ش";
		$unicodeArray[22]  = "0634";
		$chrArray[23]      = "ص";
		$unicodeArray[23]  = "0635";
		$chrArray[24]      = "ض";
		$unicodeArray[24]  = "0636";
		$chrArray[25]      = "ط";
		$unicodeArray[25]  = "0637";
		$chrArray[26]      = "ظ";
		$unicodeArray[26]  = "0638";
		$chrArray[27]      = "ع";
		$unicodeArray[27]  = "0639";
		$chrArray[28]      = "غ";
		$unicodeArray[28]  = "063A";
		$chrArray[29]      = "ف";
		$unicodeArray[29]  = "0641";
		$chrArray[30]      = "ق";
		$unicodeArray[30]  = "0642";
		$chrArray[31]      = "ك";
		$unicodeArray[31]  = "0643";
		$chrArray[32]      = "ل";
		$unicodeArray[32]  = "0644";
		$chrArray[33]      = "م";
		$unicodeArray[33]  = "0645";
		$chrArray[34]      = "ن";
		$unicodeArray[34]  = "0646";
		$chrArray[35]      = "ه";
		$unicodeArray[35]  = "0647";
		$chrArray[36]      = "و";
		$unicodeArray[36]  = "0648";
		$chrArray[37]      = "ى";
		$unicodeArray[37]  = "0649";
		$chrArray[38]      = "ي";
		$unicodeArray[38]  = "064A";
		$chrArray[39]      = "ـ";
		$unicodeArray[39]  = "0640";
		$chrArray[40]      = "ً";
		$unicodeArray[40]  = "064B";
		$chrArray[41]      = "ٌ";
		$unicodeArray[41]  = "064C";
		$chrArray[42]      = "ٍ";
		$unicodeArray[42]  = "064D";
		$chrArray[43]      = "َ";
		$unicodeArray[43]  = "064E";
		$chrArray[44]      = "ُ";
		$unicodeArray[44]  = "064F";
		$chrArray[45]      = "ِ";
		$unicodeArray[45]  = "0650";
		$chrArray[46]      = "ّ";
		$unicodeArray[46]  = "0651";
		$chrArray[47]      = "ْ";
		$unicodeArray[47]  = "0652";
		$chrArray[48]      = "!";
		$unicodeArray[48]  = "0021";
		$chrArray[49]      = '"';
		$unicodeArray[49]  = "0022";
		$chrArray[50]      = "#";
		$unicodeArray[50]  = "0023";
		$chrArray[51]      = "$";
		$unicodeArray[51]  = "0024";
		$chrArray[52]      = "%";
		$unicodeArray[52]  = "0025";
		$chrArray[53]      = "&";
		$unicodeArray[53]  = "0026";
		$chrArray[54]      = "'";
		$unicodeArray[54]  = "0027";
		$chrArray[55]      = "(";
		$unicodeArray[55]  = "0028";
		$chrArray[56]      = ")";
		$unicodeArray[56]  = "0029";
		$chrArray[57]      = "*";
		$unicodeArray[57]  = "002A";
		$chrArray[58]      = "+";
		$unicodeArray[58]  = "002B";
		$chrArray[59]      = ",";
		$unicodeArray[59]  = "002C";
		$chrArray[60]      = "-";
		$unicodeArray[60]  = "002D";
		$chrArray[61]      = ".";
		$unicodeArray[61]  = "002E";
		$chrArray[62]      = "/";
		$unicodeArray[62]  = "002F";
		$chrArray[63]      = "0";
		$unicodeArray[63]  = "0030";
		$chrArray[64]      = "1";
		$unicodeArray[64]  = "0031";
		$chrArray[65]      = "2";
		$unicodeArray[65]  = "0032";
		$chrArray[66]      = "3";
		$unicodeArray[66]  = "0033";
		$chrArray[67]      = "4";
		$unicodeArray[67]  = "0034";
		$chrArray[68]      = "5";
		$unicodeArray[68]  = "0035";
		$chrArray[69]      = "6";
		$unicodeArray[69]  = "0036";
		$chrArray[70]      = "7";
		$unicodeArray[70]  = "0037";
		$chrArray[71]      = "8";
		$unicodeArray[71]  = "0038";
		$chrArray[72]      = "9";
		$unicodeArray[72]  = "0039";
		$chrArray[73]      = ":";
		$unicodeArray[73]  = "003A";
		$chrArray[74]      = ";";
		$unicodeArray[74]  = "003B";
		$chrArray[75]      = "<";
		$unicodeArray[75]  = "003C";
		$chrArray[76]      = "=";
		$unicodeArray[76]  = "003D";
		$chrArray[77]      = ">";
		$unicodeArray[77]  = "003E";
		$chrArray[78]      = "?";
		$unicodeArray[78]  = "003F";
		$chrArray[79]      = "@";
		$unicodeArray[79]  = "0040";
		$chrArray[80]      = "A";
		$unicodeArray[80]  = "0041";
		$chrArray[81]      = "B";
		$unicodeArray[81]  = "0042";
		$chrArray[82]      = "C";
		$unicodeArray[82]  = "0043";
		$chrArray[83]      = "D";
		$unicodeArray[83]  = "0044";
		$chrArray[84]      = "E";
		$unicodeArray[84]  = "0045";
		$chrArray[85]      = "F";
		$unicodeArray[85]  = "0046";
		$chrArray[86]      = "G";
		$unicodeArray[86]  = "0047";
		$chrArray[87]      = "H";
		$unicodeArray[87]  = "0048";
		$chrArray[88]      = "I";
		$unicodeArray[88]  = "0049";
		$chrArray[89]      = "J";
		$unicodeArray[89]  = "004A";
		$chrArray[90]      = "K";
		$unicodeArray[90]  = "004B";
		$chrArray[91]      = "L";
		$unicodeArray[91]  = "004C";
		$chrArray[92]      = "M";
		$unicodeArray[92]  = "004D";
		$chrArray[93]      = "N";
		$unicodeArray[93]  = "004E";
		$chrArray[94]      = "O";
		$unicodeArray[94]  = "004F";
		$chrArray[95]      = "P";
		$unicodeArray[95]  = "0050";
		$chrArray[96]      = "Q";
		$unicodeArray[96]  = "0051";
		$chrArray[97]      = "R";
		$unicodeArray[97]  = "0052";
		$chrArray[98]      = "S";
		$unicodeArray[98]  = "0053";
		$chrArray[99]      = "T";
		$unicodeArray[99]  = "0054";
		$chrArray[100]     = "U";
		$unicodeArray[100] = "0055";
		$chrArray[101]     = "V";
		$unicodeArray[101] = "0056";
		$chrArray[102]     = "W";
		$unicodeArray[102] = "0057";
		$chrArray[103]     = "X";
		$unicodeArray[103] = "0058";
		$chrArray[104]     = "Y";
		$unicodeArray[104] = "0059";
		$chrArray[105]     = "Z";
		$unicodeArray[105] = "005A";
		$chrArray[106]     = "[";
		$unicodeArray[106] = "005B";
		$char              = "\ ";
		$chrArray[107]     = trim( $char );
		$unicodeArray[107] = "005C";
		$chrArray[108]     = "]";
		$unicodeArray[108] = "005D";
		$chrArray[109]     = "^";
		$unicodeArray[109] = "005E";
		$chrArray[110]     = "_";
		$unicodeArray[110] = "005F";
		$chrArray[111]     = "`";
		$unicodeArray[111] = "0060";
		$chrArray[112]     = "a";
		$unicodeArray[112] = "0061";
		$chrArray[113]     = "b";
		$unicodeArray[113] = "0062";
		$chrArray[114]     = "c";
		$unicodeArray[114] = "0063";
		$chrArray[115]     = "d";
		$unicodeArray[115] = "0064";
		$chrArray[116]     = "e";
		$unicodeArray[116] = "0065";
		$chrArray[117]     = "f";
		$unicodeArray[117] = "0066";
		$chrArray[118]     = "g";
		$unicodeArray[118] = "0067";
		$chrArray[119]     = "h";
		$unicodeArray[119] = "0068";
		$chrArray[120]     = "i";
		$unicodeArray[120] = "0069";
		$chrArray[121]     = "j";
		$unicodeArray[121] = "006A";
		$chrArray[122]     = "k";
		$unicodeArray[122] = "006B";
		$chrArray[123]     = "l";
		$unicodeArray[123] = "006C";
		$chrArray[124]     = "m";
		$unicodeArray[124] = "006D";
		$chrArray[125]     = "n";
		$unicodeArray[125] = "006E";
		$chrArray[126]     = "o";
		$unicodeArray[126] = "006F";
		$chrArray[127]     = "p";
		$unicodeArray[127] = "0070";
		$chrArray[128]     = "q";
		$unicodeArray[128] = "0071";
		$chrArray[129]     = "r";
		$unicodeArray[129] = "0072";
		$chrArray[130]     = "s";
		$unicodeArray[130] = "0073";
		$chrArray[131]     = "t";
		$unicodeArray[131] = "0074";
		$chrArray[132]     = "u";
		$unicodeArray[132] = "0075";
		$chrArray[133]     = "v";
		$unicodeArray[133] = "0076";
		$chrArray[134]     = "w";
		$unicodeArray[134] = "0077";
		$chrArray[135]     = "x";
		$unicodeArray[135] = "0078";
		$chrArray[136]     = "y";
		$unicodeArray[136] = "0079";
		$chrArray[137]     = "z";
		$unicodeArray[137] = "007A";
		$chrArray[138]     = "{";
		$unicodeArray[138] = "007B";
		$chrArray[139]     = "|";
		$unicodeArray[139] = "007C";
		$chrArray[140]     = "}";
		$unicodeArray[140] = "007D";
		$chrArray[141]     = "~";
		$unicodeArray[141] = "007E";
		$chrArray[142]     = "©";
		$unicodeArray[142] = "00A9";
		$chrArray[143]     = "®";
		$unicodeArray[143] = "00AE";
		$chrArray[144]     = "÷";
		$unicodeArray[144] = "00F7";
		$chrArray[145]     = "×";
		$unicodeArray[145] = "00F7";
		$chrArray[146]     = "§";
		$unicodeArray[146] = "00A7";
		$chrArray[147]     = " ";
		$unicodeArray[147] = "0020";
		$chrArray[148]     = "\n";
		$unicodeArray[148] = "000D";
		$chrArray[149]     = "\r";
		$unicodeArray[149] = "000A";

		$strResult = "";
		for ( $i = 0; $i < strlen( $message ); $i ++ ) {
			if ( in_array( mb_substr( $message, $i, 1, 'UTF-8' ), $chrArray ) ) {
				$strResult .= $unicodeArray[ array_search( mb_substr( $message, $i, 1, 'UTF-8' ), $chrArray ) ];
			}
		}

		return $strResult;
	}

}