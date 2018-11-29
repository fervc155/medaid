@extends('layouts.nav')

@section('content')

<h3 align="center">Información de la cita</h3>
<hr>

<!-- Se accede a los atributos del registro por medio de PHP -->
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

<!-- Se crea un pequeño formulario con un botón para eliminar; al dar clic sobre éste,
	se enviará una petición a la función destroy con el método DELETE de HTTP,
	para eliminar el registro -->
<div class="container" align="center">
	{!! Form::open(['action' => ['AppointmentController@destroy', $appointment->id], 'method' => 'POST']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
	{!! Form::close() !!}
</div><br>

<div class="container" align="center">
	{!! Form::open(['action' => ['AppointmentController@complete', $appointment->id], 'method' => 'PATCH']) !!}
		{{ Form::hidden('_method', 'PATCH') }}
		{{ Form::submit('Atender', ['class' => 'btn btn-success']) }}
	{!! Form::close() !!}
</div>
	

@endsection