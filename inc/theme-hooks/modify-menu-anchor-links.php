<?php

/*
 * Remove "aria-current" attribute from anchor menu items
 *
 * This is added becase we don't want to highlight anchor menu items
 *
 */
add_filter( 'nav_menu_link_attributes', 'gutencube_remove_aria_current_from_anchor_links', 10, 3 );

function gutencube_remove_aria_current_from_anchor_links( $atts, $item, $args ) {
  if ( isset( $atts['href'] ) && strpos( $atts['href'], '#' ) !== false ) {
    unset( $atts['aria-current'] );
  }
  return $atts;
}
