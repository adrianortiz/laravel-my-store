(function($) {
    var App = { init: function() {
        App.SliderConfig();
    },
        SliderConfig: function() {
            $('.general-slider').slick({
                dots: true,
                infinite: true,
                speed: 600,
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                arrows: false
            });
        }
    };

    $(function(){
        App.init();
        $(window).resize();
    });

})(jQuery);