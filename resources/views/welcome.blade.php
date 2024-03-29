@extends('layouts.web')




@section('content')

@include('includes.messages')
<div class="cabecera-inicio" style="background-image: url({{asset('splash/img/hospital.jpg')}});">

	<div class="contenedor-titulo">

	</div>
		<section class="container h-100">

			<div class="row h-100 align-items-center justify-content-center">
				<div class="col-10">

					<h1 class="display-4 text-capitalize  d-none d-md-block text-center">Bienvenido a <img src="{{asset('splash/img/logowhite.png')}}"></h1>

				</div>
			</div>



		</section>

</div>

<section class="container-fluid d-block d-md-none bg-primary">
	<div class="row">
		<div class="col p-3">
			<h1 class="h2 text-capitalize text-light  text-center">Bienvenido a <img src="{{asset('splash/img/logowhite.png')}}" class="w-50"></h1>
		</div>
	</div>
</section>



<div class="container iconos-caracteristicas m-50 mb-5">
	<div class="row text-center justify-content-between ">
		<div class=" col-12 mt-5 mt-md-0 col-md-4 ">

			<div class="modulo align-items-center">

				<i class="fal fa-phone-laptop"></i>


				<h3 class="">Moderno</h3>
				<p class=" mb-0">Podrás administrar tus consultorios de la manera más eficaz posible.</p>
			</div>
		</div>
		<div class=" col-12 mt-5 mt-md-0 col-sm-6 col-md-4">

			<div class="modulo">
				<i class="fal fa-clipboard-list-check"></i>

				<h3 class="">Completo</h3>
				<p class=" mb-0">Todas las funciones que necesitas en una sola aplicación.</p>
			</div>
		</div>
		<div class=" col-12 mt-5 mt-md-0 col-sm-6 col-md-4">
			<div class="modulo">
				<i class="fal fa-tachometer-fast"></i>
				<h3 class="">Rápido</h3>
				<p class=" mb-0">Agiliza el trabajo dentro de tu hospital con este gran sistema.</p>
			</div>
		</div>
	</div>
</div>


<section class="container-fluid my-5 py-3 bg-primary ">
	<div class="row">
		<div class="col">

			<h1 class="text-center h1 text-capitalize text-light"><i class="fas fa-user-cog"></i> Servicios</h1>
		</div>
	</div>
</section>


<div class="container-fluid  iconos-caracteristicas iconos-caracteristicas2 text-justify">
	<div class="row p-5 my-5 text-center text-sm-left">
		<div class="col-12 col-sm-6 col-md-3">
			<div class="p-3 mb-5">
				<i class="fas fa-hospital"></i>
				<h3>Consultorios</h3>
				<p class="">Podras administrar tus medicos y sus pacientes, asi como mantener comunicacion con el personal </p>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3">
			<div class="p-3 mb-5">
				<i class="fas fa-user-md"></i>
				<h3>Medicos</h3>
				<p class="">Crea citas, administra tus pacientes, chatea con tus colegas</p>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3">
			<div class="p-3 mb-5">
				<i class="fas fa-user-injured"></i>
				<h3>Pacientes</h3>
				<p class="">Crea una cita con tu medico, chatbot de soporte, paga online o en fisico</p>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-md-3">
			<div class="p-3 mb-5">
				<i class="fas fa-book"></i>
				<h3>Citas</h3>
				<p class="">Crea tu cita en un listado dinamico, obten recetas y paga de manera online</p>
			</div>
		</div>
	</div>
</div>

<div class="cabecera" style="min-height: 250px; background-image: url({{asset('splash/img/doctor2.jpg')}});">
	<div class="contenedor-titulo">

	</div>
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center justify-content-md-start">
				<div class="col-12 col-md-6 p-5 lead ">
					<h3 class="display-4   text-left text-capitalize"> Registrate Ahora</h3>
					<p class="text-justify">Si eres paciente rergistrate ahora para ponerte en contacto con tus medicos</p>
					<a class="btn btn-primary-alt d-none d-md-inline" href="/register">Registro</a>
					<a class="btn btn-primary-alt btn-block d-block d-md-none  " href="/register">Registro</a>

				</div>
			</div>
		</div>

</div>





<div class="container-fluid p-0">
	<div class="row align-items-center bg-primary">
		<div class="col-12 h-100  col-md-6 col-foto" style="background-image: url({{asset('splash/img/celular.jpg')}});">
		</div>

		<div class="col-12 col-md-6   align-items-center">
			<div class="row ">
				<div class="col p-5 lead  text-light">


					<h3 class="display-4 text-left text-capitalize"> Diseño Responsivo</h3>
					<p class="text-justify">Tus pacientes podrán consultar sus citas desde su celular</p>

				</div>
			</div>
		</div>
	</div>
</div>



<div class="container-fluid contenedor-foto p-0">
	<div class="row align-items-center bg-primary">



		<div class="col-12 col-md-6 align-items-center">
			<div class="row ">
				<div class="col p-5 lead  text-light">


					<h3 class="display-4 text-md-right text-left text-capitalize"> Accesible</h3>
					<p class="text-justify text-md-right">Una manera mas facil de mantener organizado tu flujo de trabajo</p>

				</div>
			</div>
		</div>
		<div class="col-12 h-100  col-md-6 col-foto col-foto-cambiar" style="background-image: url({{asset('splash/img/doctor3.jpg')}});">
		</div>
	</div>

</div>


@include('includes.contact')




@endsection