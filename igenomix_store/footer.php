<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the tags
 */
?>
	<?php do_action( 'storefront_before_footer' ); ?>

	<!--Site footer-->
	<footer class="site-footer footer">
		<div class="wrapper footer__container">
			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked ignx_footer_logo          -  5
			 * @hooked storefront_footer_widgets - 10
			 * @hooked ignx_footer_contacts      - 20
			 * @hooked storefront_credit         - 30
			 */
			do_action( 'storefront_footer' );

			// echo '<pre>';
			// print_r(wp_get_sidebars_widgets());
			// echo '</pre>';
			?>
		</div>
	</footer>
	<!--Site footer END-->

	<?php do_action( 'storefront_after_footer' ); ?>

	<?php wp_footer(); ?>
</body>
</html>