@extends('layout-store')

@section('title', 'Tienda - ' . $productos->name )

@section('content')

    <section class="items-container" style="margin-top: 26px;">
        <div class="title-section">
            <span style="text-transform: uppercase">{{ $productos->name }}</span>
        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="col-md-12">
                    <img src="{{ asset('media/photo-items/' . $productos->img_name) }}" class="img-responsive" alt="Responsive image">
                </div>

                <div class="col-xs-3 col-md-3 col-lg-6"  style="margin-top: 10px;">
                    <img src="{{ asset('media/photo-items/' . $productos->img_name) }}" class="img-responsive" alt="Responsive image">
                </div>

                @foreach($images as $image)

                    <div class="col-xs-3 col-md-3 col-lg-6" style="margin-top: 10px;">
                        <img src="{{ asset('media/photo-items/' . $image->img_name) }}" class="img-responsive" alt="Responsive image">
                    </div>

                @endforeach


            </div>

            <div class="col-xs-12 col-md-6">

                <div class="page-header">
                    <h4>Detalles del producto</h4>
                </div>

                <h4>Precio:</h4>
                <p><code>${{ $productos->price }}</code></p>

                <h4>Oferta:</h4>
                <p>-{{ $productos->offert }}%</p>

                <h4>Por:</h4>
                <p>{{ $productos->nom_empresa }}</p>

                <h4>Categorías:</h4>
                <p>{{ $productos->name_category }}</p>

                <h4>Descripción:</h4>
                <p>{{ $productos->desc }}</p>

                <div class="page-header">
                    <h4>Cantidad</h4>
                </div>

                {!! Form::open(['route' => 'cliente.carrito.storeByNumber', 'method' => 'POST', 'id' => 'form-orden-store-by-number', 'class' => 'form-inline']) !!}
                    {!! Form::hidden('id', $productos->id, ['id' => 'id_producto']) !!}
                    <div class="form-group" style="width: 50%;">
                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" value="1" required style="width: 100%;">
                    </div>
                    <button type="submit" class="btn btn-warning" required style="width: 40%;">Comprar</button>
                {!! Form::close() !!}

            </div>
        </div>


        <div class="title-section" style="margin-top: 30px;">
            <span>PRODUCTOS RELACIONADOS</span>
        </div>

        @forelse($relacionados as $relacionado)
            <div class="item">
                <div>
                    <img src="{{ asset('media/photo-items/' . $relacionado->img_name) }}" height="100%"/>
                </div>
                <ul>
                    <li>${{ $relacionado->price }}</li>
                    <li><a href="{{ route('store.show.item', [$relacionado->relacionado_id, \Illuminate\Support\Str::slug($relacionado->name)]) }}">{{ $relacionado->name }}</a></li>
                    <li><a href="{{ route('store.show.item', [$relacionado->relacionado_id, \Illuminate\Support\Str::slug($relacionado->name)]) }}">{{ $relacionado->desc }}</a></li>
                    <li><input type="button" class="btn-add-by-one" data-product="{{ $relacionado->relacionado_id }}" value="Añadir a la cesta"> <a href="{{ route('store.show.item', [$relacionado->id, \Illuminate\Support\Str::slug($relacionado->name)]) }}">Detalles</a></li>
                </ul>
            </div>
        @empty
            <div class="page-header">
                <h3>0 <small>Productos relacionado</small></h3>
            </div>
        @endforelse

    </section>

    <section class="items-special" style="margin-top: 26px;">
        <div class="title-section">
            <span>OFERTAS</span>
        </div>

        @foreach($ofertas as $oferta)

            @if($oferta->offert > 0 && $oferta->available == 1)
                <a href="{{ route('store.show.item', [$oferta->id, \Illuminate\Support\Str::slug($oferta->name)]) }}">
                    <div class="item-special">
                        <div>
                            <img src="{{ asset('media/photo-items/' . $oferta->img_name) }}" width="100" height="auto"/>
                        </div>
                        <div>
                            <ul>
                                <li><p style="padding-top: 18px">{{ $oferta->desc }}</P></li>
                                <li><span>-{{ $oferta->offert }}%</span><span>${{ $oferta->price }}</span></li>
                            </ul>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach


        <div class="title-section" style="margin-top: 36px;">
            <span>CATEGORÍAS</span>
        </div>

        @foreach($categorias as $categoria)
            <a href="{{ route('store.show.item.category', [$categoria->id, \Illuminate\Support\Str::slug($categoria->name)]) }}">
                <div class="item-special" style="height: 66px">
                    <div>
                        <img src="{{ asset('media/icon/category.png') }}" width="46" height="46" style="margin-top: 6px; margin-left: 8px;"/>
                    </div>
                    <div>
                        <ul>
                            <li><p style="padding-top:20px">{{ $categoria->name }}</P></li>
                        </ul>
                    </div>
                </div>
            </a>
        @endforeach

    </section>

@endsection


@section('extra-scripts')

    @include('store-form-js')

@endsection