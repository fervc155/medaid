@extends('layouts.app')

@section('content')



<div class="tabmenu">
	<div class="row justify-content-center">
		

		<ul class="nav  md-tabs" id="Tabmenu" role="tablist">
			<li>
				<a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
				aria-selected="false"><i class="fas d-md-inline-block d-none fa-user-md"></i><i class="fas d-md-none d-inline-block fa-calendar"></i><span> Mis Datos</span></a>
			</li>

			<li class="d-block d-md-none">
				<a class="nav-link "  onclick="cambiardehoja()" id="calendario-tab" data-toggle="tab" href="#calendario" role="tab" aria-controls="calendario"
				aria-selected="false"><i class="fas fa-user-md"></i><span> Calendario</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" id="citas-tab" data-toggle="tab" href="#citas" role="tab" aria-controls="citas"
				aria-selected="false"><i class="fas fa-book"></i> <span> Citas</span></a>
			</li>
		</ul>
	</div>
</div>


<div class="container mt-5">
	

	<div class="tab-content " id="TabContenido">


		<div class="tab-pane   fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

			
			<div class="row row-datos d-inline d-md-none  text-center contadores">
				<div class="col-auto ">

					<div class="caja">

						<?php $i=0; 

						foreach ($appointments as $a)
						{
							if ($a->completed == false)
							{
								$i++;
							}
						}  

						?>
						<i class="fas fa-book"></i>
						<div class="texto">


							<h3>{{$i}}</h3>
							<p>Citas</p>	
						</div>
					</div>


				</div>

				

			</div>

			<div class="row ">


				<div id="col-datos" class=" col-12 d-none d-md-block col-md-4">




					<div class="card box-shadow lead">


						<div class="rounded">
							<div class="bg-primary text-center p-5">
								<i class="fas fa-user display-1 text-light"></i>
							</div>
						</div>


						<h5 class="card-header h4 text-light bg-secondary text-center text-capitalize"><i class="fas fa-user-md"></i> {{$patient->name}}</h5>

						<div class="card-body">






							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-id-card"></i> DNI: 
								</div>  

								{{ $patient->dni }}

							</div>

							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-id-card"></i> CURP:
								</div>

								{{ $patient->curp }}

							</div>
							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-phone"></i> Telefono:
								</div>  

								{{ $patient->telephoneNumber }}

							</div>


							
							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-birthday-cake"></i> Nacimiento:
								</div>                                  
								{{ $patient->birthdate }}

							</div>



							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-venus-mars"></i> Sexo:
								</div>
								{{ $patient->sex }}

							</div>


							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-home"></i> Domicilio: 
								</div>



								{{ $patient->address }}


							</div>

							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-envelope"></i> CP: 
								</div>



								{{ $patient->cp }}


							</div>

							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-city"></i> Ciudad: 
								</div>



								{{ $patient->city }}


							</div>

							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-flag"></i> Pais: 
								</div>



								{{ $patient->country }}


							</div>



							<div class="form-inline mb-3">
								<div class="color-principal">
									<i class="fas fa-user-tie"></i> Doctor:
								</div>



								<a href="/doctor/{{$patient->doctor->id}}" class="link">{{ $patient->doctor->name }}</a>


							</div>  
							<a role="button" class="btn btn-wait btn-block mt-3  btn-info" href="/patient/{{$patient->dni}}/edit"> <i class="fas fa-pen"></i> Editar</a>

							{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Eliminar', ['class' => 'btn mt-3 btn-block btn-danger']) }}
							{!! Form::close() !!}

						</div>

					</div>

				</div>

				<div class=" col-12 col-md-8 ">



					<div class=" row  text-center contadores">
						<div class="col  d-none d-md-block">

							<div class="caja">

								<?php $i=0; 

								foreach ($appointments as $a)
								{
									if ($a->completed == false)
									{
										$i++;
									}
								}  

								?>
								<i class="fas fa-book"></i>
								<div class="texto">
									

									<h3>{{$i}}</h3>
									<p>Citas</p>	
								</div>
							</div>


						</div>

						
					</div>


					<div class="row mt-3">
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
						<div class="col p-3 ">
							<div id='calendar'></div>

						</div>

					</div>








				</div>
			</div>


		</div>



<div class="tab-pane   fade show " id="citas" role="tabpanel" aria-labelledby="citas-tab">

			<div class="row">


				<div class="col tarjeta">

					<div class="row ">
						<section class="col-12 pb-3">
							<h5 class="text-center h1 color-principal text-capitalize"><i class="fas fa-book"></i> Citas</h5>
						</section>
					</div>
					<div class="row ">
						<div class="col-12 p-0 ">



							@if(count($appointments)>0)
							<div class="d-none d-md-block tarjeta-contenido-blanco ">
								<table class="table ">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Hora</th>
											<th>Costo</th>
											<th>Razón</th>
											<th>Consultorio</th>
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
											<td><a class="link" href="/office/{{$a->office->id}}">{{ $a->office->name }}</a></td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>




							<div class="d-block    d-md-none">
								@foreach ($appointments as $appointment)
								@if ($appointment->completed == false)
								

								<div class="card  tarjeta my-3">

									<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-calendar-week"></i> {{ $appointment->date}}</p>

									<div class="card-body">


										<div class="form-inline mb-2">


											<div class="icon-form">

												<i class="fas fa-clock"></i> 
											</div>	
											<div class="icon-texto">
												<span class="color-principal">Hora </span> {{ $appointment->time }}
											</div>
										</div>


										<div class="form-inline mb-2">
											<div class="icon-form">
												<i class="fas fa-money-bill-wave"></i>
											</div>

											<div class="icon-texto">

												<span class="color-principal">Costo </span> {{ $appointment->cost }}
											</div>

										</div>


										<div class="form-inline mb-2">
											<div class="icon-form">
												<i class="fas fa-tag"></i>
											</div>

											<div class="icon-texto">

												<span class="color-principal">Descripcion </span> {{ $appointment->description }}
											</div>

										</div>


										

										<div class="form-inline mb-3">
											<div class="icon-form">
												<i class="fas fa-user-md"></i>
											</div>

											<div class="icon-texto">

												<span class="color-principal">Especialidad: </span><a class="link" href="/office/{{$a->office->id}}"> {{ $appointment->office->name }}</a>
											</div>
										</div>
										<a href="/appointment/{{$appointment->id}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>

									</div>

								</div>
								@endif

								@endforeach
							</div>


							@else
							<p class="lead p-3">No se encontraron citas. <a class="link" href="/appointment/create">¡Agenda una!</a></p>

							@endif



						</div> 

					</div> 

				</div>
			</div>




		</div>



		<div class="tab-pane     fade show " id="calendario" role="tabpanel" aria-labelledby="calendario-tab">


			<div class="row">		
				
				<div class="col" id="col-datos2">
					
				</div>
			</div>



		</div>
	</div>

</div>

@endsection