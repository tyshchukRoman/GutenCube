<?php 

get_header();

get_template_part('template-parts/sections/banner-slider');


$products_slider_option = get('products-slider_product-list-option');
$products_slider_products = get('products-slider_product-list-products');

get_template_part('template-parts/sections/products-slider', null, [
  'title' => get('products-slider__title'),
  'subtitle' => get('products-slider__subtitle'),
  'button' => get('products-slider__button'),
  'products' => get_product_list($products_slider_option, $products_slider_products),
]);


get_template_part('template-parts/sections/our-advantages');


get_template_part('template-parts/sections/benefits');


get_template_part('template-parts/sections/content-image');


get_template_part('template-parts/sections/testimonials');


get_template_part('template-parts/sections/faq-about');


get_template_part('template-parts/sections/faq');


get_footer();

?>
