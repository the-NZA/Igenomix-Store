<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the tags
 */
?>
	<?php do_action( 'storefront_before_footer' ); ?>

	<!--Site footer-->
	<footer class="site-footer footer">
		<?php
		/**
		 * Functions hooked in to storefront_footer action
		 *
		 * @hooked storefront_footer_widgets - 10
		 * @hooked storefront_credit         - 20
		 */
		// do_action( 'storefront_footer' );
		?>

		<div class="wrapper footer__container">
			<div class="footer__logo">
				<a href="/">
					<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/logo_igenomix.svg" alt="Igenomix Store">
				</a>
			</div>

			<div class="footer__widgets">
				<div class="fwidget">
					<h4 class="fwidget__header">Наши цели</h4>

					<ul class="fwidget__links">
						<li><a href="#">Снижение рисков рождения ребенка с наследственными заболеваниями</a></li>
						<li><a href="#">Для спокойствия будущих мам</a></li>
					</ul>
				</div>
				<div class="fwidget">
					<h4 class="fwidget__header">Все продукты</h4>

					<ul class="fwidget__links">
						<li><a href="#">Продукты</a></li>
					</ul>
				</div>
				<div class="fwidget">
					<h4 class="fwidget__header">Об Igenomix</h4>

					<ul class="fwidget__links">
						<li><a href="#">О компании</a></li>
						<li><a href="#">Контакты</a></li>
						<li><a href="#">Работа с нами</a></li>
					</ul>
				</div>
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
			</div>

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

			<div class="footer__copyright">
				<div class="copyright__info">
					[2021] &copy; Igenomix
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
		</div>
	</footer>
	<!--Site footer END-->

	<?php do_action( 'storefront_after_footer' ); ?>

	<?php wp_footer(); ?>
</body>
</html>