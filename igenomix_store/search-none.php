<?php
/*
 * The template part for displaying a message that products cannot be found.
 */

?>

<div class="searchpage__empty searchempty">
	<header class="searchempty__header">
		<h2 class="searchempty__title">К сожалению ничего не найдено</h2>
	</header>

	<div class="searchempty__content">
		<?php if (is_search()) : ?>

			<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'storefront'); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p>Попробуйте начать с <a href="<?php echo get_bloginfo('url'); ?>">главной страницы</a>.</p>

		<?php endif; ?>
	</div>
</div>