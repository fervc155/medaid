@extends('layouts.nav')

@section('content')


<div class="contenedor">
		
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

						<h1 class="display-4 text-capitalize  text-center">Informacion de la cita</h1> 
					
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

						<img src="{{asset('splash/header/citas.jpg')}}"> 
					
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
		      aria-selected="true"><i class="fas fa-book"></i> Informacion</a>
		  </li>
		
		</ul>
	</div>
</div>



<div class="tab-content container  pt-5 mb-5" id="TabContenido">
  <div class="tab-pane row justify-content-center fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

		<div class="col-12 tarjeta">
			<div class="row tarjeta-titulo">
					
				<div class="col ">
						
					<h5 class="text-center text-capitalize"><i class="fas fa-book"></i> Datos de la cita</h5>
				</div>
			</div>
			<div class="row tarjeta-contenido-blanco p-3">
					<table class="table">
						<tbody>
							<tr><th><i class="fas fa-id-card"></i> ID:</th> <td>{{ $appointment->id }}</td></tr>

							<tr><th><i class="fas fa-calendar-week"></i> Fecha</th> <td> {{ $appointment->date }}</td></tr>

							<tr><th><i class="fas fa-clock"></i> Hora</th> <td> {{ $appointment->time }}</td></tr>

							<tr><th><i class="fas fa-money-bill-wave"></i>Costo</th> <td> {{ $appointment->cost }}</td></tr>

							<tr><th><i class="fas fa-tag"></i> Descripcion</th> <td> {{ $appointment->description }}</td></tr>

							<tr><th><i class="fas fa-user-md"></i> Medico</th> <td><a class="link" href="/doctor/{{$appointment->doctor_id}}"> {{ $appointment->doctor_id }}</a></td></tr>

							<tr><th><i class="fas fa-user-injured"></i> Paciente</th> <td><a class="link" href="/patient/{{$appointment->patient_dni}}"> {{ $appointment->patient_dni }} </a></td></tr>

							<tr><th><i class="fas fa-hospital"></i> Consultorio</th> <td><a class="link" href="/office/{{$appointment->officee_id}}"> {{ $appointment->office_id }}</a></td></tr>

							<tr><th><i class="fas fa-quote-left"></i> Comentarios</th> <td> {{ $appointment->comments }}</td></tr>

							@if($appointment->completed ==1)
							<tr><th><i class="fas fa-check"></i> Completada</th> <td> Si</td></tr>
							@else
							<tr><th><i class="fas fa-times"></i> Completada</th> <td> No</td></tr>

							@endif
						</tbody>
					</table>
	
			</div>
			<div class="row tarjeta-contenido-blanco align-items-center ">

				<div class="col-12 col-md-4 my-3">
					<a role="button" class="btn btn-block btn-info" href="/appointment/{{$appointment->id}}/edit"><i class="fas fa-pen"></i> Editar</a>
				</div>
			
				<div class="col-12 col-sm-6 col-md-4 my-3">
					{!! Form::open(['action' => ['AppointmentController@destroy', $appointment->id], 'method' => 'POST']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar', ['class' => 'btn btn-block btn-danger']) }}
					{!! Form::close() !!}
				</div>

				<div class="col-12 col-sm-6 col-md-4 my-3">
					{!! Form::open(['action' => ['AppointmentController@complete', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Atender', ['class' => 'btn btn-block btn-secondary']) }}
					{!! Form::close() !!}
				</div>
			</div>

		</div>
	
	


  </div>
  
</div>


@endsection