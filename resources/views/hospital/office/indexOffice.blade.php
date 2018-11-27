@extends ('layouts.nav')

@section('content')
<div class="container">
	<div class="jumbotron" align="center">
	    <h1>Lista de consultorios</h1> 
  	</div>
</div>
<br>

<div class="form-group" align="center">
	<a href="/office/create" role="button" class="btn btn-success">Agregar</a>
</div>

<div class="container">

	@if(count($offices) > 0)
	<table class="table table-hover" id="data_table">
		<thead>
			<tr class="table-primary">
				<th scope="col">ID</th>
				<th scope="col">Nombre</th>
				<th scope="col">Domicilio</th>
				<th scope="col">C.P.</th>
				<th scope="col">Ciudad</th>
				<th scope="col">País</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($offices as $o)
				<tr>
					<th scope="row"> <a href="/office/{{$o->id}}"> {{ $o->id }} </a> </th>
					<td>{{ $o->name }}</td>
					<td>{{ $o->address }}</td>
					<td>{{ $o->postalCode }}</td>
					<td>{{ $o->city }}</td>
					<td>{{ $o->country }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

	@else
		<p>No se encontraron consultorios. <a href="/office/create">¡Agrega uno!</a></p>
	@endif
</div>

@endsection

@include('includes.dataTables')