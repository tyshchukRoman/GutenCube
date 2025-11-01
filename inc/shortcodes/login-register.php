<?php

/**
 * Files to use when you need separate login and register page instead of default my account login by woocomerce
 * This file use Woo templates, you'll need to use hooks to make adjustments
 * 
 * separate login and registration form on My Account page based on this article: https://www.businessbloomer.com/woocommerce-separate-login-registration/
 * 
 * If you want to have separate LOGIN, REGISTRATION and MY ACCOUNT pages then use this stack:
 * 
 * Use [wc_reg_form_rs] shortcode on the Register Page once SNIPPET #1 BELOW is active
 * Use [wc_login_form_rs] shortcode on the Login Page once SNIPPET #2 BELOW is active
 * Keep [woocommerce_my_account ] shortcode on the My Account Page
 * Add an optional registration redirection, so that customers go to the My Account page upon registration (login form already does that out of the box, the way I coded it)
 * Add an optional logged in redirection – SEE SNIPPET #3 BELOW – if you don’t want to show the error message in case the customer accesses the Login or Registration pages while logged in, and redirect to the My Account page instead
 * Enable “Allow customers to create an account on the “My account” page” on the “Accounts & Privacy” settings:
 */


/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        businessbloomer.com/woocommerce-customization
 * @author        Rodolfo Melogli, Business Bloomer
 * @compatible    WooCommerce 9
 * @community     https://businessbloomer.com/club/
 */
   
add_shortcode( 'wc_reg_form_rs', 'rs_separate_registration_form' );
     
function rs_separate_registration_form() {
    if ( is_user_logged_in() ) return '<p>You are already registered</p>';
    ob_start();
    do_action( 'woocommerce_before_customer_login_form' );
    $html = wc_get_template_html( 'myaccount/form-login.php' );

    // Ensure proper encoding and suppress warnings
    $dom = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    // Add meta tag for UTF-8 if not present
    if (strpos($html, '<meta charset="UTF-8">') === false) {
        $html = '<meta charset="UTF-8">' . $html;
    }
    $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $xpath = new DOMXPath($dom);
    $forms = $xpath->query('//form[contains(@class,"register")]');
    if ($forms->length > 0) {
        echo $dom->saveHTML($forms->item(0));
    } else {
        echo '<p>Registration form not found.</p>';
    }
    libxml_clear_errors();
    return ob_get_clean();
}


/**
 * @snippet       WooCommerce User Login Shortcode
 * @how-to        businessbloomer.com/woocommerce-customization
 * @author        Rodolfo Melogli, Business Bloomer
 * @compatible    WooCommerce 9
 * @community     https://businessbloomer.com/club/
 */
  
add_shortcode( 'wc_login_form_rs', function() {
    if ( is_user_logged_in() ) {
        return '<p>You are already logged in</p>';
    }

    ob_start();
    do_action( 'woocommerce_before_customer_login_form' );
    woocommerce_login_form( array(
        'redirect' => wc_get_page_permalink( 'myaccount' )
    ) );
    return ob_get_clean();
});

/**
 * @snippet       Redirect Login/Registration to My Account
 * @how-to        businessbloomer.com/woocommerce-customization
 * @author        Rodolfo Melogli, Business Bloomer
 * @compatible    WooCommerce 9
 * @community     https://businessbloomer.com/club/
 */
 
// -----------------------------
// AUTO LOGIN AFTER REGISTRATION
add_action( 'woocommerce_created_customer', function( $customer_id ) {
    wp_set_current_user( $customer_id );
    wp_set_auth_cookie( $customer_id );
}, 20, 1 );



// -----------------------------
// REDIRECT LOGIN & REGISTRATION
add_filter( 'woocommerce_registration_redirect', function() {
    return wc_get_page_permalink( 'myaccount' );
});

add_filter( 'woocommerce_login_redirect', function( $redirect, $user ) {
    return wc_get_page_permalink( 'myaccount' );
}, 10, 2 );

// -----------------------------
// REDIRECT IF ALREADY LOGGED IN

add_action( 'template_redirect', function() {


    if ( is_page() && is_user_logged_in() ) {
        global $post;
        if ( $post && ( has_shortcode( $post->post_content, 'wc_login_form_rs' ) || has_shortcode( $post->post_content, 'wc_reg_form_rs' ) ) ) {
            wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
            exit;
        }
    }


    if ( is_page( wc_get_page_id( 'myaccount' ) ) && ! is_user_logged_in() ) {

        $allow_passflow = false;


        if ( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url( 'lost-password' ) ) {
            $allow_passflow = true;
        }

        $allowed_gets = array( 'reset-link-sent', 'reset', 'checkemail' );
        foreach ( $allowed_gets as $g ) {
            if ( isset( $_GET[ $g ] ) ) {
                $allow_passflow = true;
                break;
            }
        }

        if ( ! $allow_passflow ) {
            $request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
            if ( strpos( $request_uri, 'lost-password' ) !== false ) {
                $allow_passflow = true;
            }
        }

        if ( ! $allow_passflow ) {
            
            $display_popup = get('header__login-popup', $options = true);

            if($display_popup):

            wp_safe_redirect( home_url( '/?popup=login' ) );
            exit;

            else:
            wp_safe_redirect( home_url( '/login' ) );
            exit;

            endif;
        }
    }
});

