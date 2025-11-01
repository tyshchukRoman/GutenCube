<?php

/*
 * Close box around login form and add link to the register page
 */
add_action('woocommerce_login_form', function() { ?>
    <div class="lost-rem">
      <p class="form-row">
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
          <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
          <span><?php esc_html_e('Remember me', 'ragnarock'); ?></span>
        </label>
      </p>

      <p class="woocommerce-LostPassword lost_password">
        <button class="account-switcher reset-switcher" data-tab="reset-password">
          <?php esc_html_e('Lost your password?', 'ragnarock') ?>
        </button>
      </p>
    </div>

    <div id="cf-turnstile-login" class="cf-turnstile"></div>
  </div>
<?php });
