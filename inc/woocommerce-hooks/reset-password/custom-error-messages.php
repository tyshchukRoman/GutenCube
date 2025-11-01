<?php

/*
 * Custom error messages
 */
add_filter( 'woocommerce_add_error', function( $error ) {

  // Reset password errors
  if ( strpos( $error, 'Invalid username or email.' ) !== false ) {
    $error = __( 'We couldn’t find an account with that username or email for password reset.', 'ragnarock' );
  }

  if ( strpos( $error, 'Password reset is not allowed for this user' ) !== false ) {
    $error = __( 'Sorry, you cannot reset the password for this account for password reset.', 'ragnarock' );
  }

  return $error;
}, 10 );




