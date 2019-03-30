<?php
/**
 * 1. Check if WooCommerce is activated with check woocommerce class exist
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

/**
 * Check if WooCommerce is active with checking woocommerce plugin in wp_option
 **/
if ( 
  in_array( 
    'woocommerce/woocommerce.php', 
    apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) 
  ) 
) {
    // Put your plugin code here
}
