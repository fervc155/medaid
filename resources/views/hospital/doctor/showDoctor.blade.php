@extends('layouts.nav')

@section('content')


<div class="tabmenu ">


	<ul class="nav  md-tabs   d-flex  justify-content-center flex-wrap" id="Tabmenu" role="tablist">
		<li>
			<a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
			aria-selected="false"><i class="fas fa-user-md"></i><span> Mis Datos</span></a>
		</li>
		<li>
			<a class="nav-link" id="citas-tab" data-toggle="tab" href="#citas" role="tab" aria-controls="citas"
			aria-selected="true"><i class="fas fa-book"></i><span> Mis Citas</span></a>
		</li>
		<li>
			<a class="nav-link " id="paciente-tab" data-toggle="tab" href="#pacientes" role="tab" aria-controls="pacientes"
			aria-selected="false"><i class="fas fa-user-injured"></i><span> Mis Pacientes</span></a>
		</li>
	</ul>
</div>



<div class="container mt-5">
	
	<div class="tab-content ">

		<div class="tab-pane   fade show " id="citas" role="tabpanel" aria-labelledby="citas-tab">

			<div class="row">


				<div class="col tarjeta">

					<div class="row ">
						<section class="col-12 pb-3">
							<h5 class="text-center  text-capitalize"><i class="fas fa-book"></i> Citas pendientes</h5>
						</section>
					</div>
					<div class="row tarjeta-contenido-blanco">
						<div class="col-12 p-0 ">



							<table class="table ">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Costo</th>
										<th>Razón</th>
										<th>Paciente</th>
										<th>Consultorio</th>
										<th>Atender</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($appointments as $a)
									@if ($a->completed == false)
									<tr>
										<td><a class="link" href="/appointment/{{$a->id}}">{{ $a->date }}</a></td>
										<td>{{ $a->time }}</td>
										<td>{{ $a->cost }}</td>
										<td>{{ $a->description }}</td>
										<td>{{ $a->patient->name }}</td>
										<td><a class="link" href="/office/{{$a->office->id}}">{{ $a->office->name }}</a></td>
										<td>
											{!! Form::open(['action' => ['AppointmentController@complete', $a->id], 'method' => 'PATCH']) !!}
											{{ Form::hidden('_method', 'PATCH') }}
											{{ Form::submit('Atender', ['class' => 'btn btn-success']) }}
											{!! Form::close() !!}
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>





						</div> 

					</div> 

				</div>
			</div>




		</div>

		<div class="tab-pane fade " id="pacientes" role="tabpanel" aria-labelledby="paciente-tab">

			<div class="container">
				<div class="row">

					<div class="col  tarjeta ">
						<div class="row ">
							<div class="col pb-3">


								<h5 class="text-center text-capitalize"><i class="fas fa-user-injured"></i> Pacientes</h5>
							</div>
						</div>

						<div class="row tarjeta-contenido-blanco ">
							<table class="table ">
								<thead>
									<tr>
										<th>DNI</th>
										<th>Nombre</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($patients as $p)
									<tr>
										<td> <a class="link" href="/patient/{{$p->dni}}"> {{ $p->dni }} </a> </td>
										<td> <a class="link" href="/patient/{{$p->dni}}"> {{ $p->name }} </a></td>
									</tr>   
									@endforeach
								</tbody>
							</table>


						</div>

					</div> 

				</div>
			</div>

		</div>

		<div class="tab-pane   fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


			<div class="row ">




				<div class=" col-12 col-md-4">




					<div class="card  lead">


						<div class="rounded">
							<div class="bg-primary text-center p-5">
								<i class="fas fa-user display-1 text-light"></i>
							</div>
						</div>


						<h5 class="card-header h4 text-light bg-secondary text-center text-capitalize"><i class="fas fa-user-md"></i> Datos del médico</h5>

						<div class="card-body">






							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-address-card"></i> ID:
								</div>  

								{{ $doctor->id }}

							</div>
							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-phone"></i> Telefono:
								</div>  

								{{ $doctor->telephoneNumber }}

							</div>


							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-sun"></i> Turno:
								</div>

								{{ $doctor->turno }}

							</div>
							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-birthday-cake"></i> Nacimiento:
								</div>                                  
								{{ $doctor->birthdate }}

							</div>



							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-venus-mars"></i> Sexo:
								</div>
								{{ $doctor->sexo }}

							</div>


							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-address-card"></i> Celuda: 
								</div>



								{{ $doctor->cedula }}


							</div>


							<div class="form-inline mb-3">
								<div class="color-principal">
									<i class="fas fa-user-tie"></i> Especialidad:
								</div>



								{{ $doctor->especialidad }}


							</div>  
							<a role="button" class="btn btn-block mt-3  btn-info" href="/doctor/{{$doctor->id}}/edit"> <i class="fas fa-pen"></i> Editar</a>

							{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Eliminar', ['class' => 'btn btn-block mt-3 btn-danger']) }}
							{!! Form::close() !!}

						</div>

					</div>

				</div>

				<div class=" col-12 col-md-8 ">

					<div class="row">

						<div class="col my-5 my-md-0">
							
							<h1 class="text-left h1  text-center text-md-left text-capitalize color-principal"><span class="d-none d-md-inline">Medico:</span> {{$doctor->name}}</h1>
						</div>
						

					</div>

					<div class="row">
						<div class="col mb-5  my-md-3">
							<div class="contadores d-flex justify-content-center justify-content-md-start">

								<div class="caja">
									<h3>{{count($appointments)}}</h3>
									<p>Citas</p>	
								</div>
								<div class="caja">
									<h3>{{count($patients)}}</h3>
									<p>Pacientes</p>
								</div>

							</div>

						</div>
					</div>

					<div class="row">
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
						<div class="col">
							<div id='calendar'></div>
							
						</div>
							
					</div>
					

					




					
				</div>
			</div>


		</div>
	</div>
</div>



@endsection