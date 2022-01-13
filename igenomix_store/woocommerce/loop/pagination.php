<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base = isset($base) ? str_replace('%#%', '{page_num}', $base) : str_replace(999999999, '{page_num}',remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false )));

$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	echo '<nav class="woocommerce-pagination prodarchive__pagination"></nav>';
	return;
}

/*
* Simple pagination functions from wp-kama.ru
* @url: https://wp-kama.ru/function/paginate_links
*/
function kama_paginate_links_data( $args ){
	global $wp_query;

	$args = wp_parse_args( $args, [
		'total' => $wp_query->max_num_pages ?? 1,
		'current' => null,
		'url_base' => '', //
	] );

	if( null === $args['current'] ){
		$args['current'] = max( 1, get_query_var( 'paged', 1 ) );
	}

	if( ! $args['url_base'] ){
		$args['url_base'] = str_replace( PHP_INT_MAX, '{page_num}', get_pagenum_link( PHP_INT_MAX ) );
	}

	$pages = range( 1, max( 1, (int) $args['total'] ) );

	foreach( $pages as & $page ){
		$page = (object) [
			'is_current' => $page == $args['current'] ,
			'page_num'   => $page,
			'url'        => str_replace( '{page_num}', $page, $args['url_base'] ),
		];
	}
	unset( $page );

	return $pages;
}
?>

<nav class="woocommerce-pagination prodarchive__pagination">
	<ul class="pagilist">

	<?php
	$links_data = kama_paginate_links_data( [
		'total' => $total,
		'current' => $current,
		'url_base' => $base,
	] );

	foreach($links_data as $link) : ?>

		<li class="pagilist__item">

			<button class="<?php echo $link->is_current ? 'pagilist__button current': 'pagilist__button'; ?>">
				<a href="<?php echo $link->url;?>"><?php echo $link->page_num; ?></a>
			</button>
		</li>

	<?php endforeach; ?>

	</ul>
</nav>
