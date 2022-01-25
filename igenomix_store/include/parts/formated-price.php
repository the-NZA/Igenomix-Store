<?php
define('NUM_DECIMALS', wc_get_price_decimals());
define('DECIMAL_SEP', wc_get_price_decimal_separator());
define('THOUSAND_SEP', wc_get_price_thousand_separator());


function price_fmt($price)
{
	return number_format($price, NUM_DECIMALS, DECIMAL_SEP, THOUSAND_SEP);
}
