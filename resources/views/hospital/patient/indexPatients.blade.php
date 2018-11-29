@extends ('layouts.nav')

@section('content')
<div class="container">
	<div class="jumbotron" align="center">
	    <h1>Lista de pacientes</h1> 
  	</div>
</div>
<br>

<div class="form-group" align="center">
	<a href="/patient/create" role="button" class="btn btn-success">Agregar</a>
</div>

<div class="container">

	@if(count($patients) > 0)
	<table class="table table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">DNI</th>
				<th scope="col">Nombre</th>
				<th scope="col">CURP</th>
				<th scope="col">Fecha de nacimiento</th>
				<th scope="col">Teléfono</th>
				<th scope="col">Sexo</th>
				<th scope="col">Domicilio</th>
				<th scope="col">C.P.</th>
				<th scope="col">Ciudad</th>
				<th scope="col">País</th>
				<th scope="col">Médico</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($patients as $p)
				<tr>
					<th scope="row"> <a href="/patient/{{$p->dni}}"> {{ $p->dni }} </a> </th>
					<td>{{ $p->name }}</td>
					<td>{{ $p->curp }}</td>
					<td>{{ $p->birthdate }}</td>
					<td>{{ $p->telephoneNumber }}</td>
					<td>{{ $p->sex }}</td>
					<td>{{ $p->address }}</td>
					<td>{{ $p->postalCode }}</td>
					<td>{{ $p->city }}</td>
					<td>{{ $p->country }}</td>
					<td> <a href="/doctor/{{$p->doctor->id}}"> {{ $p->doctor->name }} </a></td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

	@else
		<p>No se encontraron pacientes. <a href="/patient/create">¡Agrega uno!</a></p>
	@endif
</div>

@endsection

@include('includes.dataTables')