<?php
/**
 * The cart page template.
 */
 
get_header(null, ["additional_body_classes" => "site-body--cart"]);
?>

<section class="site-title">
	<div class="wrapper">
		<h1 class="pagetitle__title">Корзина</h1>
		<p class="pagetitle__snippet">Описание корзины?</p>
	</div>
</section>

<div class="wrapper cartpage">

	<?php 
	while(have_posts()) :
		the_post();
		the_content(); 
	?>

	<?php endwhile; ?>

</div>

<?php get_footer();