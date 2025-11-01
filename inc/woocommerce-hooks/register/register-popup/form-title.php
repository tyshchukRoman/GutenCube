<?php

/*
 * Add title for register page
 */
add_action('woocommerce_register_form_start', function() { ?>
  <div class="login-popup__form | flow">
    <h3><?php esc_html_e('Sign up', 'ragnarock') ?></h3>

    <p class="account-switcher-wrapper">
      <?php esc_html_e('Already have an account?', 'ragnarock') ?>  
      <button class="account-switcher" data-tab="login"><?php esc_html_e('Sign in', 'ragnarock') ?></button>
    </p>
<?php });
