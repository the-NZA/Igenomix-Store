<?php
/**
 * Product Loop Start
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$isShop = is_shop();
?>
<!--Site main-->
<main class="products site-main prodarchive__main">
	<!-- Archive card list -->
	<div class="<?php echo $isShop ? 'prodarchive__list ' : 'prodarchive__list prodarchive__list--single'; ?>">
