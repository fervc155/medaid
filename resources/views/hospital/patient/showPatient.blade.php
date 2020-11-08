@extends('layouts.nav-admin')

@section('content')



<div class="container mt-5">

	@include('includes.block', ['model'=>$patient])

	

	<div class="row">
		<div class=" col-12 col-md-4">




			<div class="card card-profile">




				<img src="{{$patient->user()->ProfileImg}}" class="img-fluid">


				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"><i class="fal fa-user-injured"></i> {{$patient->user()->name}}</h5>

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

						{{ $patient->user()->telephone  }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-birthday-cake"></i> Nacimiento:
						</div>
						{{ $patient->user()->birthdate }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-venus-mars"></i> Sexo:
						</div>
						{{ $patient->user()->sex }}

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



						{{ $patient ->postalCode }}


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



						<a href="{{url('/doctor/'.$patient->doctor->id)}}" class="link">{{ $patient->doctor->name }}</a>


					</div>
					@if(Auth::Office() || (Auth::isPatient() && Auth::user()->profile()->id == $patient->dni ))



					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/patient/'.$patient->dni.'/edit')}}"> <i class="fal fa-pen"></i> Editar</a>

					@if(Auth::Office() )



					<a role="button" class="btn btn-round btn-danger text-light mt-3 btn-confirm-delete" id="patient-{{$patient->dni}}"> <i class="fal fa-trash"></i> Eliminar</a>




					{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete','id'=>'patient-'.$patient->dni]) }}
					{!! Form::close() !!}


					@endif
					@endif

				</div>

			</div>

		</div>

		<div class="col-md-8 ">
			<div class="row">
				<div class="col-12">



					@include('hospital.includes.counter.appointments')
				</div>
			</div>


			<div class="row mt-3">

				<div class="col p-3">


					@include('includes.calendar', [
					'user_id'=>$patient->user()->id,
					'route'=>url('/get/appointments/patient')

					])


				</div>

			</div>




		</div>



	</div>
</div>

@if(count($appointments) < 1) <div class="container p-5 sin-datos">
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