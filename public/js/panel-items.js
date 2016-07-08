(function($) {
    var App = { init: function() {
        App.AddInputFileImg();
    },
        AddInputFileImg: function () {

            $('#core-file-img-principal').on('change', function (e) {
                $('#core-img-principal').attr('src', URL.createObjectURL(e.target.files[0]));
            });

            $('#core-file-img-2').on('change', function (e) {
                $('#core-img-2').attr('src', URL.createObjectURL(e.target.files[0]));
            });

            $('#core-file-img-3').on('change', function (e) {
                $('#core-img-3').attr('src', URL.createObjectURL(e.target.files[0]));
            });

            $('#core-file-img-4').on('change', function (e) {
                $('#core-img-4').attr('src', URL.createObjectURL(e.target.files[0]));
            });

            $('#core-file-img-5').on('change', function (e) {
                $('#core-img-5').attr('src', URL.createObjectURL(e.target.files[0]));
            });

        }
    };

    $(function(){
        App.init();
        $(window).resize();
    });

})(jQuery);