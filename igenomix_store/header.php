<?php
/**
 * The header for our theme.
 * Displays all of the <head> section and <header>
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/favicon.ico" type="image/x-icon">

	<?php wp_head(); ?>
</head>

<?php
	// Default body class
	$bodyClasses = "site-body"; 

	// If passed any additional body classes to get_header function
	if(isset($args['additional_body_classes'])) {
		$bodyClasses .= ' ' . $args['additional_body_classes'];
	}
?>

<body <?php body_class($bodyClasses); ?>>
	<?php do_action( 'storefront_before_header' ); ?>

	<!--Site header-->
	<header class="site-header header">
		<?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		do_action( 'storefront_header' );
		?>

<!--
		<div class="wrapper header__container">

			<div class="header__logo">
				<a href="/">
					<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/logo_igenomix.svg" alt="Igenomix Store">
				</a>
			</div>

			<div class="header__menu">
				<nav class="mainnav">
					<ul class="navlist">
						<li class="navlist__item">
							<a href="/">Главная</a>
						</li>
						<li class="navlist__item">
							<a href="/catalog.html">Продукты</a>
						</li>
						<li class="navlist__item">
							<a href="#">Контакты</a>
						</li>
						<li class="navlist__item">
							<a href="#">Об IGENOMIX</a>
						</li>
					</ul>
				</nav>
			</div>

			<button class="header__mobmenu"><i class="far fa-bars"></i></button>

			<div class="header__showcart">
				<button class="showcart__btn" title="Просмотр корзины">
					<span class="showcart__icon">
						<i class="far fa-shopping-basket"></i>
					</span>
					<span class="showcart__amount">
						12345 <span class="showcart__cur_symbol">₽</span>
					</span>
				</button>

				<aside class="header__cart">
					<div class="asidecart__header">
						<button class="asidecart__close">
							<i class="far fa-times fa-2x"></i>
						</button>
						<h2 class="asidecart__title">Корзина</h2>
					</div>

					<div class="asidecart__cartlist">
						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Название продукта</h4>
							<p class="cartitem__quantity">1 x 25000₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Длинное Название продукта</h4>
							<p class="cartitem__quantity">2 x 125000₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>
						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>
					</div>

					<div class="asidecart__footer">
						<div class="asidecart__summary">
							<span>Сумма:</span> 24500₽
						</div>
						<div class="asidecart__buttons">
							<button class="asidecart__showcart">Просмотр корзины</button>
							<button class="asidecart__checkout">Оформление заказа</button>
						</div>

					</div>
				</aside>
			</div>

		</div> -->

		<div class="header__overlay"></div>
	</header>
	<!--Site header END-->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>