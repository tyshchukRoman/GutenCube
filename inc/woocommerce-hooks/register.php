<?php 

/*
 * Woocommerce Hooks
 *
 * Register Form
 *
 */


$display_popup = get('header__login-popup', $options = true);

if($display_popup):

  // Register Popup Hooks
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/form-title.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/add-checkbox.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/add-confirm-password.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/custom-label.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-popup/custom-error-messages.php';

else:

  // Register Page Hooks
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/form-title.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/add-checkbox.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/add-confirm-password.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/custom-label.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/custom-error-messages.php';
  require GUTENCUBE_THEME_PATH . '/inc/woocommerce-hooks/register/register-page/form-bottom.php';

endif;
