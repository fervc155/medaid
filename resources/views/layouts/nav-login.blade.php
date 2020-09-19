@extends('layouts.header')

@section('navegacion')
<nav class=" navbar navbar-expand-lg navegacion mb-0">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('splash/img/logowhite.png')}}" class="img-heigth">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"><i class="fas fa-bars"></i></span>
        </button>



        <div class="collapse navbar-collapse text-center bg-primary text-md-left" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav  ml-md-auto ">
                @guest
                <li class="nav-item">
                    <a class="nav-link" onclick="esperar()" href="{{ route('login') }}"><i class="fas icon fa-sign-in-alt"></i> {{__('Iniciar sesión') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" onclick="esperar()" href="{{ route('register') }}"><i class="fas icon fa-user-plus"></i> {{__('Registrarse') }}</a>
                    @endif
                </li>

                @endguest

            </ul>


            </ul>
        </div>

    </div>
</nav>


<!-- 
<nav class="navbar-responsive bg-primary ">
<div class="navbar bg-transparent sombra-0 ">

    @guest
    <ul class="p-3">
        
                <li class="nav-item">
                    <a class="nav-link" onclick="esperar()" href="{{ route('login') }}"><i class="fas icon fa-sign-in-alt"></i> {{__('Iniciar sesión') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" onclick="esperar()" href="{{ route('register') }}"><i class="fas icon fa-user-plus"></i> {{__('Registrarse') }}</a>
                    @endif
                </li>
    </ul>
               
            @endguest
</div>
</nav>
<div class="bodyClick">click</div>
 -->
@include('includes.messages')
@yield('content')



@endsection