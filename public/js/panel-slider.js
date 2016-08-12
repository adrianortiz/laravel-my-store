$(".form-slider-destroy").submit(function(e){
    if (!confirm("Está acción no se puede deshacer."))
    {
        e.preventDefault();
        return;
    }
});



(function ($) {
    var App = {
            init: function () {
                App.SelectSlider();
            },
            SelectSlider: function () {

                $('.btn-edit').click(function () {
                    var slider = $(this).parents('div');
                    var id = slider.data('slider');
                    var form = $('#form-show');
                    var url = form.attr('action').replace('IDShow', id);
                    var data = form.serialize();

                    $.get(url, data, function (result) {
                        fillUpdate(result);
                    }).fail(function () {
                        alert("Ocurrío un problema. Intentalo de nuevo");
                    });

                    function fillUpdate(data) {
                        $('#idUp').val(data[0].id);
                        $('#img_name').val(data[0].img_name);
                        $('#title').val(data[0].title);
                        $('#dec').val(data[0].dec);



                        $('#modalCategoriesUpdate').modal({
                            show: 'true'
                        });
                    }
                });
            }
        }
        ;

    $(function () {
        App.init();
        $(window).resize();
    });

})
(jQuery);