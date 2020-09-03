@extends('layouts.nav-admin')

@section('content')




<div class="container mb-5 appointmentAjax">
	<div class="row justify-content-center">

		<div class="col-12 ">
			<div class="card">

				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-calendar-check"></i>
					</div>
					<div class="card-title">Datos de la cita</div>
				</div>


				<div class="card-body">

					{!! Form::open(['action' => 'AppointmentController@store', 'method' => 'POST']) !!}
					<input type="hidden" name="_token" value="{{ csrf_token()}}">


					<input type="hidden" name="url" value="{{url('/api/appointment/gettime')}}">


					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-quote-left"></i>
						</div>

						<div class="form-group">

							<label class="bmd-label-floating">Descripcion</label>

							{{Form::text('description', '', ['class'=>'form-control'] )}}
						</div>
					</div>





					@if(Auth::isPatient())

					<input type="hidden" name="patient_dni" id="patient_dni" value="{{Auth::UserId()}}">


					@endif



					@if(Auth::Doctor())



					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-user-injured"></i>
						</div>


						<div class="form-group">

							<select class="select2" name="patient_dni" id="patient_dni" data-style="select-with-transition" title="Selecciona un paciente" data-size="sd7">

								<option>Selecciona un paciente</option>
								<optgroup label="O prueba buscando su nombre">

									<?php foreach ($patients as $patient) : ?>

										<option value="{{ $patient->dni}}">{{ $patient->name }}</option>

									<?php endforeach ?>
							</select>
							</optgroup>


						</div>
					</div>

					@endif


					@if(empty($_doctor))
					<div class="form-group form-inline align-items-end ">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>



						<div class="form-group ">

							<select class="select2 select-office ajax" data-style="select-with-transition" title="Selecciona una clinica" data-size="sd7">
								<option>Selecciona una clinica</option>

								@foreach($offices as $office)

								<option value="{{ $office->id}}">{{ $office->name }} </option>

								@endforeach
							</select>

						</div>
					</div>

					<div class="form-group form-inline align-items-end ">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>



						<div class="form-group ">

							<select name="speciality_id" class="select2 select-speciality ajax btn-AgregarPrecioCita" data-style="select-with-transition" title="Selecciona una clinica" data-size="sd7">
								<option>Selecciona una especialidad</option>
							</select>

						</div>
					</div>









					<div class="form-group form-inline align-items-end ">
						<div class="icon-form">
							<i class="fal fa-user-md"></i>
						</div>


						<div class="form-group ">

							<select class="select2" name="doctor_id" data-style="select-with-transition" title="Selecciona un doctor" data-size="sd7">
								<option>Selecciona un medico</option>



							</select>


						</div>


					</div>

					@else


					<select class="d-none" name="doctor_id">
						<option value="{{$_doctor->id}}"></option>



					</select>


					<div class="form-group form-inline align-items-end ">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>



						<div class="form-group ">

							<select name="speciality_id" class="select2 select-speciality " data-style="select-with-transition" title="Selecciona una clinica" data-size="sd7">
								<option>Selecciona una especialidad</option>

								<?php foreach ($_doctor->specialities as $speciality) : ?>

									<option value="{{$speciality->id}}" <?php if (!empty($_speciality_id)) {
																			if ($_speciality_id == $speciality->id) {
																				echo "selected";
																			}
																		} ?>>{{$speciality->name}} - {{$speciality->price}}</option>
								<?php endforeach ?>
							</select>

						</div>
					</div>
					@endif

					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-calendar-week"></i>
						</div>

						<div class="form-group">

							<label class="bmd-label-floating">Fecha</label>

							{{Form::date('date', '', ['class'=>'form-control datepicker'] )}}

						</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>

						<div class="form-group groupTimepickerCita">


							<label class="bmd-label-floating">Hora</label>

							{{Form::time('time', '', ['class'=>'form-control timepickerCita','readonly'=>'true'] )}}
						</div>
					</div>

					<div class="my-3">
						<button type="submit" class="btn btn-primary btn-block"><i class="fal fa-plus"> Agregar</i></button>
					</div>
				</div>

			</div>
		</div>
	</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection