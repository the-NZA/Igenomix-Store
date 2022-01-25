<?php

function displayCartItemPrice($product, $currencySymbol)
{
	if (!$product || !$currencySymbol) {
		return;
	}

	if ($product->is_on_sale()) {
		$regularPrice = $product->get_regular_price();
		$salePrice = $product->get_sale_price();
		// Display regular and sale prices
?>

		<span class="regular_price regular_price--onsale"><?php echo price_fmt($regularPrice); ?></span> <span class="sale_price"><?php echo price_fmt($salePrice); ?></span><?php echo $currencySymbol; ?>

	<?php
	} else {
		$regularPrice = $product->get_regular_price();
		// Display only reguar price
	?>
		<?php if ($regularPrice && $regularPrice > 0) : ?>

			<span class="regular_price"><?php echo price_fmt($regularPrice); ?></span><?php echo $currencySymbol; ?>

		<?php else : ?>

			<span class="empty_price"></span>

		<?php endif; ?>

	<?php
	}
}

function displayCartItemSubtotal($product, $quantity, $currencySymbol)
{
	if (!$product || !$currencySymbol || !$quantity) {
		return;
	}

	$prodPrice = $product->get_price();

	if ($prodPrice && $prodPrice > 0) : ?>

		Сумма:&nbsp;<span class="regular_price"><?php echo price_fmt($product->get_price() * $quantity); ?></span><?php echo $currencySymbol; ?>

	<?php else : ?>

		<span class="empty_price"><?php echo __('Цена по запросу'); ?></span>

<?php endif;
}
