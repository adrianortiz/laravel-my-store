$(document).ready(function () {
    $('#btn-hide-item-search-z').click(function (e) {
        e.preventDefault();
        $('.result-items-z').hide();
    });
});

(function ($) {
    var App = {
        init: function () {
            App.SelectProveedor();
        },
        SelectProveedor: function () {
            $('#txtBuscar').keyup(function () {
                var form = $('#form-buscar');
                var data = form.serializeArray();
                var route = form.attr('action');
                $.get(route, data, function (result) {
                    $('#list-items-search').empty();
                    if (result.productos[0]) {
                        $.each(result.productos, function (index, item) {
                            $('#list-items-search').append('<li><a href="' + result.url + item.id + '/' + item.name + '">' + item.name + '</a></li>');
                        });
                        $('.result-items-z').show();
                    } else {
                        $('.result-items-z').hide();
                    }
                })
            });
        }
    };

    $(function () {
        App.init();
        $(window).resize();
    });

})
(jQuery);
