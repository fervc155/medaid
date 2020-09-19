<div class="datos-calendario">


	<div id='id' data-id="{{$model_id}}"></div>
	<div id='url' data-url="{{$route}}" @if($model_id==Auth::UserId()) data-url2="{{url('/get/appointment')}}" @endif></div>
	@csrf
	<div id='calendar'></div>

</div>


@if($model_id == Auth::UserId())

<button class="d-none" id="btn-show-appointment" data-toggle="modal" data-target="#AgregarEspecialidad"></button>

<!-- Modal Crear -->
<div class="modal fade" id="AgregarEspecialidad" tabindex="-1" role="dialog" aria-labelledby="AgregarEspecialidadLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="AgregarEspecialidadLabel"><i class="fal fa-calendar"></i> Detalles</h5>
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