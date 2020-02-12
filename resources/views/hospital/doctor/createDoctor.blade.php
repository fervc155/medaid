@extends('layouts.nav-admin')

@section('content')



<div class="container">
	<div class="row">
		<div class="col-12 col-md-6">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-sign-in"></i>
					</div>
					<div class="card-title">Login</div>
				</div>

				<div class="card-body">
					<form class="formulario" method="POST"  action="{{ route('login') }}" >
						@csrf

						<div class="form-group form-inline align-items-end">
							<div class="icon-form">
								<i class="fas fa-at"></i>
							</div>
							<div class="form-group">
								<label class="bmd-label-floating"> Email</label>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
							</div>
						</div>

						<div class="form-group form-inline align-items-end">
							<div class="icon-form">
								<i class="fas fa-key"></i>
							</div>
							<div class="form-group">
								<label class="bmd-label-floating"> Password</label>
								<input id="password" type="password" class="form-control-claro form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
							</div>
						</div>


					</form>
				</div>




			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card card-profile">
				<div class="card-body">

					<div class="fileinput fileinput-new text-center" data-provides="fileinput">
						<div class="fileinput-new thumbnail img-circle img-raised " style="height: 100px;width: 100px; overflow: hidden;">
							<img src="{{asset('splash/img/'.$defaultImg)}}" class="img-height" >
						</div>
						<div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
						<div>
							<span class="btn btn-raised btn-round btn-primary btn-file">
								<span class="fileinput-new">Agregar foto</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="..." />
							</span>
							<br />
							<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="container mb-5">
	<div class="row justify-content-center">

		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">
					
					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-user-md"></i>
					</div>
					<div class="card-title">Datos del médico</div>
				</div>

				<div class="card-body">

					{!! Form::open(['action' => 'DoctorController@store', 'method' => 'POST']) !!}

					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-user"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Nombre</label>

							{{Form::text('name', '', ['class'=>'form-control'])}}
						</div>
					</div>




					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-birthday-cake"></i>
						</div>
						<div class="form-group">

							{{Form::text('birthdate', '', ['class'=>'form-control datepicker2 ','placeholder'=>'Elige una fecha'] )}}

						</div>
					</div>


					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-phone"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Telefono</label>

							{{Form::text('telephoneNumber', '', ['class'=>'form-control'] )}}
						</div>
					</div>

					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-address-card"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Cedula</label>
							{{Form::text('cedula', '', ['class'=>'form-control'] )}}

						</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-user-tie"></i>
						</div>
						<div class="form-group">
							
							<select class="selectpicker" name="especialidad[]" id="especialidad" data-style="select-with-transition" title="Selecciona una especialidad" data-size="sd7">

								<?php foreach ($specialities as $speciality ): ?>

									<option value="{{ $speciality->id}}">{{ $speciality->name }}</option>

								<?php endforeach ?>
							</select>


						</div>

					</div>

					<div>

						<div class="d-flex">



							<div class="form-group form-inline ">
								<div class="icon-form">
									<i class="fal fa-sun"></i>
								</div>

								<div class="form-group">


									<select class="selectpicker" name="turno" id="turno" data-style="select-with-transition" title="Seleccionar turno" data-size="sd7">
										<option value="Vespertino">Vespertino</option>
										<option value="Matutino">matutino</option>
									</select>
								</div>
							</div>

							<div class="form-group form-inline ">
								<div class="icon-form">
									<i class="fal fa-venus-mars"></i>
								</div>

								<div class="form-group">


									<select class="selectpicker" name="sexo" id="sexo" data-style="select-with-transition" title="Seleccionar sexo" data-size="sd7">
										<option value="M">Masculino</option>
										<option value="F">Femenino</option>
									</select>
								</div>
							</div>
						</div>


					</div>


					@if(count($offices)>0)
					<div class="card-encabezado mt-5">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-user-md"></i>
						</div>
						<div class="card-title">Consultorio </div>
					</div>




					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>

						<div class="form-group">
							
							<select class="select2" name="office_id" id="office_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

								<?php foreach ($offices as $office ): ?>

									<option value="{{ $office->id}}">{{ $office->name }}</option>

								<?php endforeach ?>
							</select>


						</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>


						<div class="form-group">

							{{Form::time('inTime', '', ['class'=>'form-control timepicker timepickerEntrada','placeholder' => 'Hora de Entrada'] )}}

						</div>
					</div>

					<div class="form-group form-inline align-items-end formtimepickerSalida d-none">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>

						<div class="form-group">
							
							{{Form::time('outTime', '', ['class'=>'form-control timepicker timepickerSalida','placeholder' => 'Hora de salida'] )}}

						</div>
					</div>

					@endif



					<div class="my-5 text-right text-md-center">

						<button type="submit" class="btn btn-primary "><i class="fal fa-plus"> Agregar</i></button>
					</div>
					{!! Form::close() !!}


					
				</div>




			</div>

		</div>       

	</div> <!-- Fila -->
</div> <!-- Contenedor -->


@endsection
