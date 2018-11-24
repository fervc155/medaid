@extends ('layouts.nav')

@section('content')
<div class="container">
	<div class="jumbotron" align="center">
	    <h1>Lista de citas</h1> 
  	</div>

</div>
<br>

<div class="form-group" align="center">
	<a href="/appointment/create" role="button" class="btn btn-success">Agregar</a>
</div>

<div class="container">

	@if(count($appointments) > 0)
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Fecha</th>
				<th scope="col">Hora</th>
				<th scope="col">Costo</th>
				<th scope="col">Razón</th>
				<th scope="col">ID del médico</th>
				<th scope="col">ID del paciente</th>
				<th scope="col">ID del consultorio</th>
				<th scope="col">¿Completada?</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($appointments as $a)
				<tr>
					<th scope="row"> <a href="/appointment/{{$a->id}}"> {{ $a->id }} </a> </th>
					<td>{{ $a->date }}</td>
					<td>{{ $a->time }}</td>
					<td>{{ $a->cost }}</td>
					<td>{{ $a->description }}</td>
					<td>{{ $a->doctor_id }}</td>
					<td>{{ $a->patient_dni }}</td>
					<td>{{ $a->office_id }}</td>
					<td>{{ $a->completed }}</td>
				</tr>
			@endforeach
			{{ $appointments->links() }}
		</tbody>
	</table>

	@else
		<p>No se encontraron citas. <a href="/appointment/create">¡Agenda una!</a></p>
	@endif
</div>

@endsection