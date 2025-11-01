<?php

/*
 * Constants
 */
if ( ! defined( 'GUTENCUBE_THEME_VERSION' ) ) {
	define( 'GUTENCUBE_THEME_VERSION', '1.0.0' );
}

if ( ! defined( 'GUTENCUBE_THEME_PATH' ) ) {
	define( 'GUTENCUBE_THEME_PATH', get_stylesheet_directory() );
}

if ( ! defined( 'GUTENCUBE_THEME_URI' ) ) {
	define( 'GUTENCUBE_THEME_URI', get_stylesheet_directory_uri() );
}


require GUTENCUBE_THEME_PATH . '/inc/helpers.php';
require GUTENCUBE_THEME_PATH . '/inc/shortcodes.php';
require GUTENCUBE_THEME_PATH . '/inc/ajax.php';
require GUTENCUBE_THEME_PATH . '/inc/theme-hooks.php';
require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks.php';
require GUTENCUBE_THEME_PATH . '/inc/patterns.php';
