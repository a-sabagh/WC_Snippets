<?php
$_product = wc_get_product( $product_id );
$_product->get_regular_price();
$_product->get_sale_price();
$_product->get_price();
