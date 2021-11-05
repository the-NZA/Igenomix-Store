<?php
use Carbon_Fields\Field;
use Carbon_Fields\Widget;

class SocialLinksWidget extends Widget {
	// Register widget function. Must have the same name as the class
	function __construct() {
		$this->setup( 'ignx_social_links', 'Социальные сети', 'Отображает ссылки на социальные сети', array(
			Field::make( 'text', 'title', __('Title') )
				->set_required(true),
			Field::make( 'text', 'instagram_url', __('Instagram') )
				->set_attribute('pattern', 'https?://.*')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'youtube_url', __('YouTube') )
				->set_attribute('pattern', 'https?://.*')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'twitter_url', __('Twitter') )
				->set_attribute('pattern', 'https?://.*')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'linkedin_url', __('LinkedIn') )
				->set_attribute('pattern', 'https?://.*')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
		) );
	}

	// Called when rendering the widget in the front-end
	function front_end( $args, $instance ) {
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		if(	!$instance['instagram_url'] &&
			!$instance['youtube_url'] && 
			!$instance['twitter_url'] && 
			!$instance['linkedin_url']
		) {
			echo "Menu doesn't show";
			return;
		}
		
		$menu_list = '<ul class="fwidget__socials">';

		if($instance['instagram_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s"><i class="fab fa-instagram"></i></a></li>', $instance['instagram_url']);
		}
		if($instance['youtube_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s"><i class="fab fa-youtube"></i></a></li>', $instance['youtube_url']);
		}
		if($instance['twitter_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s"><i class="fab fa-twitter"></i></a></li>', $instance['twitter_url']);
		}
		if($instance['linkedin_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s"><i class="fab fa-linkedin"></i></a></li>', $instance['linkedin_url']);
		}

		$menu_list .= '</ul>';

		echo $menu_list;
	}
}