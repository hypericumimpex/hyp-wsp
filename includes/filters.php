<?php
defined( 'ABSPATH' ) || exit;


add_filter( 'wpnotif_filter_message', 'wpnotif_add_tracking_details', 10, 2 );


function wpnotif_add_tracking_details( $msg, $order ) {

	$order_id = $order->get_id();
	if ( class_exists( 'WC_Shipment_Tracking_Actions' ) ) {
		$st = WC_Shipment_Tracking_Actions::get_instance();

		$tracking_items = $st->get_tracking_items( $order_id );
		if ( ! empty( $tracking_items ) ) {
			foreach ( $tracking_items as $tracking_item ) {
				$formated_item = $st->get_formatted_tracking_item( $order_id, $tracking_item );
				$msg           = str_replace( '{{wc-tracking-link}}', $formated_item['formatted_tracking_link'], $msg );
				break;
			}

		}
	}

	return $msg;
}