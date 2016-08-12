(function($) {

    var App = {
        init: function () {
            App.AddToOrdenByOne();
            App.AddToOrden();
        },

        AddToOrdenByOne: function() {
            $('.items-container').on("click", '.btn-add-by-one', function() {

                $('#id_producto_x').val($(this).attr('data-product'));

                if ( $('#cantidad').val() >= 1 )
                    addOrdenByOne();
                else {
                    alert("Cantidad mínima es 1");
                }
            });


            function addOrdenByOne() {
                var form = $('#form-orden-store-by-one');
                var data = form.serializeArray();
                var route = form.attr('action');

                $.ajax({
                    url:        route,
                    type:       'POST',
                    dataType:   'json',
                    data:       data,

                    beforeSend: function(){
                        // $('.core-loader').show();
                    },

                    success: function (result) {

                        if (result.error)
                            alert(result.error);
                        else
                            alert(result.message);


                    }

                }).fail(function (jqXHR, textStatus) {

                    $(jqXHR).each(function (key, error) {
                        console.log(error);
                    });

                });
            }
        },

        AddToOrden: function() {

            $('.show-info-product').on("click", '#btn-add-orden-store', function() {
                if ( $('#cantidad').val() >= 1 )
                    addOrden();
                else
                    alert("Cantidad mínima es de 1");
            });

            function addOrden() {
                var form = $('#form-orden-store');
                var data = form.serializeArray();
                var route = form.attr('action');

                $.ajax({
                    url:        route,
                    type:       'GET',
                    dataType:   'json',
                    data:       data,

                    beforeSend: function(){
                        // $('.core-loader').show();
                    },

                    success: function (result) {

                        if (result.error)
                            alert(result.error);
                        else
                            alert(result.message);

                        $('.close').click();

                    }

                }).fail(function (jqXHR, textStatus) {
                    $('.core-loader').hide();

                    $('#msj-danger-state').empty();

                    $(jqXHR).each(function (key, error) {
                        hideShowAlert('msj-danger', 'Ocurrio un problema');
                    });

                });
            }

        },


    };

    $(function(){
        App.init();
        $(window).resize();
    });

})(jQuery);