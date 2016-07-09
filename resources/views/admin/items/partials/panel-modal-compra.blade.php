<div class="modal fade" id="modalNewCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {!! Form::open(['route' => 'admin.compras.store', 'method' => 'POST', 'id' => 'form-products-store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir compra</h4>

            </div>

            <div class="modal-body">

                <div class="form-group">
                    {!! Form::label('products_id', 'Producto', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::select('products_id', $productosList, \Illuminate\Support\Facades\Input::old('id'), ['class'=> 'form-control form-with-100 form-group-validate val_num', 'required'])  !!}
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('cantidad', 'Piezas', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::selectRange('cantidad', 1, 1000, 1, ['class'=>'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('precio_compra', 'Precio de compra', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('precio_compra', '0', ['class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('precio_venta', 'Precio de venta', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::number('precio_venta', '0', ['class'=> 'form-control form-with-100 form-group-validate val_double', 'placeholder' => 'Precio', 'required']) !!}
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
