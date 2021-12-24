<?php

/**
 * The template for displaying all pages.
 *
 * @package storefront
 */

get_header(); ?>

<main id="main" class="site-main singlepage" role="main">

	<?php
	while (have_posts()) :
		the_post();

		do_action('storefront_page_before');

		get_template_part('content', 'page');

		/**
		 * Functions hooked in to storefront_page_after action
		 *
		 * @hooked storefront_display_comments - 10
		 */
		do_action('storefront_page_after');

	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
// do_action('storefront_sidebar'); // disable sidebar for single page

get_footer();
