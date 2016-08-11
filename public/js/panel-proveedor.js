/**
 * Created by Jonathan on 20/07/2016.
 */
(function ($) {
    var App = {
            init: function () {
                App.DeleteProveedor();
                App.SelectProveedor();
            },
            DeleteProveedor: function () {

                $('.btn-delete').click(function () {
                    var proveedor = $(this).parents('tr');
                    var id = proveedor.data('proveedor');
                    var form = $('#form-delete');
                    var url = form.attr('action').replace('IDDel', id);
                    var data = form.serialize();

                    $('#modalDelete').modal('show');


                    $('#btn-eliminar').click(function () {
                        $('#modalDelete').modal('hide');

                        $.post(url, data, function (result) {
                            console.log(result);
                            alert(result);
                            proveedor.fadeOut();
                        }).fail(function () {
                            alert("Este registro no pudo ser eliminado");
                            proveedor.fadeIn();
                        });
                    });
                });
            },

            SelectProveedor: function () {

                $('.btn-edit').click(function () {
                    var proveedor = $(this).parents('tr');
                    var id = proveedor.data('proveedor');
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
                        $('#nom_empresaUp').val(data[0].nom_empresa);
                        $('#nom_contactoUp').val(data[0].nom_contacto);
                        $('#ap_paternoUp').val(data[0].ap_paterno);
                        $('#ap_maternoUp').val(data[0].ap_materno);

                        $('#desc_dirUp').val(data[0].desc_dir);
                        $('#estadoUp').val(data[0].estado);
                        $('#municipioUp').val(data[0].municipio);
                        $('#coloniaUp').val(data[0].colonia);
                        $('#calleUp').val(data[0].calle);
                        $('#num_dirUp').val(data[0].num_dir);
                        $('#cpUp').val(data[0].cp);

                        $('#desc_telUp').val(data[0].desc_tel);
                        $('#num_telUp').val(data[0].num_tel);

                        $('#desc_mailUp').val(data[0].desc_mail);
                        $('#correoUp').val(data[0].correo);

                        $('#modalUpProveedor').modal({
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