<?php

/**
 * The template for displaying the homepage.
 * Template name: Homepage
 */

// get_header(null, ["additional_body_classes" => "abla"]);
get_header(); ?>

<!--Site main-->
<main class="site-main homepage">
	<section class="homepage__hero">
		<?php
		$currentID = get_the_ID();
		$heroImgURL = carbon_get_post_meta($currentID, 'homehero_image');
		?>

		<img class="homepage__heroimg" src="<?php echo $heroImgURL; ?>" alt="<?php get_bloginfo('name'); ?>">
	</section>

	<?php
	/**
	 * Functions hooked in to homepage action
	 *
	 * @hooked storefront_homepage_content      - 10 DISABLED
	 * @hooked storefront_product_categories    - 20
	 * @hooked storefront_recent_products       - 30 DISABLED
	 * @hooked storefront_featured_products     - 40 DISABLED
	 * @hooked storefront_popular_products      - 50
	 * @hooked storefront_on_sale_products      - 60 DISABLED
	 * @hooked storefront_best_selling_products - 70 DISABLED
	 */
	do_action('homepage');
	?>
</main>
<!--Site main END-->

<?php get_footer();
