<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header(null, ["additional_body_classes" => "site-body--archive"]);

/**
 * Hook: woocommerce_before_main_content.
 * @hooked woocommerce_output_content_wrapper - 10 DISABLED
 * @hooked woocommerce_breadcrumb - 20 DISABLED
 * @hooked WC_Structured_Data::generate_website_data() - 30 ? DISABLED ?
 */
do_action('woocommerce_before_main_content');

$isShop = is_shop();
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
		do_action('woocommerce_archive_description');
		?>

		<p class="pagetitle__snippet">
			<?php if ($isShop) {
				$pageID = wc_get_page_id('shop');
				echo carbon_get_post_meta($pageID, 'page_description');
			} else if ($desc = get_the_archive_description()) {
				echo $desc;
			} ?>
		</p>
	</div>
</section>
<!-- Site title END -->

<!-- Site Product categories -->
<?php if ($isShop) :
	$categories = get_categories([
		"taxonomy" 	=> "product_cat",
		"hide_empty" 	=> 1,
		"parent" 	=> 0,
		// "child_of" 	=> 0,
	]);

	/*
	* If at least 1 category exist display categories section
	*/
	if (count($categories) > 0) : ?>
		<section class="site-prodcategories">
			<div class="prodcategories wrapper ">
				<?php foreach ($categories as $cat) :
					$catLink = get_category_link($cat->term_id);
				?>
					<a href="<?php echo $catLink; ?>" class="prodcatcard">
						<?php echo $cat->name; ?>
					</a>

				<?php endforeach; ?>

				<a href="<?php echo get_permalink(116);?>" class="prodcatcard prodcatcard--all">
				    Все исследования
               </a>
			</div>
		</section>
<?php endif;
endif;
?>

<!-- Site Product categories END -->

<div class="<?php echo $isShop ? 'wrapper prodarchive prodarchive--shop' : 'wrapper prodarchive'; ?>">

	<?php if (woocommerce_product_loop()) {
		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		// do_action( 'woocommerce_before_shop_loop' );

		woocommerce_product_loop_start();

		if (wc_get_loop_prop('total')) {
			while (have_posts()) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 * @hooked woocommerce_pagination - 30 DISABLED
		 */
		do_action('woocommerce_after_shop_loop');

		get_template_part('include/loop/pagination');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	}

	if (!$isShop) {
		// Get sidebar
		get_sidebar('product-archive');
	}

	/**
	 * Hook: woocommerce_after_main_content.
	 */
	do_action('woocommerce_after_main_content');

	?>
</div>

<?php get_footer();
