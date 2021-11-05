<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// * Register theme options page
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_fields( [
			Field::make( 'text', 'ignx_phone_number', __('Phone Number') )
				->set_attribute('placeholder', __('Input phone number'))
				->set_attribute('type', 'tel')
				// ->set_attribute('pattern', '([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})')
				->set_width(50)
				->set_required( true ),
			Field::make( 'text', 'ignx_email', __('Email') )
				->set_attribute('placeholder', __('Input email address'))
				->set_attribute('type', 'email')
				// ->set_attribute('pattern', '([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})')
				->set_width(50)
				->set_required( true ),
		] );
}

// * Boot Carbon Fields
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

// * Create custom carbon widgets
function load_custom_widgets() {
	require_once "include/widgets/MenuWithHeaderWidget.php";
	require_once "include/widgets/SocialLinksWidget.php";

	register_widget( 'MenuWithHeaderWidget' );
	register_widget( 'SocialLinksWidget' );
}

// * Register custom widgets
add_action( 'widgets_init', 'load_custom_widgets' );

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

// * Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// * Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

// * Custom view functions
require_once "include/ignx_view_functions.php";

// * Init actions
add_action("init", function (){
	// * Remove storefront's menu locations
	unregister_nav_menu('primary');
	unregister_nav_menu('secondary');
	unregister_nav_menu('handheld');

	// * Remove header hooks
	remove_filter("storefront_header", "storefront_skip_links", 5);
	remove_filter("storefront_header", "storefront_social_icons", 10);
	remove_filter("storefront_header", "storefront_secondary_navigation", 30);
	remove_filter("storefront_header", "storefront_product_search", 40);
	remove_filter("storefront_header", "storefront_header_container_close", 41);
	remove_filter("storefront_header", "storefront_primary_navigation_wrapper", 42);
	remove_filter("storefront_header", "storefront_primary_navigation", 50);
	remove_filter("storefront_header", "storefront_header_cart", 60);
	remove_filter("storefront_header", "storefront_primary_navigation_wrapper_close", 68);

	// * Add header hooks
	add_filter("storefront_header", "storefront_primary_navigation_wrapper", 41);
	add_filter("storefront_header", "storefront_primary_navigation", 42);
	add_filter("storefront_header", "storefront_primary_navigation_wrapper_close", 50);
	add_filter("storefront_header", "ignx_header_cart_wrapper", 59);
	add_filter("storefront_header", "storefront_header_cart", 60);
	add_filter("storefront_header", "ignx_header_cart_wrapper_close", 61);
	add_filter("storefront_header", "ignx_header_cart_aside", 62);
	add_filter("storefront_header", "storefront_header_container_close", 68);

	// * Remove homepage hooks
	remove_filter("homepage", "storefront_homepage_content", 10);
	remove_filter("homepage", "storefront_recent_products", 30);
	remove_filter("homepage", "storefront_featured_products", 40);
	remove_filter("homepage", "storefront_on_sale_products", 60);
	remove_filter("homepage", "storefront_best_selling_products", 70);
	
	// * Remove footer hooks
	remove_filter("storefront_footer", "storefront_credit", 20);
	remove_filter( 'storefront_after_footer', 'storefront_sticky_single_add_to_cart', 999 );
	remove_filter( 'storefront_footer', 'storefront_handheld_footer_bar', 999 );

	// * Add footer hooks
	add_filter("storefront_footer", "ignx_footer_logo", 5);
	add_filter("storefront_footer", "ignx_footer_contacts", 20);
	add_filter("storefront_footer", "storefront_credit", 30);
});

// * Register custom sidebars and widgets
add_action( 'widgets_init', function() {
	register_sidebar(
		array(
			'id' => 'ignx_footer_1',
			'name' => 'Подвал - 1',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в первую колонку футера.',
			'before_widget' => '<div id="%1$s" class="foot widget fwidget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="fwidget__header">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'id' => 'ignx_footer_2',
			'name' => 'Подвал - 2',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их во вторую колонку футера.',
			'before_widget' => '<div id="%1$s" class="foot widget fwidget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="fwidget__header">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'id' => 'ignx_footer_3',
			'name' => 'Подвал - 3',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в третью колонку футера.',
			'before_widget' => '<div id="%1$s" class="foot widget fwidget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="fwidget__header">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array(
			'id' => 'ignx_footer_4',
			'name' => 'Подвал - 4',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в четвертую колонку футера.',
			'before_widget' => '<div id="%1$s" class="foot widget fwidget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="fwidget__header">',
			'after_title' => '</h4>',
		)
	);
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
 * * Update mini cart summary on ajax request
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

// * Show mini cart at cart and checkout pages
add_filter( 'woocommerce_widget_cart_is_hidden', 'filter_function_name_4461' );
function filter_function_name_4461( $args_l ){
	return false;
}