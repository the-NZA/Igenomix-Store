<?php
function storefront_page_header()
{
	// if (is_front_page() && is_page_template('template-fullwidth.php')) {
	// 	return;
	// }
	$imgURL = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
	<header class="entry-header singlepage__header" style="background-image: url(<?php echo $imgURL; ?>);">
		<div class="singlepage__headerwrap">
			<?php
			the_title('<h1 class="entry-title singlepage__title">', '</h1>');

			if (($descr = carbon_get_post_meta(get_the_ID(), 'page_description'))) : ?>
				<p class="singlepage__description"><?php echo $descr; ?></p>
			<?php endif; ?>
		</div>
	</header>
<?php
}

function storefront_page_content()
{
?>
	<div class="entry-content singlepage__body">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
<?php
}
