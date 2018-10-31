<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>La Salud Es Primero</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('splash/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('splash/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('splash/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('splash/landing-page.min.css') }}" rel="stylesheet">

</head>

<body>
<div id="app">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                La Salud Es Primero
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @if (Auth::check())   <!-- Si el usuario ha iniciado sesión se mostrará esto: -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('DoctorController@index') }}">{{__('Doctores') }}</a>
                    </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        @endif
                    </li>
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
    </div>
</nav>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('splash/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('splash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>

</html>
