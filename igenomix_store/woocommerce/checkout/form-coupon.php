<?php

/**
 * Checkout coupon form
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.4
 */

defined('ABSPATH') || exit;

if (!wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
	return;
}

?>

<div class="checkoutpage__coupon checkoutcoupon">
	<div class="woocommerce-form-coupon-toggle checkoutcoupon__toggle">
		<?php wc_print_notice(apply_filters('woocommerce_checkout_coupon_message', esc_html__('Have a coupon?', 'woocommerce') . ' <a href="#" class="showcoupon">' . esc_html__('Click here to enter your code', 'woocommerce') . '</a>'), 'notice'); ?>
	</div>

	<form class="checkoutcoupon__form checkoutcouponform checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

		<p><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></p>

		<div class="checkoutcouponform__inputs">
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" id="coupon_code" value="" />
			<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
		</div>
	</form>
</div>