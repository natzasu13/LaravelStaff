<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- <title>{{ config('app.name', 'Aprendamos Más 2018') }}</title>  -->
    <title>Aprendamos Más</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  style="background-color: White !important">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #084B8A !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="color: white !important">
                <!--  {{ config('app.name', 'Aprendamos Más') }} -->  
                Aprendamos Más
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                                                  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"  style="color: white !important" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Usuarios Registrados
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/asistentesEvento') }}">Consultar</a>
          <a class="dropdown-item" href="{{ url('/asistentesEvento/create') }}">Crear</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
                        
                        <li><a class="nav-link"  style="color: white !important" href="{{ url('/usuarioEvento') }}"> Registro de Entrada</a></li>
                        <li><a class="nav-link"  style="color: white !important" href="{{ url('/ingresoEvento') }}"> Asistentes Evento</a></li>
                        <li><a class="nav-link"  style="color: white !important" href="{{ url('/sugerencias') }}"> Ideas App OnOff</a></li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"  style="color: white !important" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Itinerario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/itinerarios') }}">Consultar</a>
          <a class="dropdown-item" href="{{ url('/itinerarios/create') }}">Crear</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link"  style="color: white !important" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span>{{ __('Login') }}</a></li>
                            <li><a class="nav-link" style="color: white !important"  href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span>{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white !important" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
            </div>
        </nav>

        <main class="py-4" style="background-color: White !important">
            @yield('content')
        </main>
    </div>
</body>
</html>
