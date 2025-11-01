<?php

/*
 * Register Menus
 */
function ragnarock_register_menus(){
  register_nav_menus(
    array(
      'header-menu' => __('Header Menu', 'ragnarock'),
      'mobile-menu' => __('Mobile Menu', 'ragnarock'),
      'footer-menu-1' => __('Footer Col 1', 'ragnarock'),
      'footer-menu-2' => __('Footer Col 2', 'ragnarock'),
      'footer-menu-3' => __('Footer Col 3', 'ragnarock'),
    )
  );
}

add_action( 'after_setup_theme', 'ragnarock_register_menus' );
