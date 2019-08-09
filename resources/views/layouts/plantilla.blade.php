<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- flickity -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/e3174186bf.js" defer></script>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/fullscreen.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles-productos.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles-login.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles-create.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles-cart.css') }}" rel="stylesheet">


  <title>@yield("title")</title>
</head>
<body>
<header>
  <nav class="navbar  fixed-top navbar-expand-lg  navbar-dark">
    <a class="navbar-brand" href="home.php"><img src="{{ asset('logotipo.png') }}" width="50" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('home') }}">Inicio<span class="sr-only">(current)</span></a>
    </li>
  <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Colecciones</a>
      <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="">Mujer</a>
        <a class="dropdown-item" href=""> Hombre</a>
        <a class="dropdown-item" href=""> Niños</a>
      </div>
  </li>
  </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
          <li class="nav-item">
              <a href="{{ route('product.shoppingCart') }}" class="nav-link">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Mi Carrito
                  <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
              </a>
          </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nombre}} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('compras') }}">Mis Compras</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
  </nav>
</header>
<main class="mainContent">
    @yield('content')
</main>

@include('layouts.footer')
@stack('scripts')
</body>
</html>
