<?php
 public function wc_create_product( $adsID ) {

        $ads = get_post($adsID);

        if(!$ads)return;

        $ADS_price = get_post_meta($ads->ID,"rtads_field__price",true);

        $address = array(

            'first_name' => "",

            'last_name'  => "",

            'company'    => "",

            'email'      => get_post_meta($ads->ID,"rtads_field__email",true),

            'phone'      => get_post_meta($ads->ID,"rtads_field__mobile",true),

            'address_1'  => get_post_meta($ads->ID,"rtads_field__address",true),

            'address_2'  => '',

            'city'       => 'آگهی دهنده',

            'state'      => '',

            'postcode'   => '',

            'country'    => ''

        );

//      $product_obj = get_page_by_path( "rt_ads_product_for_ads", OBJECT, 'product' );

//

//      if($product_obj){

//          var_dump($product_obj);

//          $ProductID = $product_obj->ID;

//          exit;

//      }

//      if(!$product_obj){

//          $product = new WC_Product();

//          $product->set_name("rt_ads_product_for_ads");

//          $ProductID = $product->save();

//      }

//      $product = new WC_Product();

//      $product->set_name("rt_ads_product_for_ads");

//      $product->set_status("private");

//      $product->set_regular_price($ADS_price);

//      $product->set_price($ADS_price);

//      //$product->set_parent_id($ads->ID);

//      //...

//      $productID = $product->save();

        $product = wc_get_product(593);

        $order = wc_create_order();

        $order->add_product( $product, 1 );

        $order->update_status("pending");

        $order->set_customer_id($ads->post_author);

        $order->set_address( $address, 'billing' );

        $order->set_address( $address, 'shipping' );

        $order->calculate_totals();

        WC()->cart->add_to_cart( $product->get_id() );

        WC()->session->order_awaiting_payment = $order->get_id();

        $gateways = WC()->payment_gateways->get_available_payment_gateways();

        $result = current($gateways)->process_payment($order->get_id());

        if($result["result"] == "success"){

            wp_redirect($result['redirect']);

            exit;

        }

    }

}

