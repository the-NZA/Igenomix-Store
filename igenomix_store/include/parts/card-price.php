<?php

require_once "formated-price.php";

function displayCardPrice($product, $currencySymbol)
{
	if (!$product) {
		return;
	}

	// If variable product then just display min and max variable prices
	if ($product instanceof WC_Product_Variable) {
		$prices = $product->get_variation_prices()['sale_price'];
		$minPrice = min($prices);
		$maxPrice = max($prices);
?>
		<span class="variable_price"><?php echo price_fmt($minPrice); ?> – <?php echo price_fmt($maxPrice); ?></span><?php echo $currencySymbol; ?>
		<?php
	} else {
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

			<span class="regular_price"><?php echo price_fmt($regularPrice); ?></span><?php echo $currencySymbol; ?>

<?php
		}
	}
}
