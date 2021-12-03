<?php
/**
 * The cart page template.
 */
 
get_header(null, ["additional_body_classes" => "site-body--checkout"]);
?>

<section class="site-title">
	<div class="wrapper">
		<h1 class="pagetitle__title">Оформление заказа</h1>
		<p class="pagetitle__snippet">Описание страницы для оформления заказа?</p>
	</div>
</section>

<div class="wrapper checkoutpage">

	<?php 
	while(have_posts()) :
		the_post();
		the_content(); 
	?>

	<?php endwhile; ?>

</div>

<?php get_footer();