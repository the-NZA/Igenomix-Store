<?php

// * Add Theme Styles and Scripts
add_action("wp_enqueue_scripts", function(){
	wp_enqueue_style( 'ignmx-styles', get_stylesheet_directory_uri() . '/assets/main.css' );
	wp_enqueue_script( 'ignmx-scripts', get_stylesheet_directory_uri() . '/assets/main.js', array(), null, true );
});

