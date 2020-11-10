<div class="datos-calendario">


	<div id='id' data-id="{{$user_id}}"></div>
	<div id='url' data-url="{{$route}}" @if(Auth::check() && ( $user_id==Auth::user()->id || Auth::user()->isOffice())) data-url2="{{url('/get/appointment')}}" @endif></div>
	@csrf
	<div id='calendar'></div>

</div>


@if(auth::check() && ($user_id == Auth::user()->id || Auth::user()->isOffice()))

<button class="d-none" id="btn-show-appointment" data-toggle="modal" data-target="#verCita"></button>

<!-- Modal Crear -->
<div class="modal fade" id="verCita" tabindex="-1" role="dialog" aria-labelledby="verCitaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="verCitaLabel"><i class="fal fa-calendar"></i> Detalles</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="data-appointment">

					<p id="data-date">fecha <span class="font-weight-bold"></span></p>

					<p id="data-time">hora <span class="font-weight-bold"></span></p>

					<p id="data-price">precio <span class="font-weight-bold"></span></p>

					<p id="data-patient">Paciente <span class="font-weight-bold"></span></p>
					<p id="data-doctor">Doctor <span class="font-weight-bold"></span></p>

					<p id="data-office">consultorio <span class="font-weight-bold"></span></p>

					<p id="data-status">status <span class="font-weight-bold"></span></p>
					<div class="text-right">


						<a id="data-href" href="" class="btn  btn-primary btn-sm"><i class="fal fa-calendar"></i> Ver cita</a>

					</div>



				</div>

			</div>

		</div>
	</div>
</div>

@endif