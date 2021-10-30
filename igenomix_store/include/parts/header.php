<?php 
//  * @hooked storefront_primary_navigation               - 50
//  * @hooked storefront_header_cart                      - 60

function storefront_header_container() {
	echo '<div class="wrapper header__container">';
}

function storefront_header_container_close() {
	echo '</div>';
}

function storefront_site_title_or_logo( $echo = true ) {
	$logo_url = has_custom_logo() 
		? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] 
		: get_stylesheet_directory_uri() . '/assets/image/logo_igenomix.svg';

	$html = sprintf("<img src='%s' alt='%s'>", $logo_url, get_bloginfo( 'name' ));

	if ( !$echo ) {
		return $html;
	}

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function storefront_site_branding() {
?>
	<div class="header__logo">
		<a href="<?php echo esc_url(home_url()) ?>">
			<?php storefront_site_title_or_logo(); ?>
		</a>
	</div>
<?php
}

function storefront_primary_navigation_wrapper() {
	// echo '<div class="header__menu"><div class="col-full">';
	echo '<div class="header__menu">';
}

function storefront_primary_navigation_wrapper_close() {
	// echo '</div></div>';
	echo '</div><button class="header__mobmenu"><i class="far fa-bars"></i></button>';
}

function storefront_primary_navigation() {
	wp_nav_menu(
		array(
			'theme_location'  => 'header_menu',
			'container'       => 'nav',
			'container_class' => 'mainnav',
			'menu_class'      => 'navlist',
			'menu_id'         => '',
			'echo'            => true,
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'li_class'	  => 'navlist__item', 
		)
	);
}

function ignx_header_cart_wrapper() {
	if ( storefront_is_woocommerce_activated() ) {
		echo '<div class="header__showcart">';
	}
}

function ignx_header_cart_wrapper_close() {
	if ( storefront_is_woocommerce_activated() ) {
		echo '</div>';
	}
}

function showcartAmount() {
}

function storefront_cart_link() {
	?>

		<button class="showcart__btn" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
			<span class="showcart__icon">
				<i class="far fa-shopping-basket"></i>
			</span>
			<span class="showcart__amount">
				<?php echo WC()->cart->total; ?> <span class="showcart__cur_symbol"><?php echo get_woocommerce_currency_symbol();?></span>
			</span>
		</button>
	<?php
}

function storefront_header_cart() {
	if ( storefront_is_woocommerce_activated() ) {
		storefront_cart_link();
	}
}

function ignx_header_cart_aside() {
	if ( storefront_is_woocommerce_activated() ) {
		// echo 'This is aside';
	}
}