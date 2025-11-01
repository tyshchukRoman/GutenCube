<?php

/*
 * Woocommerce Hooks
 *
 * Login Form
 *
 */

$display_popup = get('header__login-popup', $options = true);

if($display_popup):

  // Login Popup Hooks
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/form-title.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/form-bottom.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/custom-placeholders.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/custom-label.php';

else:

  // Login Page Hooks
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/form-title.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/form-bottom.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/custom-placeholders.php';
  require RAGNAROCK_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/custom-label.php';

endif;
