<?php

/*
 * Register Menus
 */
function gutencube_register_menus(){
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu', 'gutencube'),
      'mobile-menu' => __('Mobile Menu', 'gutencube'),
      'footer-menu-1' => __('Footer Col 1', 'gutencube'),
      'footer-menu-2' => __('Footer Col 2', 'gutencube'),
      'footer-menu-3' => __('Footer Col 3', 'gutencube'),
    )
  );
}

add_action( 'after_setup_theme', 'gutencube_register_menus' );
