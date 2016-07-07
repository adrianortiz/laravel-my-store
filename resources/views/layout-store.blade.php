<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('components/slick/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('components/slick/slick-theme.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/index.css') }}"/>
    @yield('extra-css')
    <title>@yield('title', 'Furniture')</title>
</head>
<body>
<header id="header-menu">
    <nav>
        <div id="menu-container">
            <ul>
                <li><a href="index.php" class="menu-selected">Inicio</a></li>
                <li><a href="#">Nuevo</a></li>
                <li><a href="#">Destacados</a></li>
                <li><a href="#">Más vendidos</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Fabricantes</a></li>
                <li><a href="#">Comentarios</a></li>
                <li><a href="contact.php">Contactos</a></li>
            </ul>
            <div id="menu-secundario">
                <h2>Categorias</h2>
                @include('partials.menu-store')
            </div>
        </div>

        <div id="lang-container">
            <ul>
                <li><a href="#"><img src="{{ asset('media/icon/a.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/b.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/c.png') }}" alt="a"></a></li>
                <li><a href="#"><img src="{{ asset('media/icon/d.png') }}" alt="a"></a></li>
            </ul>
        </div>
    </nav>
</header>

<div id="title-container">
    <div>
        <button id="menu-a">---</button>
        <a href="index.php">
            <img src="{{ asset('media/logo.png') }}" id="logo" width="239" height="65">
        </a>
        <ul id="cart-container-global">
            <li>
                <a href="#">
                    <img src="{{ asset('media/icon/cart-icon.png') }}" width="30" height="25"/>
                    <span id="cart-info">Carrito:</span>
                    <span id="cart-desc">Carrito de compras</span>
                    <span id="cart-count">0 Productos</span>
                </a>
            </li>
            <li>
                <span>Monedas: </span>
                <select name="moneda-general" id="moneda-general">
                    <option value="1">Us Dollar</option>
                    <option value="2">Mx Pesos</option>
                </select>
            </li>
        </ul>
        <div id="global-search">
            <form action="/" method="POST">
                <input type="text" placeholder="Búsqueda del sitio"/>
                <input type="submit" value="Ir">
            </form>
        </div>
    </div>
</div>


<div class="container-general">
    <div class="container-menu">
        @include('partials.menu-store')
    </div>



    @yield('content')



</div>
<footer>
    <div class="footer-top">
        <div>
            <ul>
                <li><h3>Home</h3></li>
                <li><a href="#">Featured</a></li>
                <li><a href="#">What's New?</a></li>
                <li><a href="#">Specials</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Login</a></li>
                <li><a href="#">Create an Account</a></li>
                <li><a href="#">Shipping & Return</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><h3>Contacts:</h3></li>
                <li><p>8901 Marmora Road, Glasgow, D04 89GR</p></li>
                <li><span>Tel: 1(234) 567-8901</span></li>
                <li><span>Tel: 1(234) 567-8902</span></li>
            </ul>
        </div>
        <div>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">RSS</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <ul>
            <li><a href="#">Furniture © 2013</a></li>
            <li><a href="#">Confidencialidad</a></li>
            <li><a href="#">Condiciones de uso</a></li>
        </ul>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('components/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/index-store.js') }}"></script>
@yield('extra-scripts')
</body>
</html>