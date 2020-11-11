<?php 
function wc_get_order_statuses() {
  $order_statuses = array(
    'wc-pending'    => _x( 'Pending payment', 'Order status', 'woocommerce' ),
    'wc-processing' => _x( 'Processing', 'Order status', 'woocommerce' ),
    'wc-on-hold'    => _x( 'On hold', 'Order status', 'woocommerce' ),
    'wc-completed'  => _x( 'Completed', 'Order status', 'woocommerce' ),
    'wc-cancelled'  => _x( 'Cancelled', 'Order status', 'woocommerce' ),
    'wc-refunded'   => _x( 'Refunded', 'Order status', 'woocommerce' ),
    'wc-failed'     => _x( 'Failed', 'Order status', 'woocommerce' ),
  );
  return apply_filters( 'wc_order_statuses', $order_statuses );
}
