<div class="modal fade" id="modalNewProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {!! Form::open(['route' => 'admin.items.store', 'method' => 'POST', 'id' => 'form-products-store', 'enctype' => 'multipart/form-data']) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo producto</h4>
            </div>

            <div class="modal-body">
                <!-- FORMULARIO CREAR -->
                <div class="form-group">

                    <div class="row col-md-7">

                        <div class="col-xs-6 col-md-6">
                            <img id="core-img-principal" src="{{ asset('/media/icon/upload-img-icon.png') }}" width="100%"/>

                            <div class="form-group">
                                {!! Form::file('img_name[]', ['accept' => 'image/jpg,image/png', 'id' => 'core-file-img-principal', 'class' => 'form-control form-with-100 form-group-validate val_img', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <img id="core-img-2" src="{{ asset('/media/icon/upload-img-icon.png') }}" width="100%"/>

                            <div class="form-group">
                                {!! Form::file('img_name[]', ['accept' => 'image/jpg,image/png', 'id' => 'core-file-img-2', 'class' => 'form-control form-with-100']) !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <img id="core-img-3" src="{{ asset('/media/icon/upload-img-icon.png') }}" width="100%"/>

                            <div class="form-group">
                                {!! Form::file('img_name[]', ['accept' => 'image/jpg,image/png', 'id' => 'core-file-img-3', 'class' => 'form-control form-with-100']) !!}
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <img id="core-img-4" src="{{ asset('/media/icon/upload-img-icon.png') }}" width="100%"/>

                            <div class="form-group">
                                {!! Form::file('img_name[]', ['accept' => 'image/jpg,image/png', 'id' => 'core-file-img-4', 'class' => 'form-control form-with-100']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row col-md-6">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', '', ['class'=> 'form-control form-with-100 form-group-validate val_text_num', 'placeholder' => 'Nombre', 'required']) !!}
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('quantity', 'Cantidad disponible') !!}
                                {!!  Form::number('quantity', '0', ['class'=> 'form-control form-with-100 form-group-validate val_num'])  !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('precio_compra', 'Precio de compra ($)') !!}
                                {!! Form::number('precio_compra', '0', ['class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('price', 'Precio de venta ($)') !!}
                                {!! Form::number('price', '0', ['class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('offert', 'Descuento (%)') !!}
                                {!! Form::selectRange('offert', 0, 99, 0, ['class'=>'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('proveedores_id', 'Proveedor') !!}
                                {!! Form::select('proveedores_id', $proveedoresList, \Illuminate\Support\Facades\Input::old('id'), ['class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('categories_id', 'Categoría') !!}
                                {!! Form::select('categories_id', $categoriasList, \Illuminate\Support\Facades\Input::old('id'), ['class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="form-group">
                                {!! Form::label('available', 'Estado') !!}
                                {!! Form::select('available', ['1' => 'Disponible para el público', '0' => 'No disponible para el público'],
                                'Elige un estado', ['class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                {!! Form::label('desc', 'Descripción del producto') !!}
                                {!! Form::textarea('desc', '', ['id' => 'desc', 'class'=> 'form-control', 'placeholder' => 'Descripcion del producto', 'required']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="store-new-product" type="submit" class="btn btn-info">Guardar</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
