import FixWishlistPopup from './js/fix-wishlist-popup';
import InitPopups from './js/popup.js';
import AuthPopupFormSwitcher from './js/form-switch.js';
import MobileMenu from './js/mobile-menu.js';
import HeaderCart from './js/header-cart.js';
import ProductsSlider from './js/products-slider.js';
import BannerSlider from './js/banner-slider.js';
import TestimSlider from './js/testimonials.js';
import Accordion from './js/accordion.js';

import './js/cloudflare-captcha';
import './js/header-submenu';
import './scss/main.scss';

/*
 * On DOM Content Load
 */
document.addEventListener('DOMContentLoaded', () => {

  InitPopups();
  AuthPopupFormSwitcher();
  MobileMenu();
  HeaderCart();
  BannerSlider();
  TestimSlider();
  ProductsSlider();
  Accordion();

});

/*
 * On Full Page Load
 */
window.addEventListener('load', () => {

  FixWishlistPopup();

});
