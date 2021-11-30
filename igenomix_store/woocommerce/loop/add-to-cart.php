<?php
/**
 * Loop Add to Cart
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<button class="productcard__button">
	<a href="<?php echo $product->get_permalink(); ?>">Заказать</a>
</button>