
@extends('layouts.header')

@section('navegacion')

<nav class=" navbar navbar-expand-lg navegacion mb-0">
	<div class="container">

		<a class="navbar-brand" href="{{ url('/') }}">
			<img src="{{ asset('splash/img/logowhite.png')}}" class="img-heigth">
		</a>                

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon text-light"><i class="fal fa-bars"></i></span>
		</button>



		<div class="collapse navbar-collapse text-center bg-primary text-md-left" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav  ml-md-auto ">

				<li class="nav-item">
					<a class="nav-link" href="{{ url('visitante/citas') }}"><i class="icon fal fa-calendar-check"></i> {{__('Citas') }}</a>
				</li>		<li class="nav-item">
					<a class="nav-link" href="{{ url('visitante/consultorios') }}"><i class="icon fal fa-hospital"></i> {{__('Consultorios') }}</a>
				</li>
					<li class="nav-item">
					<a class="nav-link" href="{{ url('visitante/doctores') }}"><i class="icon fal fa-user-md"></i> {{__('Doctores') }}</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ url('visitante/especialidades') }}"> <i class="icon fal fa-file-certificate"></i> {{__('Especialidades') }}</a>
				</li>


				@auth

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link no-wait dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<i class="icon fal fa-user"></i> {{ Auth::user()->Name }} <span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{url(Auth::user()->ProfileUrl)}}">

						<i class="fal icon fa-user"></i>  {{__('Mi cuenta') }}

					</a>


						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="esperar(); event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="fal icon fa-sign-out-alt"></i> {{__('Cerrar sesión') }}

					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				
				</div>
			</li>

			@else
			<li class="nav-item">
				<a class="nav-link" href="{{ action('PatientController@index') }}"> <i class="icon fal fa-user-injured"></i> {{__('Entrar') }}</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ action('PatientController@index') }}"> <i class="icon fal fa-user-injured"></i> {{__('Registrarse') }}</a>
			</li>

			@endauth


		</ul>


	</ul>
</div>

</div>
</nav>

<main class="vh-100">
	@include('includes.messages')
	@yield('content')

</main>

<footer class="footer footer-web text-light ">
	<div class="container">
		
	<div class="row">
		<div class="col-12 col-lg-9 h-100 text-center text-lg-left ">
			<ul class=" nav d-block d-md-inline  mb-2">
				<li class="nav-item list-inline-item">
					<a href="{{url('/acerca')}}">Acerca de</a>
				</li>
				<li class="nav-item list-inline-item">
					<a href="{{url('/contacto')}}">Contacto</a>
				</li>
				<li class="nav-item list-inline-item">
					<a href="{{url('/visitante/consultorios')}}">consultorios</a>
				</li>
				<li class="nav-item list-inline-item">
					<a href="{{url('/visitante/doctores')}}">Doctores</a>
				</li>
			</ul>
		</div>
		<div class="col-12 col-lg-3 h-100 text-center text-lg-right ">
					<a href="#">
						<i class="fab fa-facebook fa-2x fa-fw"></i>
					</a>
					<a href="#">
						<i class="fab fa-twitter-square fa-2x fa-fw"></i>
					</a>
					<a href="#">
						<i class="fab fa-instagram fa-2x fa-fw"></i>
					</a>
		</div>
	</div>

	<div class="row">
		<div class="col">
			
		<p class=" small mb-4  text-light text-center">&copy; Universidad de Guadalajara.</p>
		</div>
	</div>
	</div>


</footer>

@endsection