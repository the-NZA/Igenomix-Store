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
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_primary_navigation_wrapper       - 41
		 * @hooked storefront_primary_navigation               - 42
		 * @hooked storefront_primary_navigation_wrapper_close - 50
		 * @hooked ignx_header_cart_wrapper                    - 59
		 * @hooked storefront_header_cart                      - 60
		 * @hooked ignx_header_cart_wrapper_close              - 61
		 * @hooked ignx_header_cart_aside                      - 62
		 * @hooked storefront_header_container_close           - 68
		 */
		do_action( 'storefront_header' );
		?>

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