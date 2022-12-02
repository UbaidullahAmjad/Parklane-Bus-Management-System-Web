jQuery(function ($) {
    "use strict";

    /* Menu Fixed
    ============================================== */
    $(window).scroll(function(){
        if ($(this).scrollTop() > 90) {
           $('body').addClass('menu-fixed');
        } else {
           $('body').removeClass('menu-fixed');
        }
    });

    /* OWL Sliders
    ============================================== */
    $('.main-banner').owlCarousel({
        items:1,
        margin:0,
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        nav: true,
        dots:false,
        navText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
    });

    /* Parallax
    ============================================== */
    $(".parallaxie").parallaxie({
        speed: 0.6,
        offset: 0,
    });

});