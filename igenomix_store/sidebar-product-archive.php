<?php
/**
 * The sidebar containing the main widget area.
 */

// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 	return;
// }

if ( is_product_category() ) {
	$currentCategory  = get_queried_object();
	$parentCatID = $currentCategory->parent !== 0 ? $currentCategory->parent : $currentCategory->term_id;
	$childCategories = get_terms([
		'taxonomy' => $currentCategory->taxonomy,
		'parent'   => $parentCatID,
	]);
}
?>

<!-- Site aside -->
<aside class="prodarchive__aside">
	<nav class="prodarchive__asidenav">
	<?php if(count($childCategories) > 0) : ?>

		<ul class="asidenav">
			<?php foreach($childCategories as $chCat) : ?>
			<li class="asidenav__item">
				<a class="<?php echo $chCat->term_id === $currentCategory->term_id ? 'active' : '';?>"
				   href="<?php echo get_category_link($chCat->term_id) ?>"
				>
					<?php echo $chCat->name;?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>

	<?php else : ?>

		<h4>No child categories</h4>

	<?php endif ; ?>
	</nav>
	<?php /* dynamic_sidebar( 'sidebar-1' ); */ ?>
</aside>
<!-- Site aside END -->