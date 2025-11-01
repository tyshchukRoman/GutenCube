document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.account-container');
  const switchers = document.querySelectorAll('.reset-switcher');

  // Toggle reset view
  switchers.forEach(switcher => {
    switcher.addEventListener('click', function (e) {
      e.preventDefault();
      container.classList.toggle('is-reset-active');
    });
  });

  // Listen for popup close event and reset switcher state
  document.addEventListener('popup:closed', (ev) => {
    if (!container) return;

    // Remove reset-active class when popup closes
    container.classList.remove('is-reset-active');

    // Optionally, clear all input fields inside popup
    const popupEl = ev && ev.detail && ev.detail.popup;
    if (popupEl) {
      popupEl.querySelectorAll('input').forEach(input => {
        input.value = '';
        input.defaultValue = '';
      });
    }
  });
});


document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('reset_sent') === '1') {
        // === OPEN LOGIN POPUP ===
        if (window.loginPopup && typeof window.loginPopup.open === 'function') {
            window.loginPopup.open();
        }

        // === INSERT SUCCESS NOTICE INTO LOGIN POPUP ===
        const wrapper = document.querySelector('#login-popup .woocommerce-notices-wrapper');
        if (wrapper) {
            const notice = document.createElement('div');
            notice.className = 'woocommerce-error'; 
            notice.textContent = 'Password reset email has been sent. Please check your inbox.';
            wrapper.appendChild(notice);
        }

        // === CLEAN URL ===
        urlParams.delete('reset_sent');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
