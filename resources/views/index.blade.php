<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('components/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
</head>
<body>
    <h1>Conectado a la nueva vista</h1>

    <div class="slider-container">
        <div class="general-slider">
            <div>
                <img src="{{ asset('media/slider/a.png') }}" alt="">
            </div>
            <div>
                <img src="{{ asset('media/slider/b.png') }}" alt="">
            </div>
        </div>
    </div>

</body>
<script src=" {{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('components/slick/slick.js') }}"></script>
<script src=" {{ asset('js/index.js') }}"></script>
</html>