<?php

/**
 * Check if WooCommerce is active
 * Use in the active_callback when adding the WooCommerce Section to test if WooCommerce is activated
 *
 * @return boolean
 */
function yuma_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'inc/custom-controls.php';
