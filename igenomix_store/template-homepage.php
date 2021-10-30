<?php
/**
 * The template for displaying the homepage.
 * Template name: Homepage
 */

// get_header(null, ["additional_body_classes" => "abla"]);
get_header(); ?>

	<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"> -->
			<?php
			/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked storefront_homepage_content      - 10
			 * @hooked storefront_product_categories    - 20
			 * @hooked storefront_recent_products       - 30
			 * @hooked storefront_featured_products     - 40
			 * @hooked storefront_popular_products      - 50
			 * @hooked storefront_on_sale_products      - 60
			 * @hooked storefront_best_selling_products - 70
			 */
			// do_action( 'homepage' );
			?>
<!-- 
		</main>
	</div> -->

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

<?php get_footer();
