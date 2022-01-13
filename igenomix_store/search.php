<?php
/*
 * The template for displaying search results pages.
 */

get_header(null, ["additional_body_classes" => "site-body--searchpage"]); ?>

<!-- Site title -->
<section class="site-title">
	<div class="wrapper">
		<h1 class="pagetitle__title">
			<?php
			/* translators: %s: search term */
			printf(esc_attr__('Search Results for: %s', 'storefront'), '<span>' . get_search_query() . '</span>');
			?>
		</h1>
		<?php /*<p class="pagetitle__snippet"></p>*/ ?>
	</div>
</section>
<!-- Site title END -->

<!--Site main-->
<main class="wrapper site-main searchpage">
	<?php
	if (have_posts()) {
		do_action('storefront_loop_before');
	?>
		<div class="searchpage__cards">

			<?php
			while (have_posts()) :
				the_post();
			?>
				<div class="searchitem">
					<?php global $product;
					$productImage = wp_get_attachment_url($product->image_id, 'full');
					?>

					<h4 class="searchitem__title"><?php echo get_the_title(); ?></h4>

					<div class="searchitem__img">
						<img src="<?php echo $productImage; ?>" alt="<?php echo $product->get_name(); ?>" class="searchitem__icon">
					</div>

					<p class="searchitem__snippet"><?php echo $product->get_short_description(); ?></p>

					<button class="searchitem__button">
						<a href="<?php echo $product->get_permalink(); ?>">Смотреть</a>
					</button>
				</div>
			<?php
			endwhile;
			?>
		</div>
	<?php
		/**
		 * Functions hooked in to storefront_paging_nav action
		 *
		 * @hooked storefront_paging_nav - 10
		 */
		// do_action('storefront_loop_after');

		// * Disaply custom pagination
		get_template_part('include/loop/pagination');
	} else {
		get_template_part('content', 'none');
	}
	?>
</main>
<!--Site main END-->

<?php
get_footer();
