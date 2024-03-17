$(document).ready(function () {
    $('.history_carousel').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        dots: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        navText: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    });
});