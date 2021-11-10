<?php
/**
 * Single Product Price
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="singlecard__price">
	<?php displayCardPrice($product, get_woocommerce_currency_symbol()); ?>
</p>