<?php
/**
 * Mini-cart
 * Contains the markup for the mini-cart, used by the cart widget.
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
	<div class="asidecart__cartlist">
	<?php 
		do_action( 'woocommerce_before_mini_cart_contents' );

		$currency_symbol = get_woocommerce_currency_symbol();

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>

				<div class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?> asidecart__cartitem cartitem">
					<img class="cartitem__icon" src="<?php echo get_the_post_thumbnail_url($product_id); ?>" alt="<?php echo $product_name; ?>">

					<h4 class="cartitem__title">
						<a href="<?php echo $product_permalink; ?>"><?php echo $product_name; ?></a>
					</h4>

					<p class="quantity cartitem__quantity">
						<?php echo sprintf('%s &times; %s%s', $cart_item['quantity'], price_fmt($cart_item['line_total']), $currency_symbol); ?>
					</p>

					<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

					<button class="cartitem__remove">
							<!-- class="remove remove_from_cart_button" -->
						<a
							href="<?php esc_url(wc_get_cart_remove_url($cart_item_key));?>"
							class="remove_from_cart_button"
							aria-label="<?php esc_attr__( 'Remove this item', 'woocommerce' );?>"
							data-product_id="<?php echo esc_attr($product_id);?>"
							data-cart_item_key="<?php echo esc_attr($cart_item_key);?>"
							data-product_sku="<?php echo esc_attr($_product->get_sku());?>"
						>
							<i class="far fa-times-circle"></i>
						</a>
					</button>
				</div>

				<?php
			}
		}


		do_action( 'woocommerce_mini_cart_contents' );?>
	</div>

	<div class="asidecart__footer">
		<div class="asidecart__summary">
			<?php
			/**
			* Hook: woocommerce_widget_shopping_cart_total.
			* @hooked woocommerce_widget_shopping_cart_subtotal - 10
			*/
			do_action( 'woocommerce_widget_shopping_cart_total' );
			?>
		</div>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<div class="woocommerce-mini-cart__buttons buttons asidecart__buttons">
			<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
		</div>

		<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
	</div>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; 

do_action( 'woocommerce_after_mini_cart' ); ?>

