<?php
/**
* Plugin Name: WooCommerce Currency GEL Symbol
* Plugin URI:  http://weare.de.com/
* Description: Adds Georgian lari (GEL) symbol to your WooCommerce shop
* Version:     1.0.1
* Author:      WeAreDe
* Author URI:  http://weare.de.com/
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Domain Path: /languages
* Text Domain: woo-gel
*/

/**
 * Don't open this file directly!
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'woocommerce_currencies', function( $currencies ) {
	if ( ! isset( $currencies['GEL'] ) ) {
		$currencies['GEL'] = __( 'Georgian Lari', 'woo-gel' );
	}
	return $currencies;
} );

add_filter( 'woocommerce_currency_symbol', function( $currency_symbol, $currency ) {
	switch( $currency ) {
		case 'GEL': $currency_symbol = is_admin() ? 'ლ' : '<i class="lari lari-bold"></i>'; break;
	}
	return $currency_symbol;
}, 10, 2 );

add_action( 'wp_enqueue_scripts', function() {
	wp_register_style( 'font-larisome', plugins_url( 'css/font-larisome.min.css', __FILE__ ), array(), '1.1' );
	wp_enqueue_style( 'font-larisome' );
} );

