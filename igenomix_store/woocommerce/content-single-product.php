<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="singleprod__image">
	<?php
		// echo '<pre>';
		// print_r($product);
		// echo '</pre>';

		$productImage = wp_get_attachment_url( $product->image_id, 'full' );
	?>
	<img src="<?php echo $productImage; ?>" alt="<?php echo $product->name;?>">

</div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'singleprod__card singlecard', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 * @hooked woocommerce_show_product_sale_flash - 10 DISABLED
	 * @hooked woocommerce_show_product_images - 20 DISABLED
	 */
	do_action( 'woocommerce_before_single_product_summary' );

	/**
	 * Hook: woocommerce_single_product_summary.
	 * @hooked woocommerce_template_single_title - 5
	 * @hooked woocommerce_template_single_rating - 10 DISABLED
	 * @hooked woocommerce_template_single_price - 10
	 * @hooked woocommerce_template_single_excerpt - 20
	 * @hooked woocommerce_template_single_add_to_cart - 30
	 * @hooked woocommerce_template_single_meta - 40
	 * @hooked woocommerce_template_single_sharing - 50
	 * @hooked WC_Structured_Data::generate_product_data() - 60
	 */
	do_action( 'woocommerce_single_product_summary' );

	?>
</div>

<div class="singleprod__desc proddesc">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15 DISABLED
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

</div>

<section class="singleprod__related prodrelated related products">
	<?php
	/**
	 * Hook: ignx_dispay_related_products.
	 * @hooked woocommerce_output_related_products - 5
	 */
	do_action( 'ignx_dispay_related_products');
	?>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>
