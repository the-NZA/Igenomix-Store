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
		<?php 
		dynamic_sidebar( 'ignx_footer_1' );
		dynamic_sidebar( 'ignx_footer_2' );
		dynamic_sidebar( 'ignx_footer_3' );
		?>

		<div class="fwidget">
			<h4 class="fwidget__header">Igenomix в социальных сетях</h4>

			<ul class="fwidget__socials">
				<li class="fwidget__socicon">
					<a href="#">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
				<li class="fwidget__socicon">
					<a href="#">
						<i class="fab fa-youtube"></i>
					</a>
				</li>
				<li class="fwidget__socicon">
					<a href="#">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
				<li class="fwidget__socicon">
					<a href="#">
						<i class="fab fa-linkedin"></i>
					</a>
				</li>
			</ul>
		</div>

		<!-- <div class="fwidget">
			<h4 class="fwidget__header">Наши цели</h4>

			<ul class="fwidget__links">
				<li><a href="#">Снижение рисков рождения ребенка с наследственными заболеваниями</a></li>
				<li><a href="#">Для спокойствия будущих мам</a></li>
			</ul>
		</div> -->
		<!-- <div class="fwidget">
			<h4 class="fwidget__header">Все продукты</h4>

			<ul class="fwidget__links">
				<li><a href="#">Продукты</a></li>
			</ul>
		</div> -->
		<!-- <div class="fwidget">
			<h4 class="fwidget__header">Об Igenomix</h4>

			<ul class="fwidget__links">
				<li><a href="#">О компании</a></li>
				<li><a href="#">Контакты</a></li>
				<li><a href="#">Работа с нами</a></li>
			</ul>
		</div> -->
	</div>
<?php
}

function ignx_footer_contacts() {
?>
	<div class="footer__contacts">
		<a href="#" class="footerContacts__item">
			<span class="footerContacts__icon">
				<i class="far fa-phone-alt"></i>
			</span>
			8-999-888-77-66
		</a>
		<a href="#" class="footerContacts__item">
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