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
                dots: false

            });
        },

        ConfigMenuMobile: function() {

            var btnMenu = document.getElementById('menu-a');
            var containerMenu = document.getElementById('header-menu');

            btnMenu.addEventListener('click', function() {
                containerMenu.classList.toggle('motrar-header');
            });

            window.addEventListener("resize", function() {
                console.log(document.width);
                containerMenu.classList.remove('motrar-header');
            });

        }
    };

    $(function(){
        App.init();
        $(window).resize();
    });

})(jQuery);