@extends ('layouts.nav')

@section('content')
<div class="container">
	<div class="jumbotron" align="center">
		<h1>Lista de médicos</h1> 
	</div>
</div>
<br>

<div class="form-group" align="center">
	<a href="/doctor/create" role="button" class="btn btn-success">Agregar</a>
</div>

<div class="container">

	@if(count($doctors) > 0)
	<table class="table table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nombre</th>
				<th scope="col">Fecha de nacimiento</th>
				<th scope="col">Teléfono</th>
				<th scope="col">Turno</th>
				<th scope="col">Sexo</th>
				<th scope="col">Cédula</th>
				<th scope="col">Especialidad</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($doctors as $d)
			<tr>
				<th scope="row"> <a href="/doctor/{{$d->id}}"> {{ $d->id }} </a> </th>
				<td>{{ $d->name }}</td>
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
	<p>No se encontraron doctores. <a href="/doctor/create">¡Agrega uno!</a></p>
	@endif
</div>

@endsection

@include('includes.dataTables')

