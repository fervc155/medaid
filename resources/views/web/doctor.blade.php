@extends('layouts.web')

@section('content')




<div class="container mt-5">

	<div class="row">
		<div class="col-md-4">

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


					<div class="form-inline">
						<div class="color-principal">
							<i class="fal fa-user-tie"></i> Especialidad:
						</div>



						{{ $doctor->speciality->name }}


					</div>

					<div class="form-inline mb-3">
						<div class="color-principal">
							<i class="fal fa-coins"></i> Consulta:
						</div>



						{{ $doctor->speciality->price }}


					</div>  


					@auth
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-calendar-check"></i> Agendar una cita</a>
					@endauth
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





<!-- PACIENTES -->




@endsection
