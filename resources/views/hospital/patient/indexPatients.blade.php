@extends ('layouts.nav')

@section('content')

<div class="contenedor">

	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

					<h1 class="display-4 text-capitalize  text-center">Pacientes</h1> 
					
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

					<img src="{{asset('splash/header/paciente.jpg')}}"> 
					
				</div>
			</div>



		</div>
	</div>

</div>

<div class="container my-5">
	<div class="row justify-content-end">
		<div class="col-12 col-md-4">
			
			<div class="form-group" align="center">
				<a href="/patient/create" role="button" class="btn btn-wait btn-secondary btn-block"><i class="fas fa-plus"></i> Agregar</a>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-12 table-responsive d-none d-md-block">
			

			@if(count($patients) > 0)
			<table class="table" id="data_table">
				<thead>
					<tr>
						
						<th>Nombre</th>
						<th>CURP</th>
						<th>Fecha de nacimiento</th>
						<th>Teléfono</th>
						<th>Sexo</th>
						<th>Domicilio</th>
						<th>C.P.</th>
						<th>Ciudad</th>
						<th>País</th>
						<th>Médico</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($patients as $p)
					<tr>
						<td><a class="link" href="/patient/{{$p->dni}}">{{ $p->name }}</a></td>
						<td>{{ $p->curp }}</td>
						<td>{{ $p->birthdate }}</td>
						<td>{{ $p->telephoneNumber }}</td>
						<td>{{ $p->sex }}</td>
						<td>{{ $p->address }}</td>
						<td>{{ $p->postalCode }}</td>
						<td>{{ $p->city }}</td>
						<td>{{ $p->country }}</td>
						<td> <a class="link" href="/doctor/{{$p->doctor->id}}"> {{ $p->doctor->name }} </a></td>
					</tr>
					@endforeach
					
				</tbody>
			</table>

			@else
			<p class="lead">No se encontraron pacientes. <a class="link" href="/patient/create">¡Agrega uno!</a></p>
			@endif
		</div>


		@if(count($patients) > 0)

		<div class="col-12 d-block d-md-none">





			@foreach ($patients as $patient)
			<div class="card tarjeta  my-3">

				<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-user-injured"></i> {{ $patient->name}}</p>

				<div class="card-body">
					
					

					<div class="form-inline mb-2">
						
						
						<div class="icon-form">
							
							<i class="fas fa-id-card"></i> 
						</div>	
						<div class="icon-texto">
							<span class="color-principal">CURP </span> {{ $patient->curp }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-calendar-week"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Nacimiento </span> {{ $patient->birthdate }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-phone"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Telefono </span> {{ $patient->telephoneNumber }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-venus-mars"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Sexo </span> {{ $patient->sex }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-home"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Domicilio </span> {{ $patient->address }}
						</div>
						
					</div>	


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-city"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Ciudad </span> {{ $patient->city }}
						</div>
						
					</div>	
					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-user-md"></i>
						</div>

						<div class="icon-texto">
							
							<a href="/doctor/{{$patient->doctor->id}}" class="link"><span class="color-principal">Medico </span> {{ $patient->doctor->name }}</a>
						</div>
						
					</div>
					<a href="/patient/{{$patient->dni}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>
				</div>
				
			</div>

			@endforeach
			
			
		</div>


		@endif

	</div>
</div>

@endsection
@include('includes.dataTables')