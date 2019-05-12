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
			<a href="/patient/create" role="button" class="btn btn-secondary btn-block"><i class="fas fa-plus"></i> Agregar</a>
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
	
			<table class="table mb-5">
					<tbody>
						<tr><th><i class="fas fa-id-card"></i> DNI</th> <td>{{ $patient->dni }}</td></tr>

						<tr><th><i class="fas fa-id-card"></i> CURP</th> <td>{{ $patient->curp }}</td></tr>

						<tr><th><i class="fas fa-birthday-cake"></i> Fecha de nacimiento:</th> <td> {{ $patient->birthdate }}</td></tr>
						<tr><th><i class="fas fa-phone"></i> Teléfono</th> <td> {{ $patient->telephoneNumber }}</td></tr>

					
						<tr><th><i class="fas fa-venus-mars"></i> Sexo</th> <td> {{ $patient->sex }}</td></tr>

						<tr><th><i class="fas fa-address-card"></i> Domicilio</th> <td> {{ $patient->address }}</td></tr>

						<tr><th><i class="fas fa-envelope"></i> CP</th> <td> {{ $patient->postalCode }}</td></tr>

						<tr><th><i class="fas fa-city"></i> Ciudad</th> <td> {{ $patient->city }}</td></tr>

						<tr><th><i class="fas fa-flag"></i> Pais</th> <td> {{ $patient->country }}</td></tr>

						<tr><th><i class="fas fa-flag"></i> Medico</th> <td><a href="/doctor/{{$patient->doctor->id}}"> {{ $patient->doctor->name }}</a></td></tr>

					</tbody>
			</table>
			@endforeach
		</div>
		@endif

	</div>
</div>

@endsection

@include('includes.dataTables')