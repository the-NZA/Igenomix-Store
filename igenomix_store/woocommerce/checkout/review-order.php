<?php

/**
 * Review order table
 * 
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>

<div class="checkoutreviews__table chouttable shop_table woocommerce-checkout-review-order-table">
	<div class="chouttable__header">
		<div class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></div>
		<idv class="product-total"><?php esc_html_e('Subtotal', 'woocommerce'); ?></idv>
	</div>


	<div class="chouttable__body">
		<?php
		do_action('woocommerce_review_order_before_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
		?>
				<div class="chouttable__prodrow <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
					<div class="product-name">
					<?php 
						echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; 
					?>
					<?php
						echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?>
					<?php 
						echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?>
					</div>

					<div class="product-total">
					<?php
						echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?>
					</div>
				</div>
		<?php
			}
		}

		do_action('woocommerce_review_order_after_cart_contents');
		?>
	</div>

	<div class="chouttable__footer">

		<div class="cart-subtotal">
			<div><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
				<div><?php wc_cart_totals_coupon_html($coupon); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

			<?php do_action('woocommerce_review_order_before_shipping'); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action('woocommerce_review_order_after_shipping'); ?>

		<?php endif; ?>

		<?php foreach (WC()->cart->get_fees() as $fee) : ?>
			<div class="fee">
				<div><?php echo esc_html($fee->name); ?></div>
				<div><?php wc_cart_totals_fee_html($fee); ?></div>
			</div>
		<?php endforeach; ?>

		<?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
			<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
				<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
				?>
					<div class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
						<div><?php echo esc_html($tax->label); ?></div>
						<div><?php echo wp_kses_post($tax->formatted_amount); ?></div>
					</d>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total">
					<div><?php echo esc_html(WC()->countries->tax_or_vat()); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></d>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action('woocommerce_review_order_before_order_total'); ?>

		<div class="order-total">
			<div><?php esc_html_e('Total', 'woocommerce'); ?></div>
			<div><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action('woocommerce_review_order_after_order_total'); ?>
	</div>
</div>