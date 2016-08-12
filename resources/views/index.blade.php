@extends('layout-store')

@section('title', 'Forniture Store')

@section('content')

<div class="container-slider">

    <div class="store-slider">

        @forelse($sliders as $slider)
        <div>
            <a href="#0">
                <img src="{{ asset('media/photo-slider/' . $slider->img_name) }}" alt="Imagen del slider" width="100%" height="auto">
            </a>
        </div>
        @empty
        <div>
            <a href="#0">
                <img src="{{ asset('media/photo-slider/slider.png') }}" alt="Imagen del slider" width="100%" height="auto">
            </a>
        </div>
        <div>
            <a href="#0">
                <img src="{{ asset('media/photo-slider/slider.png') }}" alt="Imagen del slider" width="100%" height="auto">
            </a>
        </div>
        @endforelse

    </div>

    <!--
    <div class="slider-items">
        <a href="#0"><img src="{{ asset('media/slider/slider-top.png') }}" alt="Slider top"></a>
        <a href="#0"><img src="{{ asset('media/slider/slider-bottom.png') }}" alt="Slider top"></a>
    </div>

    -->
</div>

<section class="items-container">
    <div class="title-section">
        <span>LISTA DE PRODUCTOS</span>
    </div>

    @foreach($productos as $producto)
        @if($producto->available == 1)
        <div class="item">
            <div>
                <img src="{{ asset('media/photo-items/' . $producto->img_name) }}" height="100%"/>
            </div>
            <ul>
                <li>${{ $producto->price }}</li>
                <li><a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">{{ $producto->name }}</a></li>
                <li><a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">{{ $producto->desc }}</a></li>
                <li><input type="button" class="btn-add-by-one" data-product="{{ $producto->id }}" value="Añadir a la cesta"> <a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">Detalles</a></li>
            </ul>
        </div>
        @endif
    @endforeach

</section>

<section class="items-special">
    <div class="title-section">
        <span>OFERTAS</span>
    </div>

    @foreach($productos as $producto)

        @if($producto->offert > 0 && $producto->available == 1)
        <a href="{{ route('store.show.item', [$producto->id, \Illuminate\Support\Str::slug($producto->name)]) }}">
            <div class="item-special">
                <div>
                    <img src="{{ asset('media/photo-items/' . $producto->img_name) }}" width="100" height="auto"/>
                </div>
                <div>
                    <ul>
                        <li><p style="padding-top: 18px">{{ $producto->desc }}</P></li>
                        <li><span>-{{ $producto->offert }}%</span><span>${{ $producto->price }}</span></li>
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
