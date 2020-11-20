<?php
$ukranian = [ 'ua', 'com.ua', 'kiev.ua', 'zp.ua', ];
/**
 * @param  string  $url
 * if a.ua; ->0
 * if a1.a.ua; ->1
 *
 * @return int
 */
function analyseDomains( string $url ): int {
	$first  = strpos( $url, '.' );
	$second = strpos( $url, '.', $first + 1 );
	if ( $second !== false ) {
		return 0;
	} else {
		return 1;
	}
}

echo analyseDomains( 'a.ua' );
