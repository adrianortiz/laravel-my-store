<div style="display: none">
    {!! Form::open(['route' => 'cliente.carrito.store', 'method' => 'POST', 'id' => 'form-orden-store-by-one']) !!}
    {!! Form::text('id', 0, ['id' => 'id_producto_x']) !!}
    <div>
        <div>{!! Form::label('nombre', 'Cantidad') !!}</div>
        <div class="show-info-product">
            {!! Form::number('cantidad', '1', ['id' => 'cantidad', 'class'=> 'form-control', 'placeholder' => 'Piezas']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <div class="btn-to-add-algo">
        <div class="show-info-product">
            <button id="btn-add-orden-store" type="button" class="btn btn-border-yellow">Añadir al carrito</button>
        </div>
    </div>
</div>


<script src="{{ asset('/js/store-cart.js') }}"></script>