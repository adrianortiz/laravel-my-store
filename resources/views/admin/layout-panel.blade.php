<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/panel.css') }}">

    <style>
        .active-menu {color: #000; border-bottom: solid 2px #2856B5; }
        .img-preview-mini {
            width: 100px;
            height: 110px;
            background-color: #E6E6E6;
            background-size: cover;
            background-position: center center;
            border-radius: 4px;
        }
    </style>

    @yield('extra-css')
    <title>@yield('title', 'App')</title>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Codizer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/home') }}">Dashboard</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}" target="_blank">Ver tienda</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Cuenta</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

<header>
    <div>
        <ul>
            <li><a href="{{ route('admin.slider') }}">Slider</a></li>
            <li><a href="{{ route('admin.items') }}">Productos</a></li>
            <li><a href="{{ route('admin.compras') }}">Compras</a></li>
            <li><a href="{{ route('admin.proveedores') }}">Proveedores</a></li>
            <li><a href="{{ route('admin.categorias') }}">Categorías</a></li>
            <li><a href="{{ route('coustumer.show') }}">Usuarios</a></li>
        </ul>
    </div>
</header>

@yield('content')

<footer class="footer" style="margin-top: 16px;">
    <div class="container">
        <p class="text-muted">Codizer prototype 2016.</p>
    </div>
</footer>

<script src=" {{ asset('js/jquery.min.js') }}"></script>
<script src=" {{ asset('js/bootstrap.min.js') }}"></script>
@yield('extra-scripts')

</body>
</html>