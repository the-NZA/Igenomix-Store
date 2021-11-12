<?php
/**
 * Related Products
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) :
	$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

	if ( $heading ) : ?>
		<h2 class="prodrelated__title"><?php echo esc_html( $heading ); ?></h2>
	<?php endif; ?>
	
	
	<div class="prodrelated__cards">
		<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				$post_object = get_post( $related_product->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'product' );
				?>

		<?php endforeach; ?>
	</div>

<?php endif;

wp_reset_postdata();
