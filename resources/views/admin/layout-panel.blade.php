<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/panel.css') }}">

    @yield('extra-css')
    <title>@yield('title', 'App')</title>
</head>
<body>

@yield('content')

<script src=" {{ asset('js/jquery.min.js') }}"></script>
<script src=" {{ asset('js/bootstrap.min.js') }}"></script>
@yield('extra-scripts')
</body>
</html>