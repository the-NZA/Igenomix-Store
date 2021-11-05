<?php
use Carbon_Fields\Field;
use Carbon_Fields\Widget;

// * Helper function to get all menus
function getAllMenus() {
	$res = [
		'value_is_not_set' => '-- Choose menu --', // First value as default
	];
	$menus = wp_get_nav_menus();

	// Create dict with key == menu id (term_id) and value == menu name
	foreach($menus as $menu) {
		$res[$menu->term_id] = $menu->name;
	}

	return $res;
}

class MenuWithHeaderWidget extends Widget {
	// Register widget function. Must have the same name as the class
	function __construct() {
		$this->setup( 'ignx_menu_with_header', 'Меню с заголовком', 'Отоброжает заголовок и выбранное меню', array(
			Field::make( 'text', 'title', __('Title') ),
			Field::make( 'select', 'menu_select', __('Choose menu'))
				->set_options('getAllMenus')
					->set_help_text(__('Choose one option'))
					->set_classes( 'my-select-class' )
					->set_required(true)
		) );
	}

	// Called when rendering the widget in the front-end
	function front_end( $args, $instance ) {
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		if($instance['menu_select'] === 'value_is_not_set') {
			echo "Menu doesn't show";
			return;
		}
		
		$menu_items = wp_get_nav_menu_items( $instance['menu_select']);
		$menu_list = '<ul class="fwidget__links">';
		foreach($menu_items as $item) {
			$menu_list .= sprintf('<li><a href="%s">%s</a></li>', $item->url, $item->title);
		}
		$menu_list .= '</ul>';

		echo $menu_list;
	}
}