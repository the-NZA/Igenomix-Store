<?php

/**
 * Product Loop Start
 * @version 3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

$isShop = is_shop();
$hasChildCats = haveChildCategories();
?>
<!--Site main-->
<main class="products site-main prodarchive__main">
	<!-- Archive card list -->
	<?php if ($isShop) : ?>
		<div class="prodarchive__list">
	<?php elseif (!$hasChildCats) : ?>
		<div class="prodarchive__list">
	<?php else : ?>
		<div class="prodarchive__list prodarchive__list--single">
	<?php endif; ?>