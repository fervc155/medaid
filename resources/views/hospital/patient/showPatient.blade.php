@extends('layouts.app')

@section('content')

<h3 align="center">Información del paciente:</h3>
<h1 align="center">{{ $patient->name }}</h1>
<hr>

<div class="container">
<div class="row">
	<div class="container" align="center">
		<p>DNI: {{ $patient->dni }}</p>
		<p>CURP: {{ $patient->curp }}</p>
		<p>Fecha de nacimiento: {{ $patient->birthdate }}</p>
		<p>Teléfono: {{ $patient->telephoneNumber }}</p>
		<p>Sexo: {{ $patient->sex }}</p>
		<p>Domicilio: {{ $patient->address }}</p>
		<p>C.P.: {{ $patient->postalCode }}</p>
		<p>Ciudad: {{ $patient->city }}</p>
		<p>País: {{ $patient->country }}</p>
		<p>Médico: <a href="/doctor/{{$doctor->id}}"> {{ $doctor->name }} </a> </p>
	</div>

	<div class="container" align="center">
		<a role="button" class="btn btn-info" href="/patient/{{$patient->dni}}/edit">Editar</a>
	</div><br><br>

	<div class="container" align="center">
		{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
		{!! Form::close() !!}
	</div>
</div>

<hr>
<div class="row">
	<div class="card">
		<h5 class="card-title">Citas pendientes:</h5>
		<table class="table table-striped table-responsive">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Costo</th>
					<th>Razón</th>
					<th>ID del médico</th>
					<th>ID del consultorio</th>
					<th>Atender</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($appointments as $a)
				@if ($a->completed == false)
				<tr>
					<th scope="row"> <a href="/appointment/{{$a->id}}"> {{ $a->id }} </a> </th>
					<td>{{ $a->date }}</td>
					<td>{{ $a->time }}</td>
					<td>{{ $a->cost }}</td>
					<td>{{ $a->description }}</td>
					<td>{{ $a->doctor_id }}</td>
					<td>{{ $a->office_id }}</td>
					<td><button class="btn-success">Jiji</button></td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div> <!--Card-->
</div> <!--Row-->
</div> <!-- Container-->

@endsection