@extends('layouts.nav-admin')

@section('content')

<div class="container">




	<div class="row  ">


		<div class=" col-12 col-md-4">




			<div class="card card-profile">

				<img src="{{asset('splash/img/user-default.jpg')}}" class="img-fluid">

				<h5 class="p-3 mt-0 h4 text-light bg-secondary text-center text-capitalize"><i class="fal fa-book"></i> {{$appointment->patient->name}}</h5>

				<div class="card-body">






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

						{{ $appointment->cost }}

					</div>
					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-tag"></i> Descripcion:
						</div>                                  
						{{ $appointment->description }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-quote-left"></i> Comentarios:
						</div>
						{{ $appointment->comment }}

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


						<a href="{{url('/office/'.$appointment->office_id)}}" class="link">
							{{ $appointment->office->name }}</a>
						</div>

						<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/appointment/'.$appointment->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>

						<a role="button" class="btn btn-round btn-danger text-light mt-3 " onclick="btn_confirm_delete()"> <i class="fal fa-trash"></i> Eliminar</a>




						{!! Form::open(['action' => ['AppointmentController@destroy', $appointment->id], 'method' => 'POST']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete']) }}
						{!! Form::close() !!}


						@if($appointment->completed ==0)

						{!! Form::open(['action' => ['AppointmentController@complete', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Atender', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
						{!! Form::close() !!}

						@endif


					</div>

				</div>
			</div>










			<div class=" col-12 col-md-8 ">

				<div class=" row ">


					<div class="col-12 col-md-6">

						<div class="card caja-contador">


							@if($appointment->completed ==1)

							<span class="caja-contador-icono"><i class="fal fa-calendar-check"></i></span>							<div class="card-body">


								<h3>Completada</h3>
							</div>
							@else
							<span class="caja-contador-icono"><i class="fal fa-times"></i> </span>
							<div class="card-body">


								<h3>No Completada</h3>  
							</div>


							@endif
						</div>


					</div>

					<div class="col-12 col-md-6">

						<div class="card caja-contador">
							<span class="caja-contador-icono"><i class="fal fa-user-injured"></i></span>
							<div class="card-body">


								<a href="{{url('/patient/'.$appointment->patient_dni)}}" class="link"><h3>{{$appointment->patient->name}}</h3></a>
								<p>Paciente</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6  ">

						<div class="card caja-contador">
							<span class="caja-contador-icono">
							<i class="fal fa-user-md"></i>
								
							</span>
							<div class="card-body">


								<a href="{{url('/doctor/'.$appointment->doctor_id)}}" class="link"><h3>{{$appointment->doctor->name}}</h3></a>
								<p>Doctor</p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6  ">

						<div class="card caja-contador ">
							<span class="caja-contador-icono">
								
							<i class="fal fa-hospital"></i>
							</span>
							<div class="card-body">


								<a href="{{url('/appointment/'.$appointment->office_id)}}" class="link"><h3>{{$appointment->office->name}}</h3></a>
								<p>Consultorio</p>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>




	</div>
	@endsection