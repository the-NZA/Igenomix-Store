<?php

require_once "card-price.php";

function storefront_product_categories( $args ) {
	$categories = get_categories([
		"taxonomy" 	=> "product_cat",
		"hide_empty" 	=> 1,
		"parent" 	=> 0,
		// "child_of" 	=> 0,
	]);

	/*
	* If at least 1 category exist display categories section
	*/
	if(count($categories) > 0) {
	?>
		<section class="homepage__categories">
			<?php do_action( 'storefront_homepage_before_product_categories' ); ?>

			<div class="wrapper">
				<h2 class="homepage__title">Категории</h2>
				<p class="homepage__subtitle">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum excepturi
					iure, quam vel ipsa culpa aliquid quo nam ipsum dignissimos veniam sunt dolorem quibusdam!</p>
				
				<?php do_action( 'storefront_homepage_after_product_categories_title' );?>

				<div class="homepage__cards">
					<?php
					foreach($categories as $cat) :
 						$catImage = get_the_post_thumbnail_url( $cat->term_id, 'full' );
						$catLink = get_category_link( $cat->term_id );
					?>

					<article class="categorycard">
						<img class="categorycard__icon" src="<?php echo $catImage; ?>" alt="<?php echo 'test';?>">
						<h4 class="categorycard__title"><?php echo $cat->name;?></h4>
						<p class="categorycard__snippet"><?php echo $cat->description;?></p>
						<button class="button_rounded categorycard__button">
							<a href="<?php echo $catLink; ?>">Смотреть</a>
						</button>
					</article>

					<?php endforeach; ?>
				</div>
			</div>

			<?php do_action( 'storefront_homepage_after_product_categories' ); ?>
		</section>
	<?php
	}
}


function storefront_popular_products( $args ) {
	$args = array (
		'limit' => -1,
		'type' => ['external', 'grouped', 'simple', 'variable'],
		'status' => 'publish',
		'order' => "DESC",
		'orderby' => "name",
		'stock_status' => 'instock',
		'featured' => true,
	);

	$products = wc_get_products( $args );

	/*
	* If at least 1 featured product exist display this section
	*/
	if(count($products) > 0) {
	?>
		<section class="homepage__popular_products">
			<?php do_action( 'storefront_homepage_before_popular_products' ); ?>

			<div class="wrapper">
				<h2 class="homepage__title">Популярные продукты</h2>
				<p class="homepage__subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
					reprehenderit minima impedit omnis alias cupiditate.</p>

				<?php do_action( 'storefront_homepage_after_popular_products_title' );?>

				<div class="homepage__cards homepage__cards--mb">
					<?php 
					$currencySymbol = get_woocommerce_currency_symbol();

					foreach($products as $product) : 
						$productImage = wp_get_attachment_url( $product->image_id, 'full' );
					?>
						<article class="productcard">
							<img src="<?php echo $productImage; ?>" alt="<?php echo $product->get_name(); ?>" class="productcard__icon">
							<h4 class="productcard__title"><?php echo $product->get_name();?></h4>
							<p class="productcard__snippet"><?php echo $product->get_short_description();?></p>
							<p class="productcard__price">
								<?php displayCardPrice($product, $currencySymbol); ?>
							</p>

							<button class="productcard__button">
								<a href="<?php echo $product->get_permalink(); ?>">Заказать</a>
							</button>
						</article>
					<?php endforeach; ?>
				</div>

				<button class="homepage__showall button_rounded ">
					<a href="<?php echo wc_get_page_permalink( 'shop' );?>">Все продукты</a>
				</button>
			</div>

			<?php do_action( 'storefront_homepage_after_popular_products' ); ?>
		</section>
	<?php 
	}
}