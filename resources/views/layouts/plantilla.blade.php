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
      <a class="dropdown-item" href="{{ route('home') }}">Mujer</a>
      <a class="dropdown-item" href="{{ route('home') }}"> Hombre</a>
      <a class="dropdown-item" href="{{ route('home') }}"> Niños</a>
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
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
<main class="">
    @yield('content')
</main>

<footer>
  <div class="row">
    <div class="col-12 col-md-4">
      <article class="info-contacto">
        <h2>Contactanos</h3>
        <p>011-23242526</p>
        <p>splatter@example.com</p>
        <p>De 9 a 20 hs</p>
      </article>
    </div>
    <div class="col-12 col-md-4">
      <h5>Dejanos tu consulta</h5>
        <form method="post" enctype="multipart/form-data" action="index.php">
        <p class="form-row form-row-wide">
        <label for="log_email">Email&nbsp;<span class="required">*</span></label> <input type="email"
         class="input-text" name="email" id="log_email" autocomplete="email" value=""></p>
          <p class="form-row form-row-wide">
          <textarea name="consulta" rows="4" cols="100%" placeholder="Consulta"></textarea>
          </p>
        <p>
          <input type="submit" value="Enviar" class="btnSubmit btn-footer">
        </p>
      </form>
          </div>
    <div class="col-12 col-md-4">
      <div class="redes-sociales-footer">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
      </div>
      <div class="imagen-container">
        <img src="{{ asset('logotipo.png') }}" alt=""
        style = "width:100px; height:100px; margin-left:15px;">
      </div>
    </div>
  </div>
</footer>
@stack('scripts')
</body>
</html>
