@extends ('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron">
		<h1 align="center">Lista de médicos</h1> 
		<p align="center">Aquí se encuentra una lista de todos los médicos del hospital. Puedes utilizar la barra de búsqueda para encontrar un médico en específico.</p> 
	</div>


	<form>
		<div class="form-group">
			<label for="busqueda">Buscar</label>
			<input type="text" class="form-control" id="busqueda" aria-describedby="nota" placeholder="¿A quién buscas?">
			<small id="nota" class="form-text text-muted">Ingresa el nombre del médico que buscas.</small>
		</div>
		<button type="submit" class="btn btn-primary">Buscar</button>
	</form>
</div>
<br>

<div class="form-group" align="center">
<a href="/doctor/create" role="button" class="btn btn-success">Agregar</a>
</div>

<div class="container">
	<table class="table table-hover">
		<thead>
			<tr class="table-primary">
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
</div>

@endsection