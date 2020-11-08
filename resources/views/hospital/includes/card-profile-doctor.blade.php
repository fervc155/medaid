<div class="col-md-6 col-lg-4">

	<div class="card card-profile pt-0">
		<img src="{{$doctor->user()->ProfileImg}}" class="img-fluid">

		<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$doctor->name}}</h5>
		<div>

			<h5 class="color-principal"><i class="fal fa-user-tie "></i> Especialidades</h5>



			<?php foreach ($doctor->specialities as $speciality) : ?>

				<a href="{{url('speciality/'.$speciality->id)}}"><span class="badge badge-pill badge-info">{{$speciality->name}}</span></a>
			<?php endforeach ?>

		</div>


		<div class="card-body">
			<div class="stars">
				<?php $estrellas = round($doctor->stars);
				$noEstrellas = 5 - $estrellas; ?>

				@for($i = 0;$i<$estrellas ; $i++) <i class="fas fa-star"></i>
					@endfor
					@for($i = 0;$i<$noEstrellas ; $i++) <i class="fal fa-star"></i>
						@endfor
			</div>
			<div>
				{{$doctor->stars}}
			</div>



			@if(Auth::Patient())


			<div class="form-inline mb-2">


				<div class="color-principal">

					<i class="fal fa-address-card"></i> ID:
				</div>

				{{ $doctor->id }}

			</div>


			@endif
			<div class="form-inline mb-2">


				<div class="color-principal">

					<i class="fal fa-hospital"></i> consultorio:
				</div>

				{{ $doctor->office->name }}

			</div>


			<div class="form-inline mb-2">


				<div class="color-principal">

					<i class="fal fa-phone"></i> Telefono:
				</div>

				{{ $doctor->telephone }}

			</div>


			<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-birthday-cake"></i> Nacimiento:
				</div>
				{{ $doctor->birthdate }}

			</div>

		<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-clock"></i> horario:
				</div>
				{{ $doctor->inTime  }} - {{ $doctor->outTime }}

			</div>


			<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-venus-mars"></i> Sexo:
				</div>
				{{ $doctor->sex }}

			</div>


			<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-address-card"></i> Celuda:
				</div>



				{{ $doctor->schedule }}


			</div>


			<div class="text-center font-weight-bold color-principal">
				<i class="fal fa-coins"></i> Consulta:
			</div>


			<select data-size="7" class="selectpicker select-speciality-doctor" name="especialidad" id="especialidad" data-style="select-with-transition" title="Especialidad" data-size="sd7">

				<?php foreach ($doctor->specialities as $speciality) : ?>

					<option value="{{ $speciality->id}}" ?>{{ $speciality->name }}</option>

				<?php endforeach ?>
			</select>

			@if(Auth::Doctor())

			<div class="h3 color-principal">
				<span class=" speciality-price" id="speciality-price-minmax">

					{{$doctor->MinMaxCost}}
				</span>

				<?php foreach ($doctor->specialities as $speciality) : ?>
					<span class="d-none speciality-price" id="speciality-price-{{$speciality->id}}">{{$speciality->price}}</span>
				<?php endforeach ?>
			</div>

			@endif


			@if(Auth::Doctor())

			@if(($doctor->id == Auth::UserId() && Auth::isDoctor()) || Auth::Admin())


			<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>
			@endif

			@if(Auth::isOffice() && $doctor->office_id == Auth::UserId())


			<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>
			@endif


			@if(Auth::Admin() || (Auth::isOffice() && $doctor->office_id == Auth::UserId()))

			<button class="btn btn-danger btn-round btn-confirm-delete" id='doctor-{{$doctor->id}}'> <i class="fal fa-trash"></i> Eliminar</button>

			{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$doctor->id]) }}
			{!! Form::close() !!}


			@endif
			@endif


			@if(Auth::isPatient())




			<div class="h3 color-principal">
				<span class=" speciality-price" id="speciality-price-minmax">

					{{$doctor->MinMaxCost}}
				</span>

				<?php foreach ($doctor->specialities as $speciality) : ?>
					<span class="d-none speciality-price" id="speciality-price-{{$speciality->id}}">
						<span class="d-block">
							{{$speciality->price}}

						</span>


						<a class="btn btn-primary btn-round" href="{{url('appointment/create/'.$doctor->id.'/'.$speciality->id)}}">Agendar una cita</a>
					</span>
				<?php endforeach ?>
			</div>

			@endif


		</div>

	</div>
</div>