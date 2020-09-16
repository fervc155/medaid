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


<<<<<<< HEAD

		</section>
	</div>
=======
  @else
  
>>>>>>> 23bcdca... Actualizado a 7

	<div class="contenedor-fondo">
		
	</div>

<<<<<<< HEAD
	<div class="contenedor-imagen">
		
		<div class="container-fluid mt-0  p-0">
=======


  @endif
>>>>>>> 23bcdca... Actualizado a 7

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
					<a href="/appointment/create" role="button" class="btn btn-wait btn-secondary btn-block"><i class="fas fa-book"></i> Agendar</a>
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


				@if(count($appointments)>0)



				@foreach ($appointments as $appointment)
				<div class="card tarjeta  my-3">

					<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-calendar"></i> {{ $appointment->patient->name}}</p>

					<div class="card-body">



						<div class="form-inline mb-2">


							<div class="icon-form">

								<i class="fas fa-calendar-week"></i> 
							</div>	
							<div class="icon-texto">
								<span class="color-principal">Fecha: </span> {{ $appointment->date }}
							</div>
						</div>

						<div class="form-inline mb-2">
							<div class="icon-form">
								<i class="fas fa-clock"></i>
							</div>

							<div class="icon-texto">

								<span class="color-principal">Hora: </span> {{ $appointment->time }}
							</div>

						</p>		</div>


						<div class="form-inline mb-2">
							<div class="icon-form">
								<i class="fas fa-money-bill-wave"></i>
							</div>

							<div class="icon-texto">

								<span class="color-principal">Costo: </span>$ {{ $appointment->cost }}
							</div>

						</div>


						<div class="form-inline mb-2">
							<div class="icon-form">
								<i class="fas fa-user-md"></i>
							</div>

							<div class="icon-texto">

								<a href="/doctor/{{$appointment->doctor->id}}" class="link"><span class="color-principal">Doctor: </span> {{ $appointment->doctor->name }}</a>
							</div>

						</div>


						<div class="form-inline mb-3">
							<div class="icon-form">
								<i class="fas fa-hospital"></i>
							</div>

							<div class="icon-texto">

								<a href="/office/{{$appointment->office->id}}" class="link"><span class="color-principal">Consultorio: </span> {{ $appointment->office->name }}</a>
							</div>

						</div>	
						<a href="/appointment/{{$appointment->id}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>
					</div>

				</div>

				@endforeach
				@endif

			</div>

		</div>
	</div>

	@endsection

	@include('includes.dataTables')