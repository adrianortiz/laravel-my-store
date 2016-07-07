/**
 * Created by Codizer on 7/6/16.
 */


(function($) {
    var App = { init: function() {
        App.SliderIndex();
        App.ConfigMenuMobile();
    },
        SliderIndex: function() {

            $('.store-slider').slick({
                autoplay: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
                // adaptiveHeight: true
            });
        },

        ConfigMenuMobile: function() {

            $('#menu-a').click( function() {
                $('#header-menu').toggleClass('motrar-header');
            });

            $(window).resize( function() {
                $('#header-menu').removeClass('motrar-header');
            });

        }
    };

    $(function(){
        App.init();
        $(window).resize();
    });

})(jQuery);