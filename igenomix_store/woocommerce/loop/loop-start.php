<?php

/**
 * Product Loop Start
 * @version 3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

$isShop = is_shop();
?>
<!--Site main-->
<main class="products site-main prodarchive__main">
	<!-- Archive card list -->
	<?php if ($isShop) : ?>

		<div class="prodarchive__list">

	<?php else : ?>
		<?php
		$hasChildCats = haveChildCategories();

		if (!$hasChildCats) : ?>

			<div class="prodarchive__list">

		<?php else : ?>

			<div class="prodarchive__list prodarchive__list--single">

		<?php endif; ?>
	<?php endif; ?>