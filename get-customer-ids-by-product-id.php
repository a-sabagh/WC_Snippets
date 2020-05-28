<?php 

function senc_get_order_ids_by_product_id($product_id){
    global $wpdb;
    $orderitems = $wpdb->prefix . "woocommerce_order_items";
    $orderitemmeta = $wpdb->prefix . "woocommerce_order_itemmeta ";
    $sql = "SELECT orderitems.order_id AS order_id FROM  "
        . "{$orderitems} AS orderitems "
        . "INNER JOIN {$orderitemmeta} AS orderitemmeta "
        . "ON orderitems.order_item_id = orderitemmeta.order_item_id "
        . "WHERE orderitemmeta.meta_key = '_product_id' "
        . "AND orderitemmeta.meta_value = %d ";
    $order_ids = $wpdb->get_results($wpdb->prepare($sql,$product_id),ARRAY_A);
    return $order_ids;
}

function senc_check_order_status($order){
    if(false == $order instanceof WC_Order){
        return false;
    }
    return ("completed" == $order->get_status())? true : false;
}

function get_customer_ids_by_product_id($product_id){
    $order_ids = senc_get_order_ids_by_product_id($product_id);
    if(empty($order_ids)){
        return false;
    }
    $customer_ids = array();
    foreach($order_ids as $order_id){
        $order = wc_get_order(current($order_id));
        if(false == senc_check_order_status()){
            continue;
        }
        $customer_ids[] = $order->get_customer_id();
    }
    return $customer_ids;
}
