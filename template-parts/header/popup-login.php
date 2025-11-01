<dialog class="popup | box" id="popup-login">
  <button class="popup__close">
    <?php echo get_inline_svg('close-icon') ?>
    <span class="visually-hidden"><?php esc_html_e('Close Popup', 'ragnarock') ?></span>
  </button>

  <div class="popup-login" data-tab="login">
    <div class="popup-login__login">
      <?php echo do_shortcode('[wc_login_form_rs]'); ?>
    </div>

    <div class="popup-login__reset-password">
      <h3><?php esc_html_e('Reset Password', 'ragnarock') ?></h3>
      <p>
        <button class="account-switcher" data-tab="login">
          <?php esc_html_e('Back to login', 'ragnarock') ?>
        </button>
      </p>
      <?php wc_get_template( 'myaccount/form-lost-password.php' ); ?>
    </div>

    <div class="popup-login__register">
      <?php echo do_shortcode('[wc_reg_form_rs]'); ?>
    </div>
  </div>
</dialog>
