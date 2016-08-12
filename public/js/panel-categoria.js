/**
 * Created by ANGELDAVID on 12/08/2016.
 */

(function ($) {
    var App = {
            init: function () {
                App.SelectCategoria();
            },
            SelectCategoria: function () {

                $('.btn-edit').click(function () {
                    var categoria = $(this).parents('div');
                    var id = categoria.data('categoria');
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
                        $('#idName').val(data[0].name);

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
