<?php
$countries = new new WC_Countries();
$billing_fields = $countries->get_address_fields( $countries->get_base_country(),'billing_');
$shipping_fields = $countries->get_address_fields( $countries->get_base_country(),'shipping_');
