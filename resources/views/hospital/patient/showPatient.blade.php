@extends('layouts.nav-admin')

@section('content')



<div class="container mt-5">



	<div class="row">
		<div  class=" col-12 col-md-4">




			<div class="card card-profile">



				<img src="{{asset($doctor->Profileimg)}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"><i class="fal fa-user-injured"></i> {{$patient->name}}</h5>

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



						{{ $patient->postalCode }}


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
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/patient/'.$patient->dni.'/edit')}}"> <i class="fal fa-pen"></i> Editar</a>


					@if(Auth::Doctor())

					<a role="button" class="btn btn-round btn-danger text-light mt-3 btn-confirm-delete" id="patient-{{$patient->dni}}"> <i class="fal fa-trash"></i> Eliminar</a>


					{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete','id'=>'patient-'.$patient->dni]) }}
					{!! Form::close() !!}

					@endif

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

  @include('hospital.includes.tableAppointment')

@endif




@endsection
@include('includes.dataTables')

