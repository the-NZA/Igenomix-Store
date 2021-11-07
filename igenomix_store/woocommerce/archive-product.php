<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 * @hooked woocommerce_output_content_wrapper - 10 DISABLED
 * @hooked woocommerce_breadcrumb - 20 DISABLED
 * @hooked WC_Structured_Data::generate_website_data() - 30 ? DISABLED ?
 */
do_action( 'woocommerce_before_main_content' );
?>

<!-- Site title -->
<section class="site-title">
	<div class="wrapper">
		<h1 class="pagetitle__title"><?php woocommerce_page_title(); ?></h1>
		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10 DISABLED
		 * @hooked woocommerce_product_archive_description - 10  DISABLED
		 */
		do_action( 'woocommerce_archive_description' );
		?>
		<?php 
		$desc = get_the_archive_description(); 

		if($desc) : ?>
		<p class="pagetitle__snippet">
			<?php echo $desc; ?>
		</p>
		<?php endif;?>
	</div>
</section>
<!-- Site title END -->

<div class="wrapper prodarchive">

	<?php if ( woocommerce_product_loop() ) {
		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		// do_action( 'woocommerce_before_shop_loop' );

		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action( 'woocommerce_shop_loop' );

				wc_get_template_part( 'content', 'product' );
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	}

	/// Get sidebar
	get_sidebar('product-archive');

	/**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );


	?>
</div>

<?php get_footer();
