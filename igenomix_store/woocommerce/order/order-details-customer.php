<?php

/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined('ABSPATH') || exit;

$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="checkoutthankyou__customer_details woocommerce-customer-details">

	<?php if ($show_shipping) : ?>

		<section class="checkoutthankyou__customer_columns woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

			<?php endif; ?>

			<h2 class="woocommerce-column__title"><?php esc_html_e('Billing address', 'woocommerce'); ?></h2>

			<address>
				<?php
				/*
				echo wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); 
				*/

				$billaddr = $order->get_address('billing');
				?>

				<p>
					<span>ФИО:</span> <?php echo sprintf("%s %s", $billaddr['last_name'], $billaddr['first_name']); ?>
				</p>

				<?php if ($billaddr['company']) : ?>
					<p>
						<span>Компания:</span> <?php echo $billaddr['company']; ?>
					</p>
				<?php endif; ?>

				<p>
					<span>Адрес:</span> <?php echo sprintf(
									$billaddr['address_2'] ? "%s, %s, %s, %s, %s" : "%s, %s, %s, %s",
									$billaddr['postcode'],
									$billaddr['state'],
									$billaddr['city'],
									$billaddr['address_1'],
									$billaddr['address_2']
								); ?>
				</p>

				<?php if ($order->get_billing_phone()) : ?>
					<p class="woocommerce-customer-details--phone"><span>Телефон:</span> <?php echo esc_html($order->get_billing_phone()); ?></p>
				<?php endif; ?>

				<?php if ($order->get_billing_email()) : ?>
					<p class="woocommerce-customer-details--email"><span>Email:</span> <?php echo esc_html($order->get_billing_email()); ?></p>
				<?php endif; ?>
			</address>

			<?php if ($show_shipping) : ?>

			</div><!-- /.col-1 -->

			<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
				<h2 class="woocommerce-column__title"><?php esc_html_e('Shipping address', 'woocommerce'); ?></h2>
				<address>
					<?php
					$shipaddr = $order->get_address('billing');

					/*
					echo wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce'))); 
					*/
					?>

					<p>
						<span>ФИО:</span> <?php echo sprintf("%s %s", $shipaddr['last_name'], $shipaddr['first_name']); ?>
					</p>

					<?php if ($shipaddr['company']) : ?>
						<p>
							<span>Компания:</span> <?php echo $shipaddr['company']; ?>
						</p>
					<?php endif; ?>

					<p>
						<span>Адрес:</span> <?php echo sprintf(
										$shipaddr['address_2'] ? "%s, %s, %s, %s, %s" : "%s, %s, %s, %s",
										$shipaddr['postcode'],
										$shipaddr['state'],
										$shipaddr['city'],
										$shipaddr['address_1'],
										$shipaddr['address_2']
									); ?>
					</p>

					<?php if ($order->get_shipping_phone()) : ?>
						<p class="woocommerce-customer-details--phone"><span>Телефон:</span> <?php echo esc_html($order->get_shipping_phone()); ?></p>
					<?php endif; ?>
				</address>
			</div><!-- /.col-2 -->

		</section><!-- /.col2-set -->

	<?php endif; ?>

	<?php do_action('woocommerce_order_details_after_customer_details', $order); ?>

</section>