<?php

function ignx_output_all_notices() {
	echo '<div class="woocommerce-notices-wrapper singleprod__notice">';
		wc_print_notices();
	echo '</div>';
}