<?php
/**
 * Loop Price
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>

<p class="productcard__price">
	<?php displayCardPrice($product); ?>
</p>