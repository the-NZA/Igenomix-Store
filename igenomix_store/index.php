<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/favicon.ico" type="image/x-icon">

	<?php wp_head(); ?>
</head>

<body class="site-body">
	<!--Site header-->
	<header class="site-header header">
		<div class="wrapper header__container">

			<div class="header__logo">
				<a href="/">
					<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/logo_igenomix.svg" alt="Igenomix Store">
				</a>
			</div>

			<div class="header__menu">
				<nav class="mainnav">
					<ul class="navlist">
						<li class="navlist__item">
							<a href="/">Главная</a>
						</li>
						<li class="navlist__item">
							<a href="/catalog.html">Продукты</a>
						</li>
						<li class="navlist__item">
							<a href="#">Контакты</a>
						</li>
						<li class="navlist__item">
							<a href="#">Об IGENOMIX</a>
						</li>
					</ul>
				</nav>
			</div>

			<button class="header__mobmenu">X</button>

			<div class="header__showcart">
				<button class="showcart__btn" title="Просмотр корзины">
					<span class="showcart__icon">
						<i class="far fa-shopping-basket"></i>
					</span>
					<span class="showcart__amount">
						12345 <span class="showcart__cur_symbol">₽</span>
					</span>
				</button>

				<aside class="header__cart">
					<div class="asidecart__header">
						<button class="asidecart__close">
							<i class="far fa-times fa-2x"></i>
						</button>
						<h2 class="asidecart__title">Корзина</h2>
					</div>

					<div class="asidecart__cartlist">
						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Название продукта</h4>
							<p class="cartitem__quantity">1 x 25000₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Длинное Название продукта</h4>
							<p class="cartitem__quantity">2 x 125000₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>
						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>

						<div class="asidecart__cartitem cartitem">
							<img class="cartitem__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №">
							<h4 class="cartitem__title">Очень длинное Название продукта</h4>
							<p class="cartitem__quantity">11 x 2500₽</p>
							<button class="cartitem__remove">
								<i class="far fa-times-circle"></i>
							</button>
						</div>
					</div>

					<div class="asidecart__footer">
						<div class="asidecart__summary">
							<span>Сумма:</span> 24500₽
						</div>
						<div class="asidecart__buttons">
							<button class="asidecart__showcart">Просмотр корзины</button>
							<button class="asidecart__checkout">Оформление заказа</button>
						</div>

					</div>
				</aside>
			</div>

		</div>
		<div class="header__overlay"></div>
	</header>
	<!--Site header END-->

	<!--Site main-->
	<main class="site-main homepage">
		<section class="homepage__hero">
			<div class="wrapper">
				<h1>Hero section</h1>
			</div>
		</section>

		<section class="homepage__categories">
			<div class="wrapper">
				<h2 class="homepage__title">Категории</h2>
				<p class="homepage__subtitle">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum excepturi
					iure, quam vel ipsa culpa aliquid quo nam ipsum dignissimos veniam sunt dolorem quibusdam!</p>

				<div class="homepage__cards">
					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_category_icon.svg" alt="Категория №">
						<h4 class="categorycard__title">Название категории</h4>
						<p class="categorycard__snippet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio
							quo,
							consequuntur undedoloribus ad ipsa!</p>
						<button class="button_rounded categorycard__button">Смотреть</button>
					</article>

					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_category_icon.svg" alt="Категория №">
						<h4 class="categorycard__title">Длинное Название категории</h4>
						<p class="categorycard__snippet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio
							quo,
							consequuntur undedoloribus ad ipsa!</p>
						<button class="button_rounded categorycard__button">Смотреть</button>
					</article>

					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_category_icon.svg" alt="Категория №">
						<h4 class="categorycard__title">Очень длинное Название категории</h4>
						<p class="categorycard__snippet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio
							quo,
							consequuntur undedoloribus ad ipsa!</p>
						<button class="button_rounded categorycard__button">Смотреть</button>
					</article>

					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_category_icon.svg" alt="Категория №">
						<h4 class="categorycard__title">Название категории</h4>
						<p class="categorycard__snippet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio
							quo,
							consequuntur undedoloribus ad ipsa!</p>
						<button class="button_rounded categorycard__button">Смотреть</button>
					</article>

					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_category_icon.svg" alt="Категория №">
						<h4 class="categorycard__title">Название категории</h4>
						<p class="categorycard__snippet">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio
							quo,
							consequuntur undedoloribus ad ipsa!</p>
						<button class="button_rounded categorycard__button">Смотреть</button>
					</article>
				</div>
			</div>
		</section>

		<section class="homepage__popular_products">
			<div class="wrapper">
				<h2 class="homepage__title">Популярные продукты</h2>
				<p class="homepage__subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
					reprehenderit minima impedit omnis alias cupiditate.</p>

				<div class="homepage__cards homepage__cards--mb">
					<article class="productcard">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №" class="productcard__icon">
						<h4 class="productcard__title">Название продукта</h4>
						<p class="productcard__snippet">Мини-описание продукта для быстрого завлечения клиента</p>
						<button class="button_rounded productcard__button">Заказать</button>
					</article>

					<article class="productcard">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №" class="productcard__icon">
						<h4 class="productcard__title">Длинное Название продукта</h4>
						<p class="productcard__snippet">Мини-описание продукта для быстрого завлечения клиента</p>
						<button class="button_rounded productcard__button">Заказать</button>
					</article>

					<article class="productcard">
						<img src="<?php echo get_stylesheet_directory_uri();?>/assets/image/sample_product_icon.svg" alt="Продукт №" class="productcard__icon">
						<h4 class="productcard__title">Очень длинное название продукта</h4>
						<p class="productcard__snippet">Мини-описание продукта для быстрого завлечения клиента</p>
						<button class="button_rounded productcard__button">Заказать</button>
					</article>
				</div>

				<button class="homepage__showall button_rounded ">Все продукты</button>
			</div>
		</section>
	</main>
	<!--Site main END-->

	<!--Site footer-->
	<footer class="site-footer footer">
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
</body>

</html>