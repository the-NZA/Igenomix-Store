<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// * Register theme options page
add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
	Container::make('theme_options', __('Theme Options'))
		->add_fields([
			Field::make('text', 'ignx_phone_number', __('Phone Number'))
				->set_attribute('placeholder', __('Input phone number'))
				->set_attribute('type', 'tel')
				// ->set_attribute('pattern', '([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})')
				->set_width(50)
				->set_required(true),
			Field::make('text', 'ignx_email', __('Email'))
				->set_attribute('placeholder', __('Input email address'))
				->set_attribute('type', 'email')
				// ->set_attribute('pattern', '([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})')
				->set_width(50)
				->set_required(true),
		]);
}


// * Register theme options page
add_action('carbon_fields_register_fields', 'page_custom_fields');
function page_custom_fields()
{
	Container::make('post_meta', 'Дополнительные настройки')
		->where('post_type', '=', 'page')
		->where('post_template', '!=', 'template-homepage.php')
		->add_fields(array(
			Field::make('textarea', 'page_description', 'Описание страницы'),
		));

	// * Homepage templated fields
	Container::make('post_meta', 'Дополнительные настройки')
		->where('post_type', '=', 'page')
		->where('post_template', '=', 'template-homepage.php')
		->add_fields(array(
			Field::make('textarea', 'page_description', 'Описание страницы'),
			Field::make('textarea', 'homesection_categories', 'Описание секции категорий')
				->set_required(true),
			Field::make('textarea', 'homesection_products', 'Описание секции популярных товаров')
				->set_required(true),
			Field::make('image', 'homehero_image', 'Изображение hero section')
				->set_value_type('url')
				->set_required(true),
		));
}

// * Boot Carbon Fields
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once('vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

// * Create custom carbon widgets
function load_custom_widgets()
{
	require_once "include/widgets/MenuWithHeaderWidget.php";
	require_once "include/widgets/SocialLinksWidget.php";

	register_widget('MenuWithHeaderWidget');
	register_widget('SocialLinksWidget');
}

// * Register custom widgets
add_action('widgets_init', 'load_custom_widgets');

// * Remove Storefront styles
add_action('wp_print_styles', function () {
	wp_deregister_style('storefront-woocommerce-style');
	wp_deregister_style('storefront-style');
}, 100);

// * Remove Storefront scripts
add_action('wp_print_scripts', function () {
	wp_dequeue_script('storefront-header-cart');
	wp_deregister_script('storefront-header-cart');
});

// * Add Theme Styles and Scripts
add_action("wp_enqueue_scripts", function () {
	// wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('ignmx-styles', get_stylesheet_directory_uri() . '/assets/main.css');
	wp_enqueue_script('ignmx-scripts', get_stylesheet_directory_uri() . '/assets/main.js', array(), null, true);
});

// * Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
// * Disables the block editor from managing widgets.
add_filter('use_widgets_block_editor', '__return_false');

//* Set number of products to be displayed
add_filter('loop_shop_per_page', function () {
	// if(is_shop()) {
	// 	return 12;
	// }

	return 10;
});

// * Custom query modifications
add_action('pre_get_posts', 'ignx_pre_get_posts', 1);
function ignx_pre_get_posts($query)
{
	// Exit if this is admin panel or not main query
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if (is_search()) {
		// * Displaying only 10 post for search page
		$query->set('posts_per_page', 10);

		// * Only for product post type
		$query->set('post_type', 'product');
	}
}

// * Custom view functions
require_once "include/ignx_view_functions.php";

// * Init actions
add_action("init", function () {
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
	remove_filter('storefront_after_footer', 'storefront_sticky_single_add_to_cart', 999);
	remove_filter('storefront_footer', 'storefront_handheld_footer_bar', 999);

	// * Add footer hooks
	add_filter("storefront_footer", "ignx_footer_logo", 5);
	add_filter("storefront_footer", "ignx_footer_contacts", 20);
	add_filter("storefront_footer", "storefront_credit", 30);

	// * Remove Woocommerce hooks
	remove_filter("woocommerce_before_main_content", "woocommerce_output_content_wrapper", 10);
	remove_filter('woocommerce_before_main_content', 'storefront_before_content', 10);
	remove_filter('storefront_before_content', 'woocommerce_breadcrumb', 10); 	// DISABLE BREADCRUMB
	remove_filter("woocommerce_before_main_content", "woocommerce_breadcrumb", 20); // DISABLE BREADCRUMB
	remove_filter('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_filter('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
	// remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_product_archive_description', 10);
	remove_filter('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
	remove_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6);
	add_filter('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);
	remove_filter('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
	remove_filter('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	remove_filter('woocommerce_after_main_content', 'storefront_after_content', 10);

	// * Remove Storefront pagination hooks
	remove_filter('woocommerce_after_shop_loop', 'storefront_sorting_wrapper', 9);
	remove_filter('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
	remove_filter('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
	remove_filter('woocommerce_after_shop_loop', 'storefront_sorting_wrapper_close', 31);
	remove_filter('woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30);
	add_filter('theme_mod_storefront_product_pagination', '__return_false', 11);

	// * Disable woocommerce pagination
	remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 30);

	// * Woocommerce notices wrapper
	remove_filter('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
	add_filter('woocommerce_before_single_product', 'ignx_output_all_notices', 10);

	// * Woocommerce single product hooks
	remove_filter('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
	remove_filter('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
	remove_filter('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_filter('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	add_action('ignx_dispay_related_products', 'woocommerce_output_related_products', 5);
	remove_filter('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

	// * Woocommerce cart page hooks
	remove_filter('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

	// * Product card hooks
	remove_filter('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_filter('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11);

	// * Remove privacy text at checkout page
	remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
});

// * Setting for purchasable products status
function ignx_config_purchasable($purchasable, $product)
{
	$prodPrice = $product->get_price();

	if (!$prodPrice || $prodPrice == 0) {
		$purchasable = true;
	}

	return $purchasable;
}
add_filter('woocommerce_is_purchasable', 'ignx_config_purchasable', 10, 2);

// * Set number of related products
add_filter('woocommerce_output_related_products_args', function ($args) {
	$args['posts_per_page'] = 4; // 4 related products
	return $args;
}, 20);

// * Register custom sidebars and widgets
add_action('widgets_init', function () {
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
add_action('after_setup_theme', function () {
	// * Register menu location
	register_nav_menu('header_menu', 'Верхнее меню');
	register_nav_menu('footer_menu', 'Нижнее меню');
});

// * Add addional field to wp_nav_menu which allow adding classes for <li> nodes
function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * * Update mini cart summary on ajax request
 */
add_filter('woocommerce_add_to_cart_fragments', 'ignx_update_minicart_total');
function ignx_update_minicart_total($fragments)
{
	global $woocommerce;

	ob_start();

	$cartSubtotal = WC()->cart->subtotal;
?>
	<div class="asidecart__summary">
		<?php if (!(WC()->cart->is_empty()) && $cartSubtotal > 0) : ?>
			<span><?php echo esc_html__('Subtotal:', 'woocommerce'); ?></span> <?php echo price_fmt(WC()->cart->subtotal) . get_woocommerce_currency_symbol(); ?>
		<?php endif; ?>
	</div>

<?php
	$fragments['div.asidecart__summary'] = ob_get_clean();
	return $fragments;
}

// * Show mini cart at cart and checkout pages
add_filter('woocommerce_widget_cart_is_hidden', 'filter_function_name_4461');
function filter_function_name_4461($args_l)
{
	return false;
}

// * Add custom checkbox for checkout page
add_action( 'woocommerce_review_order_before_submit', 'ignx_privacy_checkbox', 25 );
function ignx_privacy_checkbox() {
	woocommerce_form_field( 'privacy_policy_agreement_checkbox', array(
		'type'          => 'checkbox',
		'class'         => array( 'form-row' ),
		'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
		'input_class'   => array( 'woocommerce-form__input-checkbox' ),
		'required'      => true,
		'label'         => '<span>Я согласен на обработку моих персональных данных</span>',
	));

	woocommerce_form_field( 'privacy_policy_checkbox', array(
		'type'          => 'checkbox',
		'class'         => array( 'form-row' ),
		'label_class'   => array( 'woocommerce-form__label-for-checkbox' ),
		'input_class'   => array( 'woocommerce-form__input-checkbox' ),
		'required'      => true,
		'label'			=> '<span>С <a href="' . get_privacy_policy_url() . '">Политикой в отношении обработки персональных данных</a>  ознакомлен и согласен</span>'
	));
}
 
// * Validate custom checkbox for checkout page
add_action( 'woocommerce_checkout_process', 'ignx_privacy_checkbox_error', 25 );
function ignx_privacy_checkbox_error() {
	if ( empty( $_POST[ 'privacy_policy_agreement_checkbox' ] ) ) {
		wc_add_notice( 'Вам нужно согласиться на обработку персональных данных.', 'error' );
	}

	if ( empty( $_POST[ 'privacy_policy_checkbox' ] ) ) {
		wc_add_notice( 'Вам нужно принять политику конфиденциальности.', 'error' );
	}
}