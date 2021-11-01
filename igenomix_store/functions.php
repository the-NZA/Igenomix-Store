<?php

// * Remove Storefront styles
add_action( 'wp_print_styles', function(){
    wp_deregister_style('storefront-woocommerce-style');
    wp_deregister_style('storefront-style');
}, 100 );

// * Remove Storefront scripts
add_action( 'wp_print_scripts', function(){
	wp_dequeue_script( 'storefront-header-cart' );
	wp_deregister_script( 'storefront-header-cart' );
});


// * Add Theme Styles and Scripts
add_action("wp_enqueue_scripts", function(){
	// wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ignmx-styles', get_stylesheet_directory_uri() . '/assets/main.css');
	wp_enqueue_script( 'ignmx-scripts', get_stylesheet_directory_uri() . '/assets/main.js', array(), null, true );
});

// * Custom view functions
require_once "include/ignx_view_functions.php";


// * Init actions
add_action("init", function (){
	// * Remove storefront's menu locations
	unregister_nav_menu('primary');
	unregister_nav_menu('secondary');
	unregister_nav_menu('handheld');

	// * Remove header actions
	remove_filter("storefront_header", "storefront_skip_links", 5);
	remove_filter("storefront_header", "storefront_social_icons", 10);
	remove_filter("storefront_header", "storefront_secondary_navigation", 30);
	remove_filter("storefront_header", "storefront_product_search", 40);
	remove_filter("storefront_header", "storefront_header_container_close", 41);
	remove_filter("storefront_header", "storefront_primary_navigation_wrapper", 42);
	remove_filter("storefront_header", "storefront_primary_navigation", 50);
	remove_filter("storefront_header", "storefront_header_cart", 60);
	remove_filter("storefront_header", "storefront_primary_navigation_wrapper_close", 68);

	// * Add header actions
	add_filter("storefront_header", "storefront_primary_navigation_wrapper", 41);
	add_filter("storefront_header", "storefront_primary_navigation", 42);
	add_filter("storefront_header", "storefront_primary_navigation_wrapper_close", 50);
	add_filter("storefront_header", "ignx_header_cart_wrapper", 59);
	add_filter("storefront_header", "storefront_header_cart", 60);
	add_filter("storefront_header", "ignx_header_cart_wrapper_close", 61);
	add_filter("storefront_header", "ignx_header_cart_aside", 62);
	add_filter("storefront_header", "storefront_header_container_close", 68);
});


// * After setup theme actions
add_action( 'after_setup_theme', function (){
	// * Register menu location
	register_nav_menu('header_menu', 'Верхнее меню');
});

// * Add addional field to wp_nav_menu which allow adding classes for <li> nodes
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->li_class)) {
        $classes[] = $args->li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'ignx_update_minicart_total' );
function ignx_update_minicart_total( $fragments ) {
	global $woocommerce;

	ob_start();
?>
	<div class="asidecart__summary">
		<span><?php echo esc_html__( 'Subtotal:', 'woocommerce' ); ?></span> <?php echo WC()->cart->subtotal . get_woocommerce_currency_symbol();?> 
	</div>

<?php
	$fragments['div.asidecart__summary'] = ob_get_clean();
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ignx_update_minicart_footer' );
function ignx_update_minicart_footer( $fragments ) {
	global $woocommerce;

	ob_start();
?>
	<div class="asidecart__summary">
		<span><?php echo esc_html__( 'Subtotal:', 'woocommerce' ); ?></span> <?php echo WC()->cart->subtotal . get_woocommerce_currency_symbol();?> 
	</div>

<?php
	$fragments['div.asidecart__summary'] = ob_get_clean();
	return $fragments;
}