<?php

/*
 * Update Cart Automatically on Quantity Change
 */
add_action( 'wp_head', function() {
  ?>
    <style>
      .woocommerce button[name="update_cart"],
      .woocommerce input[name="update_cart"] {
        display: none;
      }
    </style>
  <?php

  add_action( 'wp_footer', function() { ?>
  <script>
    jQuery( function( $ ) {
      let timeout;
      $('.woocommerce').on('change', 'input.qty', function(){
        if ( timeout !== undefined ) {
          clearTimeout( timeout );
        }
        timeout = setTimeout(function() {
          $("[name='update_cart']").trigger("click");
        }, 500 );
      });
    } );
    </script>
  <?php });
});
