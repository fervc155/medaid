@extends('layouts.nav-admin')

@section('content')



<div class="container mt-5">



	<div class="row">
		<div  class=" col-12 col-md-4">




			<div class="card card-profile">



				<img src="{{asset('splash/img/user-default.jpg')}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"><i class="fal fa-user-md"></i> {{$patient->name}}</h5>

				<div class="card-body">






					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-id-card"></i> DNI: 
						</div>  

						{{ $patient->dni }}

					</div>

					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-id-card"></i> CURP:
						</div>

						{{ $patient->curp }}

					</div>
					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-phone"></i> Telefono:
						</div>  

						{{ $patient->telephoneNumber }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-birthday-cake"></i> Nacimiento:
						</div>                                  
						{{ $patient->birthdate }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-venus-mars"></i> Sexo:
						</div>
						{{ $patient->sex }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-home"></i> Domicilio: 
						</div>



						{{ $patient->address }}


					</div>

					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-envelope"></i> CP: 
						</div>



						{{ $patient->cp }}


					</div>

					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-city"></i> Ciudad: 
						</div>



						{{ $patient->city }}


					</div>

					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-flag"></i> Pais: 
						</div>



						{{ $patient->country }}


					</div>



					<div class="form-inline mb-3">
						<div class="color-principal">
							<i class="fal fa-user-tie"></i> Doctor:
						</div>



						<a href="/doctor/{{$patient->doctor->id}}" class="link">{{ $patient->doctor->name }}</a>


					</div>  
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="/patient/{{$patient->dni}}/edit"> <i class="fal fa-pen"></i> Editar</a>

					<a role="button" class="btn btn-round btn-danger text-light mt-3 " onclick="btn_confirm_delete()"> <i class="fal fa-trash"></i> Eliminar</a>


					{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete']) }}
					{!! Form::close() !!}

				</div>

			</div>

		</div>

		<div class="col-md-8 ">
			<div class="row">
				<div class="col-12 col-md-6">


					<div class="card caja-contador">

						<?php $i=0; 

						foreach ($appointments as $a)
						{
							if ($a->completed == false)
							{
								$i++;
							}
						}  

						?>
						<span class="caja-contador-icono"><i class="fal fa-book"></i></span>
						<div class="card-body">


							<h3>{{$i}}</h3>
							<p>Citas</p>  
						</div>
					</div>
				</div>
			</div>

		<div class="row mt-3">
			<div class="col d-none">
				@foreach ($appointments as $a)
				@if ($a->completed == false)

				<span class="citas-fecha">{{ $a->date }}</span>

				<span class="citas-hora">{{ $a->time }}</span>
				<span class="citas-descripcion">{{ $a->description }}</span>
				<span class="citas-paciente">{{ $a->patient->name }}</span>
				@endif
				@endforeach

			</div>
			<div class="col p-3 ">
				<div id='calendar'></div>

			</div>

		</div>





		</div>



	</div>
</div>


@if(count($appointments) < 1)
<div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-calendar-check"></i>
			<p class="lead ">No se encontraron citas. <a href="{{ url('/appointment/create')}}">¡Agrega una!</a></p>
		</div>
	</div>
</div>


@else


<div class="container">


	<div class="row">
		<div class="col-12  d-none d-md-block">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-book"></i>
					</div>
					<div class="card-title">Listado de citas</div>
				</div>
				<div class="card-body">
					
					<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
					<table class="table " id="data_table">
						<thead>
							<tr>
								<th >Fecha</th>
								<th >Hora</th>
								<th >Costo</th>
								<th >Razón</th>
								<th >Médico</th>
								<th >Consultorio</th>
								<th >¿Completada?</th>
								<th>Acciones</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($appointments as $a)
							<tr>
								<td>{{ $a->date }}</td>
								<td>{{ $a->time }}</td>
								<td>${{ $a->cost }} MXN</td>
								<td>{{ $a->description }}</td>
								<td><a class="link" href="{{url('/doctor/'.$a->doctor->id)}}">{{ $a->doctor->name }} </a></td>
								<td><a class="link" href="{{url('/office/'.$a->office->id)}}">{{ $a->office->name }} </a></td>
								<td>
									@if ($a->completed == true)
									Sí
									@else
									No
									@endif
								</td>
								<td><a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>

									

								</td>
							</tr>
							@endforeach

						</tbody>
					</table>

					<!-- Si no hay registros, el usuario será informado -->
					

				</div>
			</div>
		</div>
		<div class="col-12 d-block d-md-none">
			@foreach ($appointments as $appointment)
			<div class="card  my-5">

				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">
						<i class="fal fa-calendar-check"></i>
					</div>
					<div class="card-title">{{ $appointment->date}}</div>
				</div>
				<div class="card-body">



					<div class="form-inline mb-2">


						<div class="icon-form">

							<i class="fal fa-calendar-week"></i> 
						</div>  
						<div class="icon-texto">
							<span class="color-principal">Fecha: </span> {{ $appointment->date }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Hora: </span> {{ $appointment->time }}
						</div>

					</p>    </div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-money-bill-wave"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Costo: </span>$ {{ $appointment->cost }}
						</div>

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-user-md"></i>
						</div>

						<div class="icon-texto">

							<a href="/doctor/{{$appointment->doctor->id}}" class="link"><span class="color-principal">Doctor: </span> {{ $appointment->doctor->name }}</a>
						</div>

					</div>


					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>

						<div class="icon-texto">

							<a href="/office/{{$appointment->office->id}}" class="link"><span class="color-principal">Consultorio: </span> {{ $appointment->office->name }}</a>
						</div>

					</div>

					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fal fa-question"></i>
							
						</div>
						<div class="icon-texto">
							<span class="color-principal">Completada:</span>  @if ($a->completed == true)
							Sí
							@else
							No
							@endif
							
						</div>
					</div>

					<div class="text-center">
						
						<a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>
					
					</div>  
				</div>

			</div>

			@endforeach

		</div>

	</div>

</div>
</div>
</div>
@endif


@endsection