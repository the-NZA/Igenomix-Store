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
				->set_attribute('pattern', 'https?://.+')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'youtube_url', __('YouTube') )
				->set_attribute('pattern', 'https?://.+')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'twitter_url', __('Twitter') )
				->set_attribute('pattern', 'https?://.+')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'linkedin_url', __('LinkedIn') )
				->set_attribute('pattern', 'https?://.+')
				->set_attribute('type', 'url')
				->set_attribute('placeholder', __('https://example.com')),
			Field::make( 'text', 'whatsapp_number', __('Whatsapp') )
				->set_attribute('pattern', '7.{10}')
				->set_attribute('type', 'tel')
				->set_attribute('placeholder', __('Номер в формате: 79998887766'))
				->set_help_text('Формат номера обязательно начинается с 7'),
			Field::make( 'text', 'telegram_name', __('Telegram') )
				->set_attribute('pattern', '.+')
				->set_attribute('type', 'text')
				->set_attribute('placeholder', __('Введите username'))
				->set_help_text('username указывается без @'),
		) );
	}

	// Called when rendering the widget in the front-end
	function front_end( $args, $instance ) {
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		if(	!$instance['instagram_url'] &&
			!$instance['youtube_url'] && 
			!$instance['twitter_url'] && 
			!$instance['linkedin_url'] &&
			!$instance['whatsapp_number'] &&
			!$instance['telegram_name']
		) {
			echo "Menu doesn't show";
			return;
		}
		
		$menu_list = '<ul class="fwidget__socials">';

		if($instance['instagram_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s" target="_blank" ><i class="fab fa-instagram"></i></a></li>', $instance['instagram_url']);
		}
		if($instance['youtube_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s" target="_blank" ><i class="fab fa-youtube"></i></a></li>', $instance['youtube_url']);
		}
		if($instance['twitter_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s" target="_blank" ><i class="fab fa-twitter"></i></a></li>', $instance['twitter_url']);
		}
		if($instance['linkedin_url']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="%s" target="_blank" ><i class="fab fa-linkedin"></i></a></li>', $instance['linkedin_url']);
		}
		if($instance['whatsapp_number']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="https://wa.me/%s" target="_blank" ><i class="fab fa-whatsapp"></i></a></li>', $instance['whatsapp_number']);
		}
		if($instance['telegram_name']) {
			$menu_list .= sprintf('<li class="fwidget__socicon"><a href="https://t.me/%s" target="_blank" ><i class="fab fa-telegram"></i></a></li>', $instance['telegram_name']);
		}

		$menu_list .= '</ul>';

		echo $menu_list;
	}
}