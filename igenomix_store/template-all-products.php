<?php

/**
 * The template for all products at one page.
 * Template name: All Products
 */

get_header(); ?>

<!--Site main-->
<main class="site-main allproducts">
    <!-- Site title -->
    <section class="site-title">
        <div class="wrapper">
            <h1 class="pagetitle__title"><?php echo get_the_title(); ?></h1>

            <p class="pagetitle__snippet">
                <?php echo carbon_get_post_meta(get_the_ID(), 'page_description'); ?>
            </p>
        </div>
    </section>
    <!-- Site title END -->

    <section class="allproducts__list">
        <?php
            // Get all categories 
            $categories = get_categories([
                "taxonomy" 	=> "product_cat",
                "hide_empty" 	=> 1,
                "parent" 	=> 0,
            ]);
        ?>
        <?php foreach ($categories as $cat) :
            $catLink = get_category_link($cat->term_id);
        ?>
            <div class="allproducts__cat">
                <h2 class="allprocuts__cat_title">
                    <a href="<?php echo $catLink; ?>"><?php echo $cat->name; ?></a>
                </h2>

                <?php 
                    // Get all products from category
                    $args = array (
                        'limit' => -1,
                        'type' => ['external', 'grouped', 'simple', 'variable'],
                        'status' => 'publish',
                        'order' => "DESC",
                        'orderby' => "name",
                        'stock_status' => 'instock',
                        'category' => $cat->slug,
                    );
                
                    $products = wc_get_products( $args );
                ?>

                <?php foreach($products as $prod) : ?>
                    <div class="allproducts__product allprod">
                        <div class="allprod__title">
                            <?php echo $prod->get_title(); ?>
                        </div>

                        <div class="allprod__price">
                            <?php echo $prod->get_price(); ?>
                        </div>

                        <div class="allprod__link">
                            <a href="<?php echo $prod->get_permalink(); ?>" target="_blank">Подробнее</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<!--Site main END-->

<?php get_footer();
