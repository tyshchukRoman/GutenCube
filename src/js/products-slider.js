import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

function ProductsSlider() {
    const swiper = document.querySelector('.products-slider .swiper');

    if (swiper) {
        new Swiper(swiper, {
            modules: [Navigation],
            slidesPerView: 1,
            spaceBetween: 24,
            navigation: {
                nextEl: '.products-slider .slider-wrapper .next',
                prevEl: '.products-slider .slider-wrapper .prev',
            },
            breakpoints: {
                390: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                991: { slidesPerView: 4 },
                1200: { slidesPerView: 5 },
            },
            loop: true,
        });
    }
}

export default ProductsSlider;
