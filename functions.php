<?php

/*
 * Constants
 */
if ( ! defined( 'RAGNAROCK_THEME_VERSION' ) ) {
	define( 'RAGNAROCK_THEME_VERSION', '1.0.0' );
}

if ( ! defined( 'RAGNAROCK_THEME_PATH' ) ) {
	define( 'RAGNAROCK_THEME_PATH', get_stylesheet_directory() );
}

if ( ! defined( 'RAGNAROCK_THEME_URI' ) ) {
	define( 'RAGNAROCK_THEME_URI', get_stylesheet_directory_uri() );
}


require RAGNAROCK_THEME_PATH . '/inc/helpers.php';
require RAGNAROCK_THEME_PATH . '/inc/shortcodes.php';
require RAGNAROCK_THEME_PATH . '/inc/ajax.php';
require RAGNAROCK_THEME_PATH . '/inc/theme-hooks.php';
require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks.php';
