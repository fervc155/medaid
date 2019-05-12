@extends('layouts.app')

@section('content')

<div class="contenedor">
		
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

						<h1 class="display-4 text-capitalize  text-center">{{ $patient->name }}</h1> 
						<h3 class="text-center text-capitalize">Paciente</h3>
					
				</div>
			</div>



		</section>
	</div>

	<div class="contenedor-fondo">
		
	</div>

	<div class="contenedor-imagen">
		
		<div class="container-fluid mt-0  p-0">

			<div class="row ">
				<div class="col ">

						<img src="{{asset('splash/header/paciente.jpg')}}"> 
					
				</div>
			</div>



		</div>
	</div>

</div>


<div class="container-fluid tabmenu pl-5 ">
	<div class="row justify-content-center">
		
	
		<ul class="nav  md-tabs" id="Tabmenu" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
		      aria-selected="true"><i class="fas fa-user-md"></i> Mis Datos</a>
		  </li>
		
		  <li class="nav-item">
		    <a class="nav-link" id="citas-tab" data-toggle="tab" href="#citas" role="tab" aria-controls="citas"
		      aria-selected="false"><i class="fas fa-book"></i> Citas</a>
		  </li>
		</ul>
	</div>
</div>



<div class="tab-content container  pt-5 mb-5" id="TabContenido">
  <div class="tab-pane row justify-content-center fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

		<div class="col-12 tarjeta">
			<div class="row tarjeta-titulo">
					
				<div class="col ">
						
					<h5 class="text-center text-capitalize"><i class="fas fa-user-injured"></i> Datos del paciente</h5>
				</div>
			</div>
			<div class="row tarjeta-contenido-blanco p-3">
				
				<table class="table">
						<tbody>
							<tr><th><i class="fas fa-id-card"></i> DNI</th> <td>{{ $patient->dni }}</td></tr>

							<tr><th><i class="fas fa-id-card"></i> CURP</th> <td>{{ $patient->curp }}</td></tr>

							<tr><th><i class="fas fa-birthday-cake"></i> Fecha de nacimiento:</th> <td> {{ $patient->birthdate }}</td></tr>
							<tr><th><i class="fas fa-phone"></i> Teléfono</th> <td> {{ $patient->telephoneNumber }}</td></tr>

						
							<tr><th><i class="fas fa-venus-mars"></i> Sexo</th> <td> {{ $patient->sex }}</td></tr>

							<tr><th><i class="fas fa-address-card"></i> Domicilio</th> <td> {{ $patient->address }}</td></tr>

							<tr><th><i class="fas fa-envelope"></i> CP</th> <td> {{ $patient->postalCode }}</td></tr>

							<tr><th><i class="fas fa-city"></i> Ciudad</th> <td> {{ $patient->city }}</td></tr>

							<tr><th><i class="fas fa-flag"></i> Pais</th> <td> {{ $patient->country }}</td></tr>

							<tr><th><i class="fas fa-flag"></i> Medico</th> <td><a href="/doctor/{{$doctor->id}}"> {{ $doctor->name }}</a></td></tr>

						</tbody>
					</table>
						
			
			</div>
			<div class="row tarjeta-contenido-blanco align-items-center py-3 ">

			
				<div class="col-12 col-md-6">
					<a role="button" class="btn btn-block btn-primary" href="/patient/{{$patient->dni}}/edit"><i class="fas fa-pen"></i> Editar</a>
					
				</div>
	
				<div class="col-12 col-md-6">
					{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'btn btn-block btn-danger']) }}
					{!! Form::close() !!}
				</div>
			</div>

		</div>
	
	


  </div>



  <div class="tab-pane fade row justify-content-center" id="citas" role="tabpanel" aria-labelledby="citas-tab">
		
	<div class="col-12 tarjeta">
		
		<div class="row tarjeta-titulo">
			<div class="col-12">
				<h5 class="text-center text-capitalize"><i class="fas fa-book"></i> Citas pendientes</h5>
			</div>
		</div>
		<div class="row tarjeta-contenido-blanco">
			<div class="col-12 p-0 ">
				<table class="table ">
				<thead>
					<tr>
						<th >Fecha</th>
						<th >Hora</th>
						<th >Costo</th>
						<th >Razón</th>
						<th >Consultorio</th>
						<th >Atender</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($appointments as $a)
					@if ($a->completed == false)
					<tr>
						<td><a href="/appointment/{{$a->id}}">{{ $a->date }} </a></td>
						<td>{{ $a->time }}</td>
						<td>{{ $a->cost }}</td>
						<td>{{ $a->description }}</td>
						<td>{{ $a->office->name }}</td>
						<td>
							{!! Form::open(['action' => ['AppointmentController@complete', $a->id], 'method' => 'PATCH']) !!}
							{{ Form::hidden('_method', 'PATCH') }}
							{{ Form::submit('Atender', ['class' => 'btn btn-success']) }}
							{!! Form::close() !!}
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>

			</div> <!--Card-->
		</div> <!--Row-->

	</div> <!--Card-->




  </div>
</div>


@endsection