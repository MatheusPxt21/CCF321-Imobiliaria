<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans" rel="stylesheet">

    <!-- CSS Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Styles -->

    <link rel="stylesheet" href="/css/style.css">

</head>
<header class="header">
    <div class="insideHeader">
        <a href="/">
            <img src="/imgs/logo.png" class="logoImg">
        </a>

        <div class="nav-buttons ms-auto d-flex">
            <a href="/" class="btn btn-custom mx-2">Inicio</a>
            <a href="/imoveis" class="btn btn-custom mx-2">Imoveis</a>
            <a href="{{ route('imoveis.display') }}" class="btn btn-custom mx-2">Adicionar Imoveis</a>

            <div class="auth-buttons ms-auto d-flex">

                @if(auth()->check())
                    <span class="btn btn-custom mx-2">Olá Corretor</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-custom mx-2">Sair</button>
                    </form>
                @else
                    @unless(request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="btn btn-custom mx-2">Login</a>
                    @endunless
                @endif
            </div>

        </div>
        <div>

        </div>
    </div>


</header>

<body class="content">
<div class="divContent">
    @yield('content')
</div>


<footer class="footer">
    <div class="footer-links">
        <a href="/">Início</a>
        <a href="/imoveis">Imóveis</a>
        <a href="/contato">Contato</a>
    </div>
    <div class="footer-info">
        <div class="footer-item">
            <i class="fas fa-map-marker-alt"></i>
            <ion-icon name="location-outline"></ion-icon>
            <span>111 Lorem Ipsum, Lorem- LI</span>
        </div>
        <div class="footer-item">
            <i class="fas fa-phone"></i>
            <ion-icon name="call"></ion-icon>
            <span>(11) 11111-1111</span>
        </div>
        <div class="footer-item">
            <i class="fas fa-envelope"></i>
            <ion-icon name="at"></ion-icon>
            <span>LoremIpsum@gmail.com</span>

        </div>
        <span>D&R Housing &copy; 2024 </span>
    </div>
</footer>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
