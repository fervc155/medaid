@extends('layouts.web')

@section('content')




<div class="container mt-5">

	<div class="row">
		@include('hospital.includes.card-profile-doctor')

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

			<div class="row">
				
				
				<div class="col p-3 datos-calendario">

					<div id='id' data-id="{{$doctor->id}}"></div>
					<div id='url' data-url="{{url('/get/appointments/doctor')}}"></div>
					@csrf
					<div id='calendar'></div>

				</div>
			</div>




		</div>

	</div>
</div>  




@endsection
