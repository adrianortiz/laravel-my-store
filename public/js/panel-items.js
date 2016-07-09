var containerProducts = $('#list-products');

function fillModalProduct(result) {

    $('#id_up').val(result.product.producto_id);
    $('#name-up').val(result.product.name);
    $('#quantity-up').val(result.product.quantity);
    $('#price-up').val(result.product.price);
    $('#offert-up').val(result.product.offert);
    $('#proveedores_id-up').val(result.product.proveedores_id);
    $('#categories_id-up').val(result.product.categories_id);
    $('#available-up').val(result.product.available);
    $('#desc-up').val(result.product.desc);


    var controlImgA = 2;
    for(var $i = 0; $i < 4; $i++) {
        $('#img-preview-item-' + controlImgA + ' img').attr('src', result.urlIcon);
        controlImgA++;
    }

    $('#img-preview-item-1 img').attr('src', result.url + result.product.img_name);

    var controlImg = 2;
    for(var $i = 0; $i < 3; $i++) {
        $('#img-preview-item-' + controlImg + ' img').attr('src', result.url + result.images[$i]['img_name']);
        controlImg++;
    }
}

(function($) {
    var App = { init: function() {
        App.AddInputFileImg();
        App.SelectProduct();
    },
        AddInputFileImg: function () {

            $('.img-item-view div input').on('change', function (e) {
                var containerImg = $(this).parents('.img-item-view');
                containerImg.children('.img-preview-general').children('img').attr('src', URL.createObjectURL(e.target.files[0]));
            });

        },

        SelectProduct: function () {

            $(containerProducts).on("click", "button.btn-item-show", function () {
                tableTrTouched = $(this).parents('tr');
                console.log($(this).attr('data-product'));
                console.log(tableTrTouched);
                $('#id-product-to-show').val($(this).attr('data-product'));

                initGetProduct();
            });


            function initGetProduct() {
                var form = $('#form-products-to-show');
                var data = form.serializeArray();
                var route = form.attr('action');

                $.ajax({
                    url: route,
                    type: 'GET',
                    dataType: 'json',
                    data: data,

                    beforeSend: function () {
                        $('.core-loader').fadeIn()
                    },

                    success: function (result) {
                        fillModalProduct(result);
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