@extends ('layouts.nav')

@section('content')





<div class="contenedor">
	
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

					<h1 class="display-4 text-capitalize  text-center">médicos</h1> 
					
				</div>
			</div>



		</section>
	</div>

	<div class="contenedor-fondo">
		
	</div>

	<div class="contenedor-imagen">
		
		<div class="container-fluid mt-0  p-0">

			<div class="row ">
				<div class="col ">

					<img src="{{asset('splash/header/doctor.jpg')}}"> 
					
				</div>
			</div>



		</div>
	</div>

</div>

<div class="container my-5">
	<div class="row justify-content-end">
		<div class="col-12 col-md-4">
			
			<div class="form-group" align="center">
				<a href="/doctor/create" role="button" class="btn btn-wait btn-secondary btn-block"><i class="fas fa-plus"></i> Agregar</a>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-12 table-responsive d-none d-md-block">

			@if(count($doctors) > 0)
			<table class="table" id="data_table">
				<thead>
					<tr>
						<th >Nombre</th>
						<th >Fecha de nacimiento</th>
						<th >Teléfono</th>
						<th >Turno</th>
						<th >Sexo</th>
						<th >Cédula</th>
						<th >Especialidad</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($doctors as $d)
					<tr>
						
						<td><a class="link" href="/doctor/{{$d->id}}">{{ $d->name }}</a></td>
						<td>{{ $d->birthdate }}</td>
						<td>{{ $d->telephoneNumber }}</td>
						<td>{{ $d->turno }}</td>
						<td>{{ $d->sexo }}</td>
						<td>{{ $d->cedula }}</td>
						<td>{{ $d->especialidad }}</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>

			@else
			<p class="lead">No se encontraron doctores. <a href="/doctor/create">¡Agrega uno!</a></p>
			@endif
		</div>
		<div class="col-12 d-block d-md-none">


			@if(count($doctors)>0)



			@foreach ($doctors as $doctor)
			<div class="card tarjeta  my-3">

				<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-user-md"></i> {{ $doctor->name}}</p>

				<div class="card-body">
					
					

					<div class="form-inline mb-2">
						
						
						<div class="icon-form">
							
							<i class="fas fa-phone"></i> 
						</div>	
						<div class="icon-texto">
							<span class="color-principal">Teléfono: </span> {{ $doctor->telephoneNumber }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-sun"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Turno: </span> {{ $doctor->turno }}
						</div>
						
					</p>		</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-venus-mars"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Sexo: </span> {{ $doctor->sexo }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-address-card"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Cedula: </span> {{ $doctor->cedula }}
						</div>
						
					</div>


					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fas fa-user-tie"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Especialidad: </span> {{ $doctor->especialidad }}
						</div>
						
					</div>	
					<a href="/doctor/{{$doctor->id}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>
				</div>
				
			</div>

			@endforeach
			@endif
			
		</div>
	</div>
</div>

@endsection

@include('includes.dataTables')

