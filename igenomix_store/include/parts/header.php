<?php
//  * @hooked storefront_primary_navigation               - 50
//  * @hooked storefront_header_cart                      - 60

function storefront_header_container()
{
	echo '<div class="wrapper header__container">';
}

function storefront_header_container_close()
{
	echo '</div>';
}

function storefront_site_title_or_logo($echo = true)
{
	$logo_url = has_custom_logo()
		? wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]
		: get_stylesheet_directory_uri() . '/assets/image/logo_igenomix.svg';

	$html = sprintf("<img src='%s' alt='%s'>", $logo_url, get_bloginfo('name'));

	if (!$echo) {
		return $html;
	}

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function storefront_site_branding()
{
?>
	<div class="header__logo">
		<a href="<?php echo esc_url(home_url()) ?>">
			<?php storefront_site_title_or_logo(); ?>
		</a>
	</div>
<?php
}

function storefront_primary_navigation_wrapper()
{
	// echo '<div class="header__menu"><div class="col-full">';
	echo '<div class="header__menu">
		<div class="header__menuheader">
			<h2>Навигация</h2>
			<button class="header__menuclose"><i class="far fa-times"></i></button>
		</div>';
}

function storefront_primary_navigation_wrapper_close()
{
	// echo '</div></div>';
?>
	<div class="header__menusearch menusearch">
		<button class="menusearch__btn">
			<i class="fas fa-search"></i>
		</button>

		<div class="menusearch__form">
			<?php get_search_form(); ?>
		</div>
	</div>
	</div><button class="header__mobmenu">
		<div class="header__mobmenubar"></div>
	</button>
<?php
}

function storefront_primary_navigation()
{
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

function ignx_header_cart_wrapper()
{
	if (storefront_is_woocommerce_activated()) {
		echo '<div class="header__showcart" id="site-header-cart">';
	}
}

function ignx_header_cart_wrapper_close()
{
	if (storefront_is_woocommerce_activated()) {
		echo '</div>';
	}
}

function tss()
{
?>
	<button class="showcart__btn" title="<?php esc_attr_e('View your shopping cart', 'storefront'); ?>">
		<span class="showcart__icon">
			<i class="far fa-shopping-basket"></i>
		</span>
		<span class="showcart__amount">
			<?php echo WC()->cart->total; ?> <span class="showcart__cur_symbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
		</span>
	</button>

	<a class="cart-contents" title="<?php esc_attr_e('View your shopping cart', 'storefront'); ?>">
		<span class="showcart__icon">
			<i class="far fa-shopping-basket"></i>
		</span>

		<?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?>
	</a>
<?php
}
function storefront_cart_link()
{
?>
	<a class="cart-contents" title="<?php esc_attr_e('View your shopping cart', 'storefront'); ?>">
		<span class="showcart__icon">
			<i class="far fa-shopping-basket"></i>
		</span>

		<?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?>
	</a>
	<?php
}

function storefront_header_cart()
{
	if (storefront_is_woocommerce_activated()) {
	?>
		<button class="showcart__btn" title="<?php esc_attr_e('View your shopping cart', 'storefront'); ?>">
			<?php storefront_cart_link(); ?>
		</button>
	<?php
	}
}

function ignx_header_cart_aside()
{
	if (storefront_is_woocommerce_activated()) {
	?>
		<aside class="header__cart">
			<div class="asidecart__header">
				<button class="asidecart__close">
					<i class="far fa-times fa-2x"></i>
				</button>
				<h2 class="asidecart__title">Корзина</h2>
			</div>

			<?php
			echo the_widget('WC_Widget_Cart', 'title=');
			?>

		</aside>
	<?php
	}
}

function woocommerce_widget_shopping_cart_subtotal()
{
	echo '<span>' . esc_html__('Subtotal:', 'woocommerce') . '</span> ' . WC()->cart->subtotal . get_woocommerce_currency_symbol(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

function woocommerce_widget_shopping_cart_button_view_cart()
{
	?>
	<button class="asidecart__showcart">
		<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="button wc-forward"><?php echo esc_html__('View cart', 'woocommerce'); ?></a>
	</button>
<?php
}

function woocommerce_widget_shopping_cart_proceed_to_checkout()
{
?>
	<button class="asidecart__checkout">
		<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="button checkout wc-forward"><?php echo esc_html__('Checkout', 'woocommerce'); ?></a>
	</button>
<?php
}
