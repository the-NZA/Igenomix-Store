<?php

/**
 * Cart totals
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

$currencySymbol = get_woocommerce_currency_symbol();
?>
<div class="cardaside cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

	<?php do_action('woocommerce_before_cart_totals'); ?>

	<h2 class="cartaside__header"><?php esc_html_e('Cart totals', 'woocommerce'); ?></h2>

	<div class="cartaside__table cartasidetable shop_table shop_table_responsive">
		<?php
		$cartSubtotal = WC()->cart->subtotal;
		?>

		<?php if ($cartSubtotal && $cartSubtotal > 0) : ?>
			<div class="cartasidetable__item cart-subtotal">
				<h3><?php esc_html_e('Subtotal', 'woocommerce'); ?></h3>
				<div data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
					<?php
					echo price_fmt($cartSubtotal);
					echo '<span>' . $currencySymbol . '</span>';
					?>
				</div>
			</div>

			<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

			<?php
			$couponsArr = WC()->cart->get_applied_coupons();
			$couponsCnt = count($couponsArr);

			if ($couponsCnt > 0) : ?>
				<div class="cartasidetable__coupons cartasidecoupon">
					<?php if ($couponsCnt == 1) : ?>
						<h3>Примененный купон</h3>
					<?php else : ?>
						<h3>Примененные купоны</h3>
					<?php endif; ?>

					<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
						<div class="cartasidecoupon__item cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
							<h4><?php echo $coupon->code; ?></h4>
							<div data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="cartasidetable__item order-total">
				<h3><?php esc_html_e('Total', 'woocommerce'); ?></h3>
				<div data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
					<?php
					echo price_fmt(WC()->cart->total);
					echo '<span>' . $currencySymbol . '</span>';
					?>
				</div>
			</div>

			<?php do_action('woocommerce_cart_totals_after_order_total'); ?>

		<?php endif; ?>
	</div>

	<div class="cartaside__checkout wc-proceed-to-checkout">
		<?php do_action('woocommerce_proceed_to_checkout'); ?>
	</div>

	<?php do_action('woocommerce_after_cart_totals'); ?>

</div>