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
        <div class="item">
            <div>
                <img src="{{ asset('media/photo-items/' . $producto->img_name) }}" height="100%"/>
            </div>
            <ul>
                <li>${{ $producto->price }}</li>
                <li><a href="#">{{ $producto->name }}</a></li>
                <li><a href="#">{{ $producto->desc }}</a></li>
                <li><input type="button" value="Añadir a la cesta"> <a href="#">Detalles</a></li>
            </ul>
        </div>
    @endforeach

</section>

<section class="items-special">
    <div class="title-section">
        <span>OFERTAS</span>
    </div>

    @foreach($productos as $producto)

        @if($producto->offert > 0)
        <a href="#">
            <div class="item-special">
                <div>
                    <img src="{{ asset('media/photo-items/' . $producto->img_name) }}" width="100" height="auto"/>
                </div>
                <div>
                    <ul>
                        <li><p style="padding-top: 18px">{{ $producto->desc }}</P></li>
                        <li><span>{{ $producto->offert }}%</span><span>${{ $producto->price }}</span></li>
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
        <a href="#">
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
