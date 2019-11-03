@extends('layouts.nav-admin')

@section('content')

<div class="container">




	<div class="row  ">


		<div class=" col-12 col-md-4">




			<div class="card card-profile">

				<img src="{{asset($appointment->patient->Profileimg)}}" class="img-fluid">

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


						<a href="{{url('/office/'.$appointment->doctor->office_id)}}" class="link">
							{{ $appointment->doctor->office->name }}</a>
						</div>

						<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/appointment/'.$appointment->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>

			


						@if($appointment->condition->status =='pending')


						{!! Form::open(['action' => ['AppointmentController@rejected', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Rechazar', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
						{!! Form::close() !!}



			

						{!! Form::open(['action' => ['AppointmentController@accepted', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Aceptar', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
						{!! Form::close() !!}

						@endif


						@if($appointment->condition->status =='accepted')



						{!! Form::open(['action' => ['AppointmentController@cancelled', $appointment->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						{{ Form::submit('Cancelar', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
						{!! Form::close() !!}


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



							<span class="caja-contador-icono"><i class="fal fa-calendar-check"></i></span>							<div class="card-body">
								<h3>{{$appointment->status}}</h3>


							</div>
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


								<a href="{{url('/appointment/'.$appointment->doctor->office_id)}}" class="link"><h3>{{$appointment->doctor->office->name}}</h3></a>
								<p>Consultorio</p>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>




	</div>
	@endsection