@extends ('layouts.nav')

@section('content')
<div class="container">
	<div class="jumbotron" align="center">
	    <h1>Lista de citas</h1> 
  	</div>

</div>
<br>

<!-- Se muestran los datos de la entidad en una tabla, utilizando formato Blade de PHP para acceder
	a cada atributo fácilmente -->

<div class="form-group" align="center">
	<a href="/appointment/create" role="button" class="btn btn-success">Agendar</a>
</div>

<div class="container">

	@if(count($appointments) > 0)
	<table class="table table-hover" id="data_table">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Fecha</th>
				<th scope="col">Hora</th>
				<th scope="col">Costo</th>
				<th scope="col">Razón</th>
				<th scope="col">Médico</th>
				<th scope="col">Paciente</th>
				<th scope="col">Consultorio</th>
				<th scope="col">¿Completada?</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($appointments as $a)
				<tr>
					<th scope="row"> <a href="/appointment/{{$a->id}}"> {{ $a->id }} </a> </th>
					<td>{{ $a->date }}</td>
					<td>{{ $a->time }}</td>
					<td>${{ $a->cost }} MXN</td>
					<td>{{ $a->description }}</td>
					<td><a href="/doctor/{{$a->doctor->id}}">{{ $a->doctor->name }} </a></td>
					<td><a href="/patient/{{$a->patient->dni}}">{{ $a->patient->name }} </a></td>
					<td><a href="/office/{{$a->office->id}}">{{ $a->office->name }} </a></td>
					<td>
						@if ($a->completed == true)
							Sí
						@else
							No
						@endif
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

	@else
		<p>No se encontraron citas. <a href="/appointment/create">¡Agenda una!</a></p>
	@endif
</div>

@endsection

@include('includes.dataTables')