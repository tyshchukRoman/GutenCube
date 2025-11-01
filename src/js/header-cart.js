function HeaderCart() {
  jQuery(document).ready(function($){
    $(".header-cart").on("mouseenter", function(){
      $(this).find(".header-cart-mini").stop(true, true).fadeIn(200);
    }).on("mouseleave", function(){
      $(this).find(".header-cart-mini").stop(true, true).fadeOut(200);
    });
  });
}

export default HeaderCart;
