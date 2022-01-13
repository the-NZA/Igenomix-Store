<?php
/*
 * Pagination - Show numbered pagination inside loop
 */
?>

<?php
$pagiLinks = paginate_links([
	'prev_next'	=> true,
	'prev_text'	=> "<i class='fas fa-chevron-left'></i>",
	'next_text'	=> "<i class='fas fa-chevron-right'></i>",
	'end_size'	=> 2,
	'mid_size'	=> 2,
	'type'		=> 'array',
]);
?>

<nav class="site-pagination ignxpagi">
	<?php if ($pagiLinks && count($pagiLinks) > 1) : ?>

		<ul class="ignxpagi__list">

			<?php foreach ($pagiLinks as $link) : ?>

				<li class="ignxpagi__item">
					<?php echo $link; ?>
				</li>

			<?php endforeach; ?>
		</ul>

	<?php endif; ?>
</nav>