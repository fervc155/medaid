@extends('layouts.nav')

@section('content')

<h3 align="center">Información de la cita</h3>
<hr>

<div class="container" align="center">
	<p>ID: {{ $appointment->id }}</p>
	<p>Fecha: {{ $appointment->date }}</p>
	<p>Hora: {{ $appointment->time }}</p>
	<p>Costo: {{ $appointment->cost }}</p>
	<p>Razón: {{ $appointment->description }}</p>
	<p>ID del médico: {{ $appointment->doctor_id }}</p>
	<p>ID del paciente: {{ $appointment->patient_dni }}</p>
	<p>ID del consultorio: {{ $appointment->office_id }}</p>
	<p>Comentarios: {{ $appointment->comments }}</p>
	<p>¿Completada?: {{ $appointment->completed }} </p>
</div>

<div class="container" align="center">
	<a role="button" class="btn btn-info" href="/appointment/{{$appointment->id}}/edit">Editar</a>
</div><br>

<div class="container" align="center">
	{!! Form::open(['action' => ['AppointmentController@destroy', $appointment->id], 'method' => 'POST']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
	{!! Form::close() !!}
</div>

@endsection