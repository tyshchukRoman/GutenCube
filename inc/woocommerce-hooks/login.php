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
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/form-title.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/form-bottom.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/custom-placeholders.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-popup/custom-label.php';

else:

  // Login Page Hooks
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/form-title.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/form-bottom.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/custom-placeholders.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/login/login-page/custom-label.php';

endif;
