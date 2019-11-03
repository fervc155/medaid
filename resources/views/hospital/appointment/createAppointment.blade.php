
@extends('layouts.nav-admin')

@section('content')




<div class="container mb-5">
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

						<div class="form-group">
							

							<label class="bmd-label-floating">Hora</label>

							{{Form::time('time', '', ['class'=>'form-control timepicker timepickerCita'] )}}
						</div>
					</div>
			

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-quote-left"></i>
						</div>

						<div class="form-group">
							
							<label class="bmd-label-floating">Descripcion</label>

							{{Form::text('description', '', ['class'=>'form-control'] )}}
						</div>
					</div>


					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-user-injured"></i>
						</div>


						<div class="form-group">
							
							<select class="select2" name="patient_dni" id="patient_dni" data-style="select-with-transition" title="Selecciona un paciente" data-size="sd7">
								<optgroup label="Selecciona un paciente">

									<?php foreach ($patients as $patient ): ?>
										
										<option value="{{ $patient->dni}}">{{ $patient->name }}</option>
										
									<?php endforeach ?>
								</select>
							</optgroup>

							
						</div>
					</div>

					



					<div class="form-group form-inline align-items-end ">
						<div class="icon-form">
							<i class="fal fa-user-md"></i>
						</div>


						
						<div class="form-group "  >
							
							<select class="select2 btn-AgregarPrecioCita" name="doctor_id" data-style="select-with-transition" title="Selecciona un doctor" data-size="sd7" >
								<optgroup label="Selecciona un doctor">

									@foreach($offices as $office)
									<optgroup label="Clinica {{$office->name}}">

										<?php foreach ($office->doctors as $doctor ): ?>
											
											
											<option value="{{ $doctor->id}}" data-cost="{{$doctor->speciality->cost}}">{{ $doctor->name }} - <span class="font-weight-bold">{{$doctor->speciality->name}} - {{$doctor->speciality->price}}</span> </option>
											
										<?php endforeach ?>
									</optgroup>
									@endforeach
								</optgroup>
							</select>

							
						</div>

					</div>

							{{Form::hidden('cost', '', ['class'=>'form-control','id'=>'PrecioCita'] )}}


					<div class="my-3">
						<button type="submit" class="btn btn-primary btn-block"><i class="fal fa-plus"> Agregar</i></button>
					</div>
				</div>



			</div>
		</div>
	</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection

