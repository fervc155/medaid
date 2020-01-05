<div class="col-md-6 col-lg-4">

			<div class="card card-profile pt-0">
				<img src="{{asset($doctor->Profileimg)}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$doctor->name}}</h5>


				<div class="card-body">
					<div class="stars">
						<?php $estrellas = round($doctor->stars);
						$noEstrellas = 5-$estrellas; ?>
						
						@for($i = 0;$i<$estrellas ; $i++)
						<i class="fas fa-star"></i>
						@endfor
						@for($i = 0;$i<$noEstrellas ; $i++)
						<i class="fal fa-star"></i>
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


					<div class="form-inline">
						<div class="color-principal">
							<i class="fal fa-user-tie"></i> Especialidad:
						</div>



						{{ $doctor->speciality->name }}


					</div>  

					<div class="text-center font-weight-bold color-principal">
						<i class="fal fa-coins"></i> Consulta:
					</div>

					<div class="display-4 color-principal">
						{{ $doctor->speciality->price }}
					</div>


					@if(Auth::Doctor())
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>


					<button class="btn btn-danger btn-round btn-confirm-delete" id='doctor-{{$doctor->id}}' > <i class="fal fa-trash"></i> Eliminar</button>

					{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$doctor->id]) }}
					{!! Form::close() !!}

					@endif


					@if(Auth::isPatient())
					
					<a href="{{url('appointment/create/'.$doctor->id)}}" class="btn btn-primary btn-round">Registrar una cita</a>

					@endif
				</div>

			</div>
		</div>