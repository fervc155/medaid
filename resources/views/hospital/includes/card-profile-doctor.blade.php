<div class="col-md-6 col-lg-4">

	<div class="card card-profile pt-0">
		<img src="{{$doctor->user()->ProfileImg}}" class="img-fluid">


			@if(Auth::check() && Auth::user()->isPatient())
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





			@if( Auth::check() &&  Auth::user()->Patient())


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


			@php 
				$countLikes =count($doctor->likes); 
			@endphp
			<div class="form-inline mb-2">
				<div class="color-principal">
					<i class="fal fa-heart"></i> A {{$countLikes}} paciente<?php if($countLikes!=1){echo 's';}?> le<?php if($countLikes!=1){echo 's';}?> gusta<?php if($countLikes!=1){echo 'n';}?> este doctor
				</div>




			</div>



			



			@if(isset($wizardActive))

				<a href="{{$doctor->profileUrl}}" class="btn btn-primary">Ver perfil</a>
			@endif

	 	

			@if( Auth::check() &&  Auth::user()->Doctor())

			@if(($doctor->id == Auth::user()->profile()->id && Auth::user()->isDoctor()) || Auth::user()->isAdmin())


			<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>
			@endif

			@if(Auth::user()->isOffice() && $doctor->office_id == Auth::user()->profile()->id)


			<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/doctor/'.$doctor->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>
			@endif


	 
			@endif


			@if( Auth::check() && Auth::user()->isPatient())


	<div class="text-center font-weight-bold color-principal">
				<i class="fal fa-coins"></i> Consulta:
			</div>

			  

			<div class="h3 color-principal">
				<span class=" speciality-price" id="speciality-price-minmax">

					{{$doctor->MinMaxCost}}
				</span>


        <form method="post" action="{{url('appointment/create/'.$doctor->id)}}">
          @csrf
        <select class="selectpicker" name="speciality_id" data-style="select-with-transition" title="Selecciona una especialidad" required data-size="7" tabindex="-98">
          
        <?php foreach ($doctor->specialities as $speciality) : ?>
           <option value="{{$speciality->id}}">{{$speciality->name}} | {{$speciality->price}}</option>
        <?php endforeach ?>

        </select>

        <button class="btn btn-primary btn-sm btn-round">Agendar</button>

        </form>
			</div>

			@endif


		</div>

	</div>
</div>