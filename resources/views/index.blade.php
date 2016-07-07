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

    <?php for($i=1; $i <= 6; $i++) { ?>
    <div class="item">
        <div>
            <img src="{{ asset('media/item/img-' . $i . '.png') }}" />
        </div>
        <ul>
            <li>$299.00</li>
            <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing.</a></li>
            <li><a href="#">Duis iaculis, ante non molestie sagittis, felis turpis sure vulputate dui felis turpis vulputate dui</a></li>
            <li><input type="button" value="Añadir a la cesta"> <a href="#">Detalles</a></li>
        </ul>
    </div>
    <?php } ?>

</section>

<section class="items-special">
    <div class="title-section">
        <span>OFERTAS</span>
    </div>

    <?php for($i=4; $i >= 1; $i--) { ?>
    <a href="#">
        <div class="item-special">
            <div>
                <img src="{{ asset('media/item/img-' . $i . '.png') }}" width="100" height="auto"/>
            </div>
            <div>
                <ul>
                    <li><p style="padding-top: 18px">Lorem ipsum dolor sit amet, consectetur adipiscing.</P></li>
                    <li><span>$299.00</span><span>$299.00</span></li>
                </ul>
            </div>
        </div>
    </a>
    <?php } ?>


    <div class="title-section" style="margin-top: 36px;">
        <span>CATEGORÍAS</span>
    </div>

    <?php for($i=3; $i >= 1; $i--) { ?>
    <a href="#">
        <div class="item-special" style="height: 66px">
            <div>
                <img src="{{ asset('media/icon/category.png') }}" width="46" height="46" style="margin-top: 6px; margin-left: 8px;"/>
            </div>
            <div>
                <ul>
                    <li><p style="padding-top:20px">Lorem ipsum dolor</P></li>
                </ul>
            </div>
        </div>
    </a>
    <?php } ?>

</section>

@endsection
