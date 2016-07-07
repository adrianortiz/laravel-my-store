@extends('layout-store')

@section('title', 'Forniture Store')

@section('content')

<div class="container-slider">

    <div class="slider store-slider">

        @foreach($sliders as $slider)
        <div>
            <a href="#0">
                <img src="{{ asset('media/photo-slider/' . $slider->img_name) }}" alt="Imagen del slider" width="630" height="308">
            </a>
        </div>
        @endforeach

    </div>

    <div class="slider-items">
        <a href="#0"><img src="{{ asset('media/slider/slider-top.png') }}" alt="Slider top"></a>
        <a href="#0"><img src="{{ asset('media/slider/slider-bottom.png') }}" alt="Slider top"></a>
    </div>
</div>

<section class="items-container">
    <div class="title-section">
        <span>Nuevos productos en septiembre</span>
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
        <span>Especiales</span>
    </div>

    <?php for($i=6; $i >= 1; $i--) { ?>
    <a href="#">
        <div class="item-special">
            <div>
                <img src="{{ asset('media/item/img-' . $i . '.png') }}" width="100" height="auto"/>
            </div>
            <div>
                <ul>
                    <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing.</P></li>
                    <li><span>$299.00</span><span>$299.00</span></li>
                </ul>
            </div>
        </div>
    </a>
    <?php } ?>

</section>

@endsection
