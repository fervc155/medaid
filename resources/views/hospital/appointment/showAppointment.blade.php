@extends('layouts.nav')

@section('content')




<div class="tabmenu ">


	<ul class="nav  md-tabs   d-flex  justify-content-center flex-wrap" id="Tabmenu" role="tablist">
		<li>
			<a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
			aria-selected="false"><i class="fas  fa-book"></i></i><span> Detalles</span></a>
		</li>





	</ul>
</div>



<div class="tab-content container  pt-5 mb-5" id="TabContenido">


	<div class="tab-pane   fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


		
		<div class="row  ">


			<div id="col-datos" class=" col-12 col-md-4">




				<div class="card box-shadow lead">


					<div class="rounded">
						<div class="bg-primary text-center p-5">
							<i class="fas fa-book display-1 text-light"></i>
						</div>
					</div>


					<h5 class="card-header h4 text-light bg-secondary text-center text-capitalize"><i class="fas fa-book"></i> {{$appointment->patient->name}}</h5>

					<div class="card-body">






						<div class="form-inline mb-2">


							<div class="color-principal">

								<i class="fas fa-calendar-week"></i> Fecha:
							</div>  

							{{ $appointment->date }}

						</div>
						<div class="form-inline mb-2">


							<div class="color-principal">

								<i class="fas fa-clock"></i> Hora:
							</div>  

							{{ $appointment->time }}

						</div>


						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fas fa-money-bill-wave"></i> Precio:
							</div>

							{{ $appointment->cost }}

						</div>
						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fas fa-tag"></i> Descripcion:
							</div>                                  
							{{ $appointment->description }}

						</div>



						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fas fa-quote-left"></i> Comentarios:
							</div>
							{{ $appointment->comment }}

						</div>


						<div class="form-inline mb-2">
							<div class="color-principal">
								<i class="fas fa-user-md"></i> Doctor: 
							</div>



							<a href="/doctor/{{$appointment->doctor_id}}" class="link">{{ $appointment->doctor->name }}</a>


						</div>


						<div class="form-inline mb-3">
							<div class="color-principal">
								<i class="fas fa-hospital"></i> Consultorio:
							</div>


							<a href="/office/{{$appointment->office_id}}" class="link">
								{{ $appointment->office->name }}</a>
							</div>

							<a role="button" class="btn btn-wait btn-block mt-3  btn-info" href="/appointment/{{$appointment->id}}/edit"> <i class="fas fa-pen"></i> Editar</a>

							<a role"button" class="btn btn-block btn-danger text-light mt-3 " onclick="btn_confirm_delete()"> <i class="fas fa-trash"></i> Eliminar</a>

							
							

							{!! Form::open(['action' => ['AppointmentController@destroy', $appointment->id], 'method' => 'POST']) !!}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete']) }}
							{!! Form::close() !!}


							@if($appointment->completed ==0)

							{!! Form::open(['action' => ['AppointmentController@complete', $appointment->id], 'method' => 'PATCH']) !!}
							{{ Form::hidden('_method', 'PATCH') }}
							{{ Form::submit('Atender', ['class' => 'btn  mt-3 btn-wait btn-block btn-secondary']) }}
							{!! Form::close() !!}

							@endif


						</div>

					</div>
				</div>










				<div class=" col-12 col-md-8 ">

					<div class=" row  text-center tarjeta-datos mt-5 mt-md-0">


						<div class="col-6">

							<div class="caja">


								@if($appointment->completed ==1)

								<i class="fas fa-check"></i> 
								<div class="texto">


									<h3>Completada</h3>
								</div>
								@else
								<i class="fas fa-times"></i>
								<div class="texto">


									<h3>No Completada</h3>	
								</div>


								@endif
							</div>


						</div>

						<div class="col-6  ">

							<div class="caja ">
								<i class="fas fa-user-injured"></i>
								<div class="texto">


									<a href="/patient/{{$appointment->patient_dni}}" class="link"><h3>{{$appointment->patient->name}}</h3></a>
									<p>Paciente</p>
								</div>
							</div>
						</div>
						<div class="col-6  ">

							<div class="caja ">
								<i class="fas fa-user-md"></i>
								<div class="texto">


									<a href="/doctor/{{$appointment->doctor_id}}" class="link"><h3>{{$appointment->doctor->name}}</h3></a>
									<p>Doctor</p>
								</div>
							</div>
						</div>

						<div class="col-6  ">

							<div class="caja ">
								<i class="fas fa-hospital"></i>
								<div class="texto">


									<a href="/appointment/{{$appointment->office_id}}" class="link"><h3>{{$appointment->office->name}}</h3></a>
									<p>Consultorio</p>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>




		</div>


	</div>


	@endsection