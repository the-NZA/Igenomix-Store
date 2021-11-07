<?php
/**
 * The sidebar containing the main widget area.
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- Site aside -->
<aside class="prodarchive__aside">
	<!-- <nav class="prodarchive__asidenav">
		<ul class="asidenav">
			<li class="asidenav__item">
				<a class="active" href="#">Первая категория</a>
			</li>
			<li class="asidenav__item">
				<a href="#">Вторая категория</a>
			</li>
			<li class="asidenav__item">
				<a href="#">Категория три</a>
			</li>
			<li class="asidenav__item">
				<a href="#">Новая категория</a>
			</li>
			<li class="asidenav__item">
				<a href="#">Тестовая категория</a>
			</li>
		</ul>
	</nav> -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
<!-- Site aside END -->