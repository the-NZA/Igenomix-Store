<?php

function woocommerce_template_loop_product_thumbnail() {
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	global $product;
	$productImage = wp_get_attachment_url( $product->image_id, 'full' );
?>
	<img src="<?php echo $productImage; ?>" alt="<?php echo $product->get_name();?>" class="productcard__icon">
<?php
}

function woocommerce_template_loop_product_title() {
	echo '<h4 class="productcard__title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h4>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function ignx_display_product_description($product) {
	if(!$product){
		return;
	}
?>

	<p class="productcard__snippet"><?php echo $product->get_short_description();?></p>

	<?php
}