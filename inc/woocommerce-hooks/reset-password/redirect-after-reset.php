<?php

add_action( 'login_form_lostpassword', function() {
    if ( isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] === 'confirm' ) {
        $referer = wp_get_referer();
        if ( $referer ) {
   
            wp_safe_redirect( add_query_arg( 'reset-link-sent', 'true', $referer ) );
        } else {
            wp_safe_redirect( home_url( '/login/?reset-link-sent=true' ) );
        }
        exit;
    }
});

add_filter( 'lostpassword_redirect', function( $redirect ) {
    $referer = wp_get_referer();
    if ( $referer && strpos( $referer, home_url() ) === 0 ) {
        return $referer;
    }
    return $redirect;
});
