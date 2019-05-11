<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MedAid</title>

    <!-- Bootstrap -->
    <link href="{{ asset('splash/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    

    <!-- Íconos -->
    <link href="{{ asset('splash/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('splash/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
    <!-- Fuente -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('splash/landing-page.css') }}" rel="stylesheet">

    <!-- Data tables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}"/>

</head>

<body>
  
    <div id="app " class="container-fluid navegacion static-top bg-info py-3">
          
        <!-- Navigation -->

                    
                <nav class=" navbar navbar-expand-lg bg-transparent   ">
                    <a class="navbar-brand py-3" href="{{ url('/') }}">
                        <img src="{{ asset('splash/img/logowhite.png')}}" class="logo">
                    </a>                

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-light"><i class="fas fa-bars"></i></span>
                     </button>



                        <div class="collapse navbar-collapse text-center text-md-left" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav  ml-md-auto">
                                @if (Auth::check())   <!-- Si el usuario ha iniciado sesión se mostrará esto: -->

                                <!-- Sólo los administradores pueden ´ver Doctores y Consultorios -->
                                @admin
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('DoctorController@index') }}"><i class="icon fas fa-user-md"></i> {{__('Doctores') }}</a>
                                </li>
                                @endadmin

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('PatientController@index') }}"> <i class="icon fas fa-user-injured"></i> {{__('Pacientes') }}</a>
                                </li>

                                @admin
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('OfficeController@index') }}"><i class="icon fas fa-hospital"></i> {{__('Consultorios') }}</a>
                                </li>
                                @endadmin

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ action('AppointmentController@index') }}"><i icon class="fas fa-book"></i> {{__('Citas') }}</a>
                                </li>

                                @endif
                            </ul>

                            <!-- Lado derecho de navbar -->
                            <ul class="navbar-nav ml-md-3">
                                <!-- Auth -->
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fas icon fa-sign-in-alt"></i> {{__('Iniciar sesión') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas icon fa-user-plus"></i> {{__('Registrarse') }}</a>
                                    @endif
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="icon fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fas icon fa-sign-out-alt"></i> {{__('Cerrar sesión') }}
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

       
    </div>

    <main class="">
        @include('includes.messages')
        @yield('content')

    </main>

   <script src="{{ asset('splash/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('splash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('splash/vendor/bootstrap/js/bootstrap.min.css') }}"></script>

</body>

</html>
