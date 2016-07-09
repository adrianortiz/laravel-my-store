<style>
    .img-preview-general,
    #img-preview-item-1,
    #img-preview-item-2,
    #img-preview-item-3,
    #img-preview-item-4 {
        width: 100%;
        height: 140px;
        overflow: hidden;
        background-color: #FAFAFA;
        margin-bottom: 6px;;
    }
</style>

<div class="modal fade" id="modalUpdateProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {!! Form::open(['route' => 'admin.items.update', 'method' => 'PUT', 'id' => 'form-products-store', 'enctype' => 'multipart/form-data']) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar producto</h4>
            </div>

            <div class="modal-body">
                <!-- FORMULARIO CREAR -->
                <div class="form-group">

                    <div class="row col-md-7">

                        <div class="col-xs-6 col-md-6 img-item-view">

                            <div id="img-preview-item-1">
                                <img src="{{ asset('/media/icon/upload-img-icon.png') }}" width="140%"/>
                            </div>

                            <div class="form-group">
                                <div class="btn-group" style="width: 100% !important;">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                        Opciones <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6 img-item-view">

                            <div id="img-preview-item-2">
                                <img src="{{ asset('/media/icon/upload-img-icon.png') }}" width="140%"/>
                            </div>

                            <div class="form-group">
                                <div class="btn-group" style="width: 100% !important;">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                        Opciones <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6 img-item-view">

                            <div id="img-preview-item-3">
                                <img src="{{ asset('/media/icon/upload-img-icon.png') }}" width="140%"/>
                            </div>

                            <div class="form-group">
                                <div class="btn-group" style="width: 100% !important;">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                        Opciones <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6 img-item-view">

                            <div id="img-preview-item-4">
                                <img src="{{ asset('/media/icon/upload-img-icon.png') }}" width="140%"/>
                            </div>

                            <div class="form-group">
                                <div class="btn-group" style="width: 100% !important;">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                        Opciones <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Editar</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Eliminar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row col-md-6">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::hidden('id', '0', ['id' => 'id_up', 'class'=> 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', '', ['id' => 'name-up', 'class'=> 'form-control form-with-100 form-group-validate val_text_num', 'placeholder' => 'Nombre', 'required']) !!}
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('quantity', 'Cantidad disponible') !!}
                                {!!  Form::number('quantity', '0', ['id' => 'quantity-up', 'class'=> 'form-control form-with-100 form-group-validate val_num'])  !!}
                            </div>
                        </div>

                        <!--
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('precio_compra', 'Precio de compra ($)') !!}
                                {!! Form::number('precio_compra', '0', ['id' => 'precio_compra-up', 'class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
                            </div>
                        </div>
                        -->

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('price', 'Precio de venta ($)') !!}
                                {!! Form::number('price', '0', ['id' => 'price-up', 'class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('offert', 'Descuento (%)') !!}
                                {!! Form::selectRange('offert', 0, 99, 0, ['id' => 'offert-up', 'class'=>'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('proveedores_id', 'Proveedor') !!}
                                {!! Form::select('proveedores_id', $proveedoresList, \Illuminate\Support\Facades\Input::old('id'), ['id' => 'proveedores_id-up', 'class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('categories_id', 'Categoría') !!}
                                {!! Form::select('categories_id', $categoriasList, \Illuminate\Support\Facades\Input::old('id'), ['id' => 'categories_id-up', 'class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('available', 'Estado') !!}
                                {!! Form::select('available', ['1' => 'Disponible para el público', '0' => 'No disponible para el público'],
                                'Elige un estado', ['id' => 'available-up', 'class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('desc', 'Descripción del producto') !!}
                                {!! Form::textarea('desc', '', ['id' => 'desc-up', 'class'=> 'form-control', 'placeholder' => 'Descripcion del producto', 'required']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="store-new-product" type="submit" class="btn btn-info">Guardar</button>
                </div>


            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
