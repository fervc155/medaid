@extends('layouts.nav-admin')

@section('content')


@if(count($appointment->prescriptions)<1 && ($appointment->condition->status == 'accepted'
	|| ($appointment->condition->status == 'completed' || $appointment->condition->status == 'late') )
	&& Auth::user()->Doctor())


	<button class="btn btn-success  btn-float" data-toggle="modal" data-target="#AgregarReceta">
		<i class="fal fa-envelope-open-text"></i>
	</button>

	@include('hospital.includes.modal.createPrescription')

	@elseif(Auth::user()->Doctor())

	@include('hospital.includes.modal.editPrescription')

	@endif


						@if(($appointment->condition->status == 'completed' || $appointment->condition->status == 'late')  && null== $appointment->review && Auth::user()->isPatient())

	@include('hospital.includes.modal.createReview')


	@endif


	<div class="container">




		<div class="row  ">


			<div class=" col-12 col-md-4">




				<div class="card card-profile">



					@if(Auth::user()->Doctor())

					<img src="{{$appointment->patient->user()->Profileimg}}" class="img-fluid">

					@else

					<img src="{{$appointment->doctor->user()->Profileimg}}" class="img-fluid">



					@endif



					<h5 class="p-3 mt-0 h4 text-light bg-secondary text-center text-capitalize"><i class="fal fa-book"></i> Cita de {{$appointment->patient->user()->name}}</h5>

					<div class="card-body">


						<div class="form-inline mb-2">


							<div class="color-principal">

								<i class="fal fa-calendar-week"></i> FOLIO:
							</div>

							{{ $appointment->id }}









						</div>



						<div class="form-inline mb-2">


							<div class="color-principal">

								<i class="fal fa-calendar-week"></i> Fecha:
							</div>

							{{ $appointment->date }}

						</div>



						<div class="form-inline mb-2">


							<div class="color-principal">

								<i class="fal fa-clock"></i> Hora:
							</div>

							{{ $appointment->time }}

						</div>


						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fal fa-money-bill-wave"></i> Precio:
							</div>
							{{ $appointment->price }}

						</div>
						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fal fa-tag"></i> Descripcion:
							</div>
							{{ $appointment->description }}

						</div>



					 

						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fal fa-user-md"></i> Doctor:
							</div>



							<a href="{{url('/doctor/'.$appointment->doctor_id)}}" class="link">{{ $appointment->doctor->name }}</a>


						</div>


						<div class="form-inline mb-3">
							<div class="color-principal">
								<i class="fal fa-hospital"></i> Consultorio:
							</div>


							<a href="{{url('/office/'.$appointment->doctor->office_id)}}" class="link">
								{{ $appointment->doctor->office->name }}</a>
						</div>


						@if($appointment->status=='pending')
										<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/appointment/'.$appointment->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>


							@if(Auth::user()->Patient())


								{!! Form::open(['action' => ['AppointmentController@cancelled', $appointment->id], 'method' => 'PATCH']) !!}
								{{ Form::hidden('_method', 'PATCH') }}
								{{ Form::submit('Cancelar', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
								{!! Form::close() !!}


							 
				
								   
					      <a href="{{route('payment.user',['appointment'=>$appointment->id])}}" class="btn btn-success btn-round">Pagar ahora</a>
					    
							@endif
							@if(Auth::user()->Doctor())



								{!! Form::open(['action' => ['AppointmentController@attend', $appointment->id], 'method' => 'PATCH']) !!}
								{{ Form::hidden('_method', 'PATCH') }}
								{{ Form::submit('Atender', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
								{!! Form::close() !!}


							@endif
					@endif




					@if($appointment->condition->status =='accepted' )

						 
 						@if(Auth::user()->Doctor())



							{!! Form::open(['action' => ['AppointmentController@attend', $appointment->id], 'method' => 'PATCH']) !!}
							{{ Form::hidden('_method', 'PATCH') }}
							{{ Form::submit('Atender', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
							{!! Form::close() !!}

						@endif
					@endif


				 
					@if(($appointment->condition->status == 'completed' || $appointment->condition->status == 'late')  && null== $appointment->review && Auth::user()->isPatient())



						<button type="button" data-toggle="modal" data-target="#crearReview" class="  btn  btn-primary  btn-sm btn-round
						"  ><i class="fal fa-pen"></i> Calificar mi cita </button>						

					@endif

 

 


				@if($appointment->condition->status =='lost')
					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/appointment/'.$appointment->id)}}/edit"> <i class="fal fa-pen"></i> reagendar</a>
					@if(Auth::user()->Doctor())




						@if($appointment->IsToday)



						@if($appointment->CanUpdateLate && null!=$appointment->payment)


						{!! Form::open(['action' => ['AppointmentController@late', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Aceptar con retraso', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
						{!! Form::close() !!}


						@endif

						@endif
						@endif


						@endif

   	 

	


						@if(null!= $appointment->review)

								<div class="stars">
											<?php $estrellas = round($appointment->stars);
											$noEstrellas = 5 - $estrellas; ?>

											@for($i = 0;$i<$estrellas ; $i++) <i class="fas fa-star"></i>
												@endfor
												@for($i = 0;$i<$noEstrellas ; $i++) <i class="fal fa-star"></i>
													@endfor
										</div>
						@endif


					</div>

				</div>
			</div>










			<div class=" col-12 col-md-8 ">

				<div class=" row ">


					<div class="col-12 ">

						<div class="card caja-contador">



							<span class="caja-contador-icono"><i class="fal fa-calendar-check"></i></span>
							<div class="card-body">
								<h3>{{$appointment->status}}</h3>


							</div>
						</div>


					</div>

					<div class="col-12 ">

						<div class="card caja-contador">
							<span class="caja-contador-icono"><i class="fal fa-user-injured"></i></span>
							<div class="card-body">


								<a href="{{url('/patient/'.$appointment->patient_dni)}}" class="link">
									<h3>{{$appointment->patient->name}}</h3>
								</a>
								<p>Paciente</p>
							</div>
						</div>
					</div>
					<div class="col-12   ">

						<div class="card caja-contador">
							<span class="caja-contador-icono">
								<i class="fal fa-user-md"></i>

							</span>
							<div class="card-body">


								<a href="{{url('/doctor/'.$appointment->doctor_id)}}" class="link">
									<h3>{{$appointment->doctor->name}}</h3>
								</a>
								<p>Doctor</p>
							</div>
						</div>
					</div>

					<div class="col-12   ">

						<div class="card caja-contador ">
							<span class="caja-contador-icono">

								<i class="fal fa-hospital"></i>
							</span>
							<div class="card-body">


								<a href="{{url('/appointment/'.$appointment->doctor->office_id)}}" class="link">
									<h3>{{$appointment->doctor->office->name}}</h3>
								</a>
								<p>Consultorio</p>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>




	</div>



	@if(count($appointment->prescriptions)>0 && Auth::user()->Doctor())

	@include('hospital.includes.modal.EditPrescription');






	<div class="container-fluid">
		@foreach ($appointment->prescriptions as $prescription)
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-envelope-open-text"></i>
						</div>
						<div class="card-title"> Receta </div>
					</div>
					<div class="card-body container-fluid ">
						<div class="row justify-content-center">
							<div class="col-6 col-md-3">


								<p>
									<i class="fal fa-user-md btn btn-primary btn-just-icon btn-round"></i> Doctor: <span class="font-weight-bold "><a href="{{url('/doctor/'.$appointment->doctor_id)}} ">{{$appointment->doctor->name}}</a></span>
								</p>
							</div>

							<div class="col-6 col-md-3">
								<p>
									<i class="fal fa-user-injured btn btn-primary btn-just-icon btn-round"></i> Paciente: <span class="font-weight-bold "><a href="{{url('/patient/'.$appointment->patient_dni)}} ">{{$appointment->patient->name}}</a></span>
								</p>

							</div>

							<div class="col-6 col-md-3">
								<p>
									<i class="fal fa-calendar-week btn btn-primary btn-just-icon btn-round"></i> Edad: <span class="font-weight-bold ">{{$appointment->patient->age}}</span>
								</p>
							</div>

							<div class="col-6 col-md-3">
								<p>
									<i class="fal fa-calendar-week btn btn-primary btn-just-icon btn-round"></i> Fecha: <span class="font-weight-bold ">{{$prescription->created_at->diffForHumans()}}</span> Editado el: {{$prescription->updated_at->diffForHumans()}}</span>
								</p>
							</div>
						</div>
						<p>
							<pre>{{$prescription->content}}
							</pre>
						</p>

	<a href="{{ action('PrescriptionController@download', $prescription->id) }}" class="btn btn-round btn-just-icon btn-success float-right btn-sm"><i class="fal fa-download"></i></a>

						@if(Auth::user()->Doctor())
						<button type="button" data-toggle="modal" data-target="#EditarReceta" class="float-right btn btn-actualizar-receta btn-link  btn-sm
						" data-id="{{$prescription->id}}" data-content='{{$prescription->content}}'><i class="fal fa-pen"></i> Editar </button>


						@endif

					</div>
				</div>

			</div>
		</div>
		@endforeach
	</div>
	@endif


	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-comment"></i>
						</div>
						<div class="card-title"> Envia un comentario </div>
					</div>
					<div class="card-body ">

						<form action="{{url('/appointment/comment/register')}}" method="post">

							<input type="hidden" name="_token" value="{{ csrf_token()}}">



							<!-- <div class="" id="editor-container" ></div> -->

							<div class="form-group label-floating">
								<label class="form-control-label bmd-label-floating" for="exampleInputTextarea">Escribe tu comentario</label>
								<textarea name="comment" rows="5" class="form-control"></textarea>
							</div>

							<input type="hidden" name="appointment_id" value="{{$appointment->id}}">

							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">


							<input type="submit" value="Enviar" class="btn btn-primary float-right btn-round">


							<!-- <span id="submit-comment" class="btn btn-primary float-right btn-round">ajax Enviar</span> -->
						</form>

					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-comment"></i>
						</div>
						<div class="card-title">{{count($appointment->comments)}} comentarios </div>
					</div>
					<div class="card-body ">
						<div class="container ">
							@include('hospital.includes.loopComments');

						</div>

					</div>
				</div>

			</div>
		</div>
	</div>




	@endsection