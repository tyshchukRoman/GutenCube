<?php

/*
 * Add Title on login popup
 */
add_action('woocommerce_login_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h3><?php esc_html_e('Sign In', 'ragnarock') ?></h3>

    <p class="account-switcher-wrapper">
      <?php esc_html_e('Don’t have an account yet?', 'ragnarock') ?> 
      <button class="account-switcher" data-tab="register"><?php esc_html_e('Sign up', 'ragnarock') ?></button>
    </p>
<?php });
