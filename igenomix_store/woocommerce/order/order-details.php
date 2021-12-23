<?php

/**
 * Order details
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined('ABSPATH') || exit;

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if (!$order) {
	return;
}

$order_items           = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note    = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ($show_downloads) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>

<section class="checkoutthankyou__order_details orderdetails woocommerce-order-details">
	<?php do_action('woocommerce_order_details_before_order_table', $order); ?>

	<h2 class="woocommerce-order-details__title"><?php esc_html_e('Order details', 'woocommerce'); ?></h2>

	<div class="checkoutthankyou__table chthanktable woocommerce-table woocommerce-table--order-details shop_table order_details">

		<div class="chthanktable__header">
			<div class="woocommerce-table__product-name product-name"><?php esc_html_e('Product', 'woocommerce'); ?></div>
			<div class="woocommerce-table__product-table product-total"><?php esc_html_e('Total', 'woocommerce'); ?></div>
		</div>

		<div class="chthanktable__body chthanklist">
			<?php
			do_action('woocommerce_order_details_before_order_table_items', $order);

			foreach ($order_items as $item_id => $item) {
				$product = $item->get_product();

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order'              => $order,
						'item_id'            => $item_id,
						'item'               => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'      => $product ? $product->get_purchase_note() : '',
						'product'            => $product,
					)
				);
			}

			do_action('woocommerce_order_details_after_order_table_items', $order);
			?>
		</div>

		<div class="chthanktable__footer chthankfooter">
			<?php
			foreach ($order->get_order_item_totals() as $key => $total) {
			?>
				<div class="chthankfooter__item">
					<div class="chthankfooter__title" scope="row"><?php echo esc_html($total['label']); ?></div>
					<div><?php echo ('payment_method' === $key) ? esc_html($total['value']) : wp_kses_post($total['value']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?></div>
				</div>
			<?php
			}
			?>
			<?php if ($order->get_customer_note()) : ?>
				<div>
					<div><?php esc_html_e('Note:', 'woocommerce'); ?></div>
					<div><?php echo wp_kses_post(nl2br(wptexturize($order->get_customer_note()))); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php do_action('woocommerce_order_details_after_order_table', $order); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
	wc_get_template('order/order-details-customer.php', array('order' => $order));
}
