@extends('layouts.nav-admin')

@section('content')




<div class="container mt-5">

	<div class="row">
		<div class="col-md-4">

			<div class="card card-profile pt-0">
				<img src="{{asset($doctor->Profileimg)}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$doctor->name}}</h5>

				<div class="card-body">

					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-address-card"></i> ID:
						</div>  

						{{ $doctor->id }}

					</div>
					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-phone"></i> Telefono:
						</div>  

						{{ $doctor->telephoneNumber }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-sun"></i> Turno:
						</div>

						{{ $doctor->turno }}

					</div>
					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-birthday-cake"></i> Nacimiento:
						</div>                                  
						{{ $doctor->birthdate }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-venus-mars"></i> Sexo:
						</div>
						{{ $doctor->sexo }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-address-card"></i> Celuda: 
						</div>



						{{ $doctor->cedula }}


					</div>


					<div class="form-inline mb-3">
						<div class="color-principal">
							<i class="fal fa-user-tie"></i> Especialidad:
						</div>



						{{ $doctor->speciality->name }}


					</div>  
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>


					<button class="btn btn-danger btn-round btn-confirm-delete" id='doctor-{{$doctor->id}}' > <i class="fal fa-trash"></i> Eliminar</button>

					{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$doctor->id]) }}
					{!! Form::close() !!}

				</div>

			</div>
		</div>

		<div class="col-md-8">
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
						<span class="caja-contador-icono">

							<i class="fal fa-book"></i>
						</span>
						<div class="card-body">


							<h3>{{$i}}</h3>
							<p>Citas</p>  
						</div>
					</div>

				</div>
				<div class="col-12 col-md-6">
					<div class="card caja-contador ">

						<div class="caja-contador-icono">

							<i class="fal fa-user-injured"></i>
						</div>
						<div class="card-body">


							<h3>{{count($patients)}}</h3>
							<p>Pacientes</p>
						</div>
					</div>
				</div>
			</div>



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

<!-- CITAS -->


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
					<table class="table " id="data_table_citas">
						<thead>
							<tr>
								<th >Fecha</th>
								<th >Hora</th>
								<th >Costo</th>
								<th >Razón</th>
								<th >Paciente</th>
								<th >¿Completada?</th>
								<th>Acciones</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($appointments as $a)
							<tr>
								<td>{{ $a->date }}</td>
								<td>{{ $a->time }}</td>
								<td>{{ $a->price }}</td>
								<td>{{ $a->description }}</td>
								<td><a class="link" href="{{url('/patient/'.$a->patient->dni)}}">{{ $a->patient->name }} </a></td>
								<td>
									@if ($a->completed == true)
									Sí
									@else
									No
									@endif
								</td>
								<td><a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>
									<a href="{{url('/appointment/'.$a->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>



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
					<div class="card-title">{{ $appointment->patient->name}}</div>
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

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-money-bill-wave"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Costo: </span>$ {{ $appointment->price }}
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
						<a href="{{url('/appointment/'.$a->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

					</div>  
				</div>

			</div>

			@endforeach

		</div>

	</div>

</div>
@endif




<!-- PACIENTES -->



@if(count($patients) < 1)

<div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-user-injured"></i>
			<p class="lead ">No se encontraron pacientes. <a href="{{ url('/patient/create')}}">¡Agrega uno!</a></p>
		</div>
	</div>
</div>



@else
<div class="container">

	<div class="row">
		<div class="col-12 d-none d-md-block">
			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-list"></i>
					</div>
					<div class="card-title">Listado de pacientes</div>
				</div>

				<div class="card-body table-responsives">




					<table class="table" id="data_table_pacientes">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>CURP</th>
								<th>Teléfono</th>
								<th>Sexo</th>
								<th>Domicilio</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($patients as $p)
							<tr>
								<td>{{ $p->name }}</td>
								<td>{{ $p->curp }}</td>
								<td>{{ $p->telephoneNumber }}</td>
								<td>{{ $p->sex }}</td>
								<td>{{ $p->address }}</td>
								<td><a href="{{url('/patient/'.$p->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>



								</td>

							</tr>
							@endforeach

						</tbody>
					</table>

				</div>
			</div>

		</div>


		<div class="col-12 d-block d-md-none">





			@foreach ($patients as $patient)
			<div class="card   my-5">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-user-injured"></i>
					</div>
					<div class="card-title">{{$patient->name}}</div>
				</div>

				<div class="card-body">



					<div class="form-inline mb-2">


						<div class="icon-form">

							<i class="fal fa-id-card"></i> 
						</div>  
						<div class="icon-texto">
							<span class="color-principal">CURP </span> {{ $patient->curp }}
						</div>
					</div>



					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-phone"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Telefono </span> {{ $patient->telephoneNumber }}
						</div>

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-venus-mars"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Sexo </span> {{ $patient->sex }}
						</div>

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-home"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Domicilio </span> {{ $patient->address }}
						</div>

					</div>  

					<div class="text-center">
						<a href="{{url('/patient/'.$p->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

					</div>
				</div>

			</div>

			@endforeach


		</div>



	</div>
</div>

@endif
@endsection
@include('includes.dataTables')
