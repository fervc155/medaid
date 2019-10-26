@extends('layouts.nav-admin')

@section('content')



<div class="container mt-5">

	<div class="row ">


		<div  class=" col-12 col-md-4">



			<div class="card ">
				<img src="{{asset($office->Profileimg)}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$office->name}}</h5>


				<div class="card-body">






					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-address-card"></i> ID:
						</div>  

						{{ $office->id }}

					</div>
					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-home"></i> Domicilio:
						</div>  

						{{ $office->address }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-envelope"></i> CP:
						</div>

						{{ $office->postalCode }}

					</div>
					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-city"></i> Ciudad:
						</div>                                  
						{{ $office->city }}

					</div>



					<div class="form-inline mb-3">
						<div class="color-principal">
							<i class="fal fa-flag"></i> Pais:
						</div>
						{{ $office->country }}

					</div>

					<div class="text-center">



						<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="/office/{{$office->id}}/edit"> <i class="fal fa-pen"></i> Editar</a>

						<a role="button" class="btn btn-round btn-danger text-light mt-3 btn-confirm-delete" id="office-{{$office->id}}"> <i class="fal fa-trash"></i> Eliminar</a>

						{!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete', 'id'=>'office-'.$office->id]) }}
						{!! Form::close() !!}

					</div>
				</div>

			</div>


		</div>

		<div class=" col-12 col-md-8 ">



			<div class=" row  text-center contadores">
				<div class="col-12 col-md-6">

					<div class="caja-contador card">

						<?php $i=0; 

						foreach ($doctors as $d)
						{
							$i++;

						}  

						?>
						<div class="caja-contador-icono">
							
						<i class="fal fa-user-md"></i>
						</div>
						<div class="card-body">


							<h3>{{$i}}</h3>
							<p>Doctores</p> 
						</div>
					</div>


				</div>



			</div>

			<div class="row">
				<div class="col">
					<iframe src="https://www.google.com/maps/d/embed?mid=19EoyniwVmLG_wj1xSTgfHLBzyH8&hl=es" width="640" height="480"></iframe>
				</div>
			</div>







		</div>
	</div>


</div>





@if(count($doctors) < 1)
<div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-user-md"></i>
			<p class="lead ">No se encontraron doctores. <a href="{{ url('/doctor/create')}}">¡Agrega uno!</a></p>
		</div>
	</div>
</div>


@else


<div class="container">

	<div class="row">
		<div class="col-12 d-none d-md-block">
			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-list"></i>
					</div>
					<div class="card-title">Listado de medicos</div>
				</div>
				<div class="card-body table-responsive">


					<table class="table " id="data_table">
						<thead>
							<tr>
								<th>Id</th>
								<th >Nombre</th>
								<th >Teléfono</th>
								<th >Turno</th>
								<th >Sexo</th>
								<th >Especialidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($doctors as $d)
							<tr>
								<td>{{$d->id}}</td>

								<td>{{ $d->name }}</td>
								<td>{{ $d->telephoneNumber }}</td>
								<td>{{ $d->turno }}</td>
								<td>{{ $d->sexo }}</td>
								<td>{{ $d->especialidad }}</td>
								<td><a href="{{url('/doctor/'.$d->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>
									<a href="{{url('/doctor/'.$d->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>


		</div>
		<div class="col-12 d-block d-md-none">





			@foreach ($doctors as $doctor)
			<div class="card  my-5">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">
						<i class="fal fa-user-md"></i>
					</div>
					<div class="card-title">{{ $doctor->name}}</div>
				</div>

				<div class="card-body">



					<div class="form-inline mb-2">


						<div class="icon-form">

							<i class="fal fa-phone"></i> 
						</div>  
						<div class="icon-texto">
							<span class="color-principal">Teléfono: </span> {{ $doctor->telephoneNumber }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-sun"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Turno: </span> {{ $doctor->turno }}
						</div>

					</p>    </div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-venus-mars"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Sexo: </span> {{ $doctor->sexo }}
						</div>

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-address-card"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Cedula: </span> {{ $doctor->cedula }}
						</div>

					</div>


					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fal fa-user-tie"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Especialidad: </span> {{ $doctor->especialidad }}
						</div>

					</div>  
					<div class="text-center">
														<a href="{{url('/doctor/'.$doctor->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>
									<a href="{{url('/doctor/'.$doctor->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

					</div>
				</div>

			</div>

			@endforeach

		</div>
	</div>
</div>

@endif




@endsection