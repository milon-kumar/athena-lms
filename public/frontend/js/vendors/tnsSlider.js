$(".heroSlider").length && tns(
    {
        container: ".heroSlider",
        loop: !0,
        startIndex: 1,
        items: 1,
        nav: !1,
        autoplay: !0,
        swipeAngle: !1,
        speed: 400,
        autoplayButtonOutput: !1,
        mouseDrag: !0,
        lazyload: !0,
        gutter:0,
        dots:true,
        controlsContainer: "#heroSliderControls",
        responsive:
            {
                768: { items: 1 },
                990: { items: 1 }
            }
    }),


$(".sliderSecond").length && tns(
    {
        container: ".sliderSecond",
        loop: !0,
        startIndex: 1,
        items: 1,
        nav: !1,
        autoplay: !0,
        swipeAngle: !1, speed: 400, autoplayButtonOutput: !1, mouseDrag: !0, lazyload: !0, gutter: 20, controlsContainer: "#sliderSecondControls", responsive: { 768: { items: 2 }, 990: { items: 4 } }
    }),

$(".sliderThird").length && tns(
    {
        container: ".sliderThird",
        loop: !0, startIndex: 1,
        items: 1, nav: !1, autoplay: !0, swipeAngle: !1,
        speed: 400, autoplayButtonOutput: !1, mouseDrag: !0, lazyload: !0,
        gutter: 20, controlsContainer: "#sliderThirdControls",
        responsive: { 768: { items: 2 }, 990: { items: 4 } } }),

$(".sliderFourth").length && tns(
    {
        container: ".sliderFourth",
        loop: !0, startIndex: 1, items: 1, nav: !1, autoplay: !0,
        swipeAngle: !1, speed: 400, autoplayButtonOutput: !1, mouseDrag: !0,
        lazyload: !0, gutter: 20, controlsContainer: "#sliderFourthControls",
        responsive: { 768: { items: 2 }, 990: { items: 4 }
        }
    }),

$(".sliderTestimonial").length && tns(
    {
        container: ".sliderTestimonial", loop: !0, startIndex: 1, items: 1, nav: !1, autoplay: !0, swipeAngle: !1, speed: 400, autoplayButtonOutput: !1, mouseDrag: !0, lazyload: !0, gutter: 20, controlsContainer: "#sliderTestimonialControls", responsive: { 768: { items: 2 }, 990: { items: 3 }
        }
    }),

$(".sliderTestimonialSecond").length && tns({ container: ".sliderTestimonialSecond", loop: !0, startIndex: 1, items: 1, nav: !1, autoplay: !0, swipeAngle: !1, speed: 400, autoplayButtonOutput: !1, mouseDrag: !0, lazyload: !0, gutter: 20, controlsContainer: "#sliderTestimonialSecondControls", responsive: { 768: { items: 1 }, 990: { items: 1 } } }), $(".product").length && tns({ container: "#product", items: 1, startIndex: 1, navContainer: "#product-thumbnails", navAsThumbnails: !0, autoplay: !1, autoplayTimeout: 1e3, swipeAngle: !1, speed: 400, controls: !1 }), $(".sliderTestimonialThird").length && tns({ container: ".sliderTestimonialThird", loop: !0, startIndex: 1, items: 1, nav: !1, autoplay: !0, swipeAngle: !1, speed: 400, autoplayButtonOutput: !1, mouseDrag: !0, lazyload: !0, gutter: 20, controlsContainer: "#sliderTestimonialThirdControls", responsive: { 768: { items: 2 }, 990: { items: 3 } } });
