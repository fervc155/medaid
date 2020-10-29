@extends('layouts.header')

@section('navegacion')
<?php $active = explode('/',Request::route()->uri)[0]; ?>



<main class="dashboard">

	<div class="d-flex">


		<nav class="navbar-responsive navbar-responsive-open " style="background-image: url({{asset('splash/header/login.jpg')}})">
			<div class="navbar-responsive-base">


				<div class="admin-logo">
					<a class="" href="{{ url('/') }}">
						<img src="{{ asset('splash/img/logowhite.png')}}" class="img-fluid">
					</a>

				</div>
				<ul class="elementos" id="accordion-menu-responsive" role="tablist">

					<li class="nav-item <?php if ($active == 'home') {
						echo 'active';
					} ?>"><a href="{{url('/home')}}" class="nav-link"><i class="fal fa-chart-pie"></i> Escritorio</a></li>


					@if(Auth::Patient())

					<li class="card-collapse nav-item <?php if ($active == 'doctor') {
						echo 'active';
					} ?>">
					<a class="nav-link" data-toggle="collapse" href="#collapseDoctor" aria-expanded="true" aria-controls="collapseDoctor"><i class="fal fa-user-md"></i> Doctores
					</a>
					<div id="collapseDoctor" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion-menu-responsive">
						<ul class="elementos pb-1">
							<li class="nav-item <?php if ($active == 'money') {
								echo 'active';
							} ?>"><a href="{{url('/doctor')}}" class="nav-link"><i class="fal  fa-users"></i> Todos</a></li>



							@if(Auth::Office())

							<li class="nav-item <?php if ($active == 'options') {
								echo 'active';
							} ?>"><a href="{{url('/doctor/create')}}" class="nav-link"><i class="fal fa-user-plus"></i> Agregar nuevo</a></li>

							@endif

						</ul>
					</div>
				</li>

				@endif

				@if(Auth::Doctor())



				<li class="card-collapse nav-item <?php if ($active == 'patient') {
					echo 'active';
				} ?>">
				<a class="nav-link" data-toggle="collapse" href="#collapsePatient" aria-expanded="true" aria-controls="collapsePatient"><i class="fal fa-user-injured"></i> Pacientes
				</a>
				<div id="collapsePatient" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion-menu-responsive">
					<ul class="elementos pb-1">
						<li class="nav-item <?php if ($active == 'money') {
							echo 'active';
						} ?>"><a href="{{url('/patient')}}" class="nav-link"><i class="fal  fa-users"></i> Todos</a></li>

						@if(Auth::Office())
						<li class="nav-item <?php if ($active == 'options') {
							echo 'active';
						} ?>"><a href="{{url('/patient/create')}}" class="nav-link"><i class="fal fa-user-plus"></i> Agregar nuevo</a></li>

						@endif


					</ul>
				</div>
			</li>

			@endif


			@if(Auth::Patient())

			<li class="card-collapse nav-item <?php if ($active == 'office') {
				echo 'active';
			} ?>">
			<a class="nav-link" data-toggle="collapse" href="#collapseHospital" aria-expanded="true" aria-controls="collapseHospital"><i class="fal fa-hospital"></i> Consultorios</a>

			<div id="collapseHospital" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion-menu-responsive">
				<ul class="elementos pb-1">
					<li class="nav-item <?php if ($active == 'money') {
						echo 'active';
					} ?>"><a href="{{url('/office')}}" class="nav-link"><i class="fal  fa-hospitals"></i> Todos</a></li>

					@admin
					<li class="nav-item <?php if ($active == 'options') {
						echo 'active';
					} ?>"><a href="{{url('/office/create')}}" class="nav-link"><i class="fal fa-clinic-medical"></i> Agregar nuevo</a></li>

					@endadmin


				</ul>
			</div>
		</li>

		@endif

		@if(Auth::Patient())

		<li class="card-collapse nav-item <?php if ($active == 'appointment') {
			echo 'active';
		} ?>">
		<a class="nav-link" data-toggle="collapse" href="#collapseAppointment" aria-expanded="true" aria-controls="collapseAppointment"><i class="fal fa-calendar-check"></i> Citas</a>

		<div id="collapseAppointment" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion-menu-responsive">
			<ul class="elementos pb-1">
				<li class="nav-item <?php if ($active == 'money') {
					echo 'active';
				} ?>"><a href="{{url('/appointment')}}" class="nav-link"><i class="fal  fa-book"></i> Todas</a></li>


				<li class="nav-item <?php if ($active == 'options') {
					echo 'active';
				} ?>"><a href="{{url('/appointment/create')}}" class="nav-link"><i class="fal fa-calendar-plus"></i> Agregar nuevo</a></li>

				<li class="nav-item <?php if ($active == 'money') {
					echo 'active';
				} ?>"><a href="{{url('/prescription')}}" class="nav-link"><i class="fal  fa-envelope-open-text"></i> Recetas</a></li>



			</ul>
		</div>
	</li>









	@endif

	@if(Auth::Doctor())


	<li class="nav-item <?php if ($active == 'chat') {
		echo 'active';
	} ?>"><a href="{{url('/chat')}}" class="nav-link"><i class="far fa-comments"></i> Chat</a></li>
	@endif

	@if(Auth::Office() || Auth::IsPatient())
	<li class="nav-item <?php if ($active == 'speciality') {
		echo 'active';
	} ?>"><a href="{{url('/speciality')}}" class="nav-link"><i class="fal fa-file-certificate"></i> Especialidades</a></li>
	@endif


	@if(Auth::Admin())
	<li class="nav-item <?php if ($active == 'user') {
		echo 'active';
	} ?>"><a href="{{url('/user')}}" class="nav-link"><i class="fal fa-user"></i> Usuarios</a></li>

	<li class="nav-item <?php if ($active == 'bills') {
		echo 'active';
	} ?>"><a href="{{url('/bills')}}" class="nav-link"><i class="fal  fa-chart-bar"></i> Finanzas</a></li>


	<li class="nav-item <?php if ($active == 'options') {
		echo 'active';
	} ?>"><a href="{{url('/options')}}" class="nav-link"><i class="fal fa-cogs"></i> Opciones</a></li>
	@endif


</ul>
</div>
</nav>



<section class="main-admin main-admin-open">
	<nav class="navbar navbar-default navbar-expand-lg br-0 mb-0 z-50" role="navigation-demo">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-translate">
			<button class="btn btn-link btn-round btn-fab button-dashboard-open" id="button-dashboard">
				<i class="fas fa-chevron-right"></i>
			</button>


			<button class="navbar-toggler button-menu-disabled" id="button-menu" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>


		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto p-0">

				<li class="nav-item  nav-item-button  search-engine">

					@livewire('search-engine')
					@livewire('search-list')

				</li>

		 
				<li class="nav-item nav-item-button dropdown " id="plugin-notification">
  					<a class="nav-link   overflow-y-auto" id="navbarDropdownMenuLink" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
						Notificaciones <i class="not-notification fal fa-bell"></i>

						@livewire('notifications-count')


					</a>
										@livewire('notifications-dropdown')


				</li>


				<li class="nav-item nav-item-button">
					<a class="nav-link" href="{{Auth::user()->ProfileUrl}}">

						{{Auth::user()->name}}
					</a>
				</li>

				<li class="nav-item dropdown dropdown-perfil">
					<a id="navbarDropdown" class="nav-link no-wait dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<div class="profile-photo-small rounded-circle">
							<img src="{{ asset(Auth::user()->Profileimg)}}" alt="Circle Image" class="img-height">
						</div>
					</a>


					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{url(Auth::user()->ProfileUrl)}}">

							<i class="fal icon fa-user"></i> {{__('Mi cuenta') }}

						</a>


						<a class="dropdown-item" href="{{ route('logout') }}" onclick="esperar(); event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="fal icon fa-sign-out-alt"></i> {{__('Cerrar sesión') }}

					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>

				</div>
			</li>


		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>

@include('includes.messages')
@yield('content')



</section>

</div>
</main>

@endsection