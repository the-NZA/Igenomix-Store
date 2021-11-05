<?php

function ignx_footer_logo() {
?>
	<div class="footer__logo">
		<a href="<?php echo esc_url(home_url()) ?>">
		<?php 	$logo_url = has_custom_logo() 
			? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] 
			: get_stylesheet_directory_uri() . '/assets/image/logo_igenomix.svg';
		?>

			<img src="<?php echo $logo_url;?>" alt="<?php echo get_bloginfo( 'name' );?>">
		</a>
	</div>
<?php
}

function storefront_footer_widgets() {
?>
	<div class="footer__widgets">
		<div class="footer__widgets_wrapper">
			<?php dynamic_sidebar( 'ignx_footer_1' );?>
		</div>

		<div class="footer__widgets_wrapper">
			<?php dynamic_sidebar( 'ignx_footer_2' );?>
		</div>

		<div class="footer__widgets_wrapper">
			<?php dynamic_sidebar( 'ignx_footer_3' );?>
		</div>

		<div class="footer__widgets_wrapper">
			<?php dynamic_sidebar( 'ignx_footer_4' );?>
		</div>
	</div>
<?php
}

function ignx_footer_contacts() {
?>
	<div class="footer__contacts">
		<?php $phone_number = carbon_get_theme_option('ignx_phone_number'); ?>
		<a href="tel:<?php echo $phone_number;?>" class="footerContacts__item">
			<span class="footerContacts__icon">
				<i class="far fa-phone-alt"></i>
			</span>
			<?php echo $phone_number; ?>
		</a>
		<a href="mailto:<?php echo carbon_get_theme_option('ignx_email');?>" class="footerContacts__item">
			<span class="footerContacts__icon">
				<i class="far fa-envelope"></i>
			</span>
			Наш email
		</a>
	</div>
<?php
}

function storefront_credit() {
?>
	<div class="footer__copyright">
		<div class="copyright__info">
			[<?php echo date("Y");?>] &copy; <?php echo get_bloginfo('name'); ?>
		</div>

		<ul class="copyright__links">
			<li>
				<a href="#">Политика обработки и защиты персональных данных</a>
			</li>
			<li>
				<a href="#">Правовые сведения</a>
			</li>
			<li>
				<a href="#">Политика обработки cookie-файлов</a>
			</li>
		</ul>
	</div>
<?php
}