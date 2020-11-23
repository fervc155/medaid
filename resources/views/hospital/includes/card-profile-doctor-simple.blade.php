<div class="col-md-6 col-lg-4">

	<div class="card card-profile pt-0">
		<img src="{{$doctor->user()->ProfileImg}}" class="img-fluid">


			@if(Auth::user()->isPatient())
				@livewire('like.heart', ['doctor_id'=>$doctor->id])
			@endif
		<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> <a href="{{$doctor->profileUrl}}">{{$doctor->name}}</a></h5>

		<div>

		

			<h5 class="color-principal"><i class="fal fa-user-tie "></i> Especialidades</h5>


				@php

					$dE = $doctor->specialities;
				@endphp

			<?php foreach ($dE as $speciality) : ?>

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





			<div class="form-inline mb-2">


				<div class="color-principal">

					<i class="fal fa-hospital"></i> consultorio:
				</div>

				{{ $doctor->office->name }}

			</div>



		<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-clock"></i> horario:
				</div>
				{{ $doctor->inTime  }} - {{ $doctor->outTime }}

			</div>

			<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-heart"></i> {{count($doctor->likes)}} pacientes le gusta este doctor
				</div>




			</div>


				<a href="{{$doctor->profileUrl}}" class="btn btn-primary">Ver perfil</a>


		</div>

	</div>
</div>