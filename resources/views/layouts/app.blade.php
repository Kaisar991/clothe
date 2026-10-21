
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'CLOTHÉ | Fashion Store')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    
<header class="site-header">
    <a href="{{ url('/') }}" class="logo">CLOTHÉ</a>

    <button
        class="mobile-menu-toggle"
        id="mobileMenuToggle"
        type="button"
        aria-label="Buka menu navigasi"
        aria-expanded="false"
        aria-controls="mainNavigation"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>

    <nav class="navigation" id="mainNavigation">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/shop') }}">Shop</a>
        <a href="{{ url('/shop?category=tops') }}">Tops</a>
        <a href="{{ url('/shop?category=bottoms') }}">Bottoms</a>
    </nav>

    <a href="{{ url('/cart') }}" class="cart-link">Cart</a>
</header>


    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>&copy; {{ date('Y') }} CLOTHÉ. All rights reserved.</p>
    </footer>
<script src="{{ asset('js/hero-slider.js') }}" defer></script>
<script src="{{ asset('js/home-interactions.js') }}" defer></script>
<script src="{{ asset('js/mobile-menu.js') }}" defer></script>
<script src="{{ asset('js/clothe-stack.js') }}"defer></script>
</body>
</html>
