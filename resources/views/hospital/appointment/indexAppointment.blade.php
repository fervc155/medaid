@extends ('layouts.nav')

@section('content')

<div class="contenedor">
		
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

						<h1 class="display-4 text-capitalize  text-center">Citas</h1> 
					
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


<!-- Se muestran los datos de la entidad en una tabla, utilizando formato Blade de PHP para acceder
	a cada atributo fácilmente -->

<div class="container my-5">
	<div class="row justify-content-end">
		<div class="col-12 col-md-4">
			
		<div class="form-group" align="center">
			<a href="/appointment/create" role="button" class="btn btn-secondary btn-block"><i class="fas fa-book"></i> Agendar</a>
		</div>
		</div>
	</div>
</div>


<div class="container">


	<div class="row">
		<div class="col-12 table-responsive d-none d-md-block">
			

			<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
			@if(count($appointments) > 0)
			<table class="table " id="data_table">
				<thead>
					<tr>
						<th >Fecha</th>
						<th >Hora</th>
						<th >Costo</th>
						<th >Razón</th>
						<th >Médico</th>
						<th >Paciente</th>
						<th >Consultorio</th>
						<th >¿Completada?</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($appointments as $a)
						<tr>
							<td><a class="link" href="/appointment/{{$a->id}}">{{ $a->date }}</a></td>
							<td>{{ $a->time }}</td>
							<td>${{ $a->cost }} MXN</td>
							<td>{{ $a->description }}</td>
							<td><a class="link" href="/doctor/{{$a->doctor->id}}">{{ $a->doctor->name }} </a></td>
							<td><a class="link" href="/patient/{{$a->patient->dni}}">{{ $a->patient->name }} </a></td>
							<td><a class="link" href="/office/{{$a->office->id}}">{{ $a->office->name }} </a></td>
							<td>
								@if ($a->completed == true)
									Sí
								@else
									No
								@endif
							</td>
						</tr>
					@endforeach
					
				</tbody>
			</table>

			<!-- Si no hay registros, el usuario será informado -->
			@else
				<p class="lead">No se encontraron citas. <a class="link" href="/appointment/create">¡Agenda una!</a></p>
			@endif


		</div>
		<div class="col-12 d-block d-md-none">
		@if (count($appointments)>0)
			@foreach($appointments as $appointment)
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
					@endforeach
				@endif
		</div>

	</div>
</div>

@endsection

@include('includes.dataTables')