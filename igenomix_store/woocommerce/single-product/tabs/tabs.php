<?php
/**
 * Single Product tabs
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if($product) :

?>

<h2 class="proddesc__title">Описание</h2>
<div class="proddesc__data">
	<?php 
		$lines = explode("\n", $product->description);
		// print_r($lines);
		foreach($lines as $line) {
			if(!empty(trim($line))){
				echo '<p>' . $line . '</p>';
			}
		}

	endif; ?>
</div>
