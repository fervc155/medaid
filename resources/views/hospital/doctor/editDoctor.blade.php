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

								@if ($errors->has('email'))
								<span class="invalid-feedback text-light" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif                                
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
						<div class="fileinput-new thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;">
							<img src="{{asset($doctor->Profileimg)}}" class="img-height">
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

			{!! Form::open(['action' => ['DoctorController@update', $doctor->id], 'method' => 'PUT']) !!}


					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-user"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Nombre</label>

							{{Form::text('name', $doctor->name, ['class'=>'form-control'])}}
						</div>
					</div>




					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-birthday-cake"></i>
						</div>
						<div class="form-group">

							{{Form::text('birthdate', $doctor->birthdate, ['class'=>'form-control datepicker2 ','placeholder'=>'Elige una fecha'] )}}

						</div>
					</div>


					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-phone"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Telefono</label>

							{{Form::text('telephoneNumber', $doctor->telephoneNumber, ['class'=>'form-control'] )}}
						</div>
					</div>

					<div class="form-group form-inline align-items-end">

						<div class="icon-form">
							<i class="fal fa-address-card"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Cedula</label>
							{{Form::text('cedula', $doctor->cedula, ['class'=>'form-control'] )}}

						</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-user-tie"></i>
						</div>
						<div class="form-group">
							<label class="bmd-label-floating">Especialidad</label>

							{{Form::text('especialidad', $doctor->especialidad, ['class'=>'form-control'] )}}

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
										<option value="vespertino" <?php if($doctor->turno=='vespertino'){ echo "selected";} ?>>Vespertino</option>
										<option value="matutino"   <?php if($doctor->turno=='matutino'){ echo "selected";}?>>matutino</option>
									</select>
								</div>
							</div>

							<div class="form-group form-inline ">
								<div class="icon-form">
									<i class="fal fa-venus-mars"></i>
								</div>

								<div class="form-group">


									<select class="selectpicker" name="sexo" id="sexo" data-style="select-with-transition" title="Seleccionar sexo" data-size="sd7">
										<option value="m"  <?php if($doctor->sexo=='m'){ echo "selected";}?>>Masculino</option>
										<option value="f"  <?php if($doctor->sexo=='f'){ echo "selected";}?>>Femenino</option>
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
					<div class="card-title">Consultorio (opcional):</div>
				</div>




					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-hospital"></i>
						</div>

						<div class="form-group">
							
									<select class="selectpicker" name="office_id" id="office_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

										<?php foreach ($offices as $office ): ?>
											
										<option value="{{ $office->id}}"  <?php if($doctor->id==$office->id){ echo "selected";}?>>{{ $office->name }}</option>
								
										<?php endforeach ?>
									</select>

			
						</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>



				<div class="form-group">
					
						{{Form::time('inTime', '', ['class'=>'form-control timepicker','placeholder' => 'Hora de Entrada'] )}}

				</div>
					</div>

					<div class="form-group form-inline align-items-end">
						<div class="icon-form">
							<i class="fal fa-clock"></i>
						</div>

						<div class="form-group">
							
						{{Form::time('outTime', '', ['class'=>'form-control timepicker','placeholder' => 'Hora de Entrada'] )}}

						</div>
					</div>

					@endif



					<div class="my-5 text-right text-md-center">

						<button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Agregar</i></button>
					</div>
					{!! Form::close() !!}


					
				</div>




			</div>

		</div>       

	</div> <!-- Fila -->
</div> <!-- Contenedor -->


@endsection