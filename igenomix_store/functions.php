<?php

// * Remove Storefront styles
add_action( 'wp_print_styles', function(){
    wp_deregister_style('storefront-woocommerce-style');
    wp_deregister_style('storefront-style');
}, 100 );

// * Add Theme Styles and Scripts
add_action("wp_enqueue_scripts", function(){
	// wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'ignmx-styles', get_stylesheet_directory_uri() . '/assets/main.css');
	wp_enqueue_script( 'ignmx-scripts', get_stylesheet_directory_uri() . '/assets/main.js', array(), null, true );
});

