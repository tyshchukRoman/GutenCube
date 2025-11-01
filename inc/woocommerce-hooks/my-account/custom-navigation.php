<?php

/*
 * Remove unesseccary buttons from the navigation
 */
add_filter( 'woocommerce_account_menu_items', function($items) {

  /*
   * Here you can remove any subpage
   */

  // unset( $items['dashboard'] );
  // unset( $items['orders'] );
  // unset( $items['downloads'] );
  // unset( $items['edit-account'] );
  // unset( $items['edit-address'] );
  // unset( $items['customer-logout'] );

  /*
   * You can change labels of these buttons also
   *
   * Example: $items['edit-account'] = __('Profile', 'ragnarock');
   */

  /*
   * Here you can change order of these links
   */
  $new_order = array(
      'dashboard'       => __( 'Dashboard', 'woocommerce' ),
      'orders'          => __( 'Orders', 'woocommerce' ),
      'edit-address'    => __( 'Addresses', 'woocommerce' ),
      'edit-account'    => __( 'Account details', 'woocommerce' ),
      'my-wishlist'    => __( 'Wishlist', 'woocommerce' ),
      'customer-logout' => __( 'Logout', 'woocommerce' ),
  );

  return $new_order;

});
