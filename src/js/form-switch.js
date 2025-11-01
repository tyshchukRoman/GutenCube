function AuthPopupFormSwitcher () {
  const container = document.querySelector('.popup-login');
  const switchers = document.querySelectorAll('.account-switcher');

  switchers.forEach(switcher => {
    switcher.addEventListener('click', function (e) {
      e.preventDefault();
      container.dataset.tab = switcher.dataset.tab;
    });
  });
};

export default AuthPopupFormSwitcher;
