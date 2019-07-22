<?php
$product = wc_get_product(10654);
$payment_method = "bankmellat";
$user_id = 1;

$order = wc_create_order();
$order->add_product($product);
$order->set_customer_id($user_id);
$order->update_status("processing");
$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
$order->calculate_totals();

$pending_result = $available_gateways[$payment_method]->process_payment($order->id);
var_dump($pending_result);

/*
[
    "result": "success",
    "redirect": "https://example.com/checkout/order-pay/12757/?key=wc_order_4UgV5O4liDd8E"
]
*/
