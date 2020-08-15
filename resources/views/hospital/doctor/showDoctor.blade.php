@extends('layouts.nav-admin')

@section('content')




<div class="container mt-5">

	<div class="row">
		@include('hospital.includes.card-profile-doctor')


		<div class=" col-md-6 col-lg-8">
			<div class="row">
				<div class="col-12 col-lg-6">
					@include('hospital.includes.counter.appointments')


				</div>
				<div class="col-12 col-lg-6">
					@include('hospital.includes.counter.model',
					[
					'model'=>$patients,
					'title'=>'Pacientes',
					'icon'=>'fa-user-injured'

					])

				</div>
			</div>

			<div class="row">
				



				<div class="col p-3  ">
						@include('includes.calendar', [
							'model_id'=>$doctor->id,
							'route'=>url('/get/appointments/doctor')

						])
					 

				</div>
			</div>
		</div>

	</div>
</div>  


@if((auth::isDoctor() && Auth::UserId()== $doctor->id) || auth::Office())

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

@include('hospital.includes.tableAppointment')

@endif


<!-- PACIENTES -->


@if(Auth::Office())

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
@include('hospital.includes.tablePatient')

@endif

@endif


@endif
@endsection
@include('includes.dataTables')
