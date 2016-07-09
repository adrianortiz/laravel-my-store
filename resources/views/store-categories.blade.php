@extends('layout-store')

@section('title', 'Categoria')

@section('content')

    <section class="items-container" style="margin-top: 26px;">
        <div class="title-section">
            <span>LISTA DE PRODUCTOS</span>
        </div>

        @forelse($productos as $producto)
                <div class="item">
                    <div>
                        <img src="{{ asset('media/photo-items/' . $producto->img_name) }}" height="100%"/>
                    </div>
                    <ul>
                        <li>${{ $producto->price }}</li>
                        <li><a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">{{ $producto->name }}</a></li>
                        <li><a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">{{ $producto->desc }}</a></li>
                        <li><input type="button" value="Añadir a la cesta"> <a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">Detalles</a></li>
                    </ul>
                </div>
        @empty
            <div class="page-header">
                <h3>0 <small>Productos en está categoría</small></h3>
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
