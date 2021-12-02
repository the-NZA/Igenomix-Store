<?php
/**
 * Cart totals
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

$currencySymbol = get_woocommerce_currency_symbol();
?>
<div class="cardaside cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2 class="cartaside__header"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h2>

	<div class="cartaside__table cartasidetable shop_table shop_table_responsive">

		<div class="cartasidetable__item cart-subtotal">
			<h3><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></h3>
			<div data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
				<?php 
					echo WC()->cart->subtotal;
					echo '<span>' . $currencySymbol . '</span>';
				?>
			</div>
		</div>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<div class="cartasidetable__item order-total">
			<h3><?php esc_html_e( 'Total', 'woocommerce' ); ?></h3>
			<div data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
				<?php 
					echo (int) WC()->cart->total;
					echo '<span>' . $currencySymbol . '</span>';
				?>
			</div>
		</div>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
	</div>

	<div class="cartaside__checkout wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
