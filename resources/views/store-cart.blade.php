@extends('layout-store')

@section('title', 'Carrito')

@section('content')

    <section class="title-basic-section">
        <article>
            <h3>
                <div class="title-section">
                    <span>CARRITO</span>

                    {!! Form::open(['route' => ['store.front.product.orden.trash'], 'method' => 'DELETE', 'class' => 'right']) !!}
                    <button type="submit" class="btn btn-danger btn-sm">Vaciar Carrito</button>
                    {!! Form::close() !!}

                    <a href="{{ url('/') }}" class="btn btn-sm btn-border-yellow right">Seguir Comprando</a>

                </div>

            </h3>

        </article>
    </section>

    <section class="container-products">
        <article>

            @if( count($cart) === 0)
                <div>No hay Items</div>
            @else
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td width="120px"><img src="{{ asset('/media/photo-items/' . $item->img_name) }}" width="100"/></td>
                            <td style="text-align: left">
                                <ul style="list-style: none; padding: 0">
                                    <li class="cd-link">
                                        <a href="{{ route('store.show.item', [$item->producto_id, \Illuminate\Support\Str::slug($item->name)]) }}">
                                            {{ $item->nombre }}
                                        </a>
                                    </li>
                                    <li>${{ $item->price  . ' -' . $item->offert . '%'}}</li>
                                    <li>
                                        {!! Form::open(['route' => 'store.front.product.orden.delete', 'method' => 'DELETE']) !!}
                                        {!! Form::hidden('id', $item->producto_id, ['id' => 'id']) !!}
                                        <button type="submit" class="btn btn-xs btn-danger">Quitar de la lista</button>
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
                            <td>${{ number_format($item->final_price, 2) }}</td>

                            <td>
                                {!! Form::open(['route' => 'store.front.product.orden.update', 'method' => 'PUT']) !!}
                                {!! Form::hidden('id', $item->producto_id, ['id' => 'id']) !!}
                                {!! Form::number('cantidad', $item->quantity, ['class' => 'form-control btn btn-sm btn-border-yellow', 'style' => 'width: 60px !important;'] ) !!}
                                <button type="submit" class="btn btn-border-yellow btn-order-quantity">Actualizar</button>
                                {!! Form::close() !!}
                            </td>

                            <td>${{ number_format($item->final_price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Total</h3></td>
                        <td><h3>${{ number_format($total, 2) }}</h3></td>
                    </tr>
                    </tbody>
                </table>

            @endif

        </article>
    </section>

    @if( !(count($cart) === 0))
        <section class="form-basic-section">
            <article>
                <div class="row col-sm-12" style="text-align: center">
                    {!! Form::open(['route' => ['store.front.product.orden.detail', 'rutaDeLaTienda'], 'method' => 'GET', 'id' => 'form-products-to-show']) !!}
                    <label class="radio-inline"><input type="radio" name="pago" value="1" checked><img src="{{ asset('/media/icon/card-icon.png') }}"></label>
                    <label class="radio-inline"><input type="radio" name="pago" value="2"><img src="{{ asset('/media/icon/paypal-icon.png') }}"></label>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-sm btn-border-yellow">Iniciar pago</button>
                    {!! Form::close() !!}
                </div>
            </article>
        </section>
    @endif

@endsection


@section('modals')

@endsection

@section('extra-js')
@endsection