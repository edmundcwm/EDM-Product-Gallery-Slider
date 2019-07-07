var $ = jQuery.noConflict();

$('#product-gallery').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false,
    animationLoop: false,
    slideshow: false,
    selector: ".woocommerce-product-gallery__wrapper > div",
    sync: "#product-thumbnails",
    smoothHeight: true,
});

$('#product-thumbnails').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 80,
    itemMargin: 5,
    maxItems: 4,
    asNavFor: '#product-gallery',
    selector: ".woocommerce-product-gallery-thumbnails__wrapper > div",
});
