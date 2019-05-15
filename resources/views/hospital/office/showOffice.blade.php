@extends('layouts.nav')

@section('content')



<div class="tabmenu ">


	<ul class="nav  md-tabs   d-flex  justify-content-center flex-wrap" id="Tabmenu" role="tablist">
		<li>
			<a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
			aria-selected="false"><i class="fas d-md-inline-block d-none fa-hospital"></i><i class="fas d-md-none d-inline-block fa-map"></i><span> Datos</span></a>
		</li>

		<li class="d-block d-md-none">
			<a class="nav-link "  onclick="cambiardehoja()" id="calendario-tab" data-toggle="tab" href="#calendario" role="tab" aria-controls="calendario"
			aria-selected="false"><i class="fas fa-hospital"></i><span> Calendario</span></a>
		</li>

		
		<li class="nav-item">
			<a class="nav-link" id="medicos-tab" data-toggle="tab" href="#medicos" role="tab" aria-controls="medicos"
			aria-selected="false"><i class="fas fa-user-md"></i> <span>Medicos</span></a>
		</li>


	</ul>
</div>




<div class="container mt-5">
	
	<div class="tab-content ">



		
		<div class="tab-pane   fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

			
			<div class="row row-datos d-inline d-md-none  text-center contadores">
				<div class="col-auto ">

					<div class="caja">

						<?php $i=0; 

						foreach ($doctors as $d)
						{
							
							$i++;
							
						}  

						?>
						<i class="fas fa-user-md"></i>
						<div class="texto">


							<h3>{{$i}}</h3>
							<p>Doctores</p>	
						</div>
					</div>


				</div>


			</div>

			<div class="row ">


				<div id="col-datos" class=" col-12 d-none d-md-block col-md-4">




					<div class="card box-shadow lead">


						<div class="rounded">
							<div class="bg-primary text-center p-5">
								<i class="fas fa-hospital display-1 text-light"></i>
							</div>
						</div>


						<h5 class="card-header h4 text-light bg-secondary text-center text-capitalize"><i class="fas fa-hospital"></i> {{$office->name}}</h5>

						<div class="card-body">






							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-address-card"></i> ID:
								</div>  

								{{ $office->id }}

							</div>
							<div class="form-inline mb-2">


								<div class="color-principal">

									<i class="fas fa-home"></i> Domicilio:
								</div>  

								{{ $office->address }}

							</div>


							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-envelope"></i> CP:
								</div>

								{{ $office->postalCode }}

							</div>
							<div class="form-inline mb-2">
								<div class="color-principal">
									<i class="fas fa-city"></i> Ciudad:
								</div>                                  
								{{ $office->city }}

							</div>



							<div class="form-inline mb-3">
								<div class="color-principal">
									<i class="fas fa-flag"></i> Pais:
								</div>
								{{ $office->country }}

							</div>


							<a role="button" class="btn btn-wait btn-block mt-3  btn-info" href="/office/{{$office->id}}/edit"> <i class="fas fa-pen"></i> Editar</a>

							{!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Eliminar', ['class' => 'btn btn-wait btn-block mt-3 btn-danger']) }}
							{!! Form::close() !!}

						</div>

					</div>

				</div>

				<div class=" col-12 col-md-8 ">



					<div class=" row  text-center contadores">
						<div class="col  d-none d-md-block">

							<div class="caja">

								<?php $i=0; 

								foreach ($doctors as $d)
								{
									$i++;
									
								}  

								?>
								<i class="fas fa-user-md"></i>
								<div class="texto">
									

									<h3>{{$i}}</h3>
									<p>Doctores</p>	
								</div>
							</div>


						</div>



					</div>







				</div>
			</div>


		</div>

		<div class="tab-pane fade " id="medicos" role="tabpanel" aria-labelledby="medicos-tab">

			<div class="container">
				<div class="row">

					<div class="col  tarjeta ">
						<div class="row ">
							<div class="col pb-3">


								<h5 class="text-center h1 color-principal text-capitalize"><i class="fas fa-user-md"></i> Medicos</h5>
							</div>
						</div>

						<div class="row   ">
							<div class="col-12 p-0">
								
								@if(count($doctors)>0)
								<div class=" d-none d-md-block tarjeta-contenido-blanco ">
									<table class="table shadow ">
										<thead>
											<tr>
												<th>Nombre</th>

												<th>Horario</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($doctors as $doctor)
											<tr>
												<td> <a class="link" href="/doctor/{{$doctor->id}}"> {{ $doctor->name }} </a></td>
												<td> {{ $doctor->pivot->inTime }} - {{ $doctor->pivot->outTime }} </td>


											</tr>   
											@endforeach
										</tbody>
									</table>
								</div>


								<div class=" d-block d-md-none">
									@foreach ($doctors as $doctor)

									<div class="card tarjeta my-5">

										<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-user-md"></i> {{ $doctor->name}}</p>

										<div class="card-body">

											<div class="form-inline mb-2">


												<div class="icon-form">

													<i class="fas fa-clock"></i> 
												</div>	
												<div class="icon-texto">
													<span class="color-principal">Horario </span>{{ $doctor->pivot->inTime }} - {{ $doctor->pivot->outTime }}

												</div>
											</div>
											<a href="/doctor/{{$doctor->id}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>
										</div>

									</div>

									@endforeach
								</div>




								@else
								<p class="lead p-3">No se encontraron Medicos. <a class="link" href="/doctor/create">¡Registra a tu Medico!</a></p>

								@endif

							</div>




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