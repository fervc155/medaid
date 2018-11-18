@extends('layouts.app')

@section('content')

<h3 align="center">Información del paciente:</h3>
<h1 align="center">{{ $patient->name }}</h1>
<hr>

<div class="container" align="center">
	<p>DNI: {{ $patient->dni }}</p>
	<p>CURP: {{ $patient->curp }}</p>
	<p>Fecha de nacimiento: {{ $patient->birthdate }}</p>
	<p>Teléfono: {{ $patient->telephoneNumber }}</p>
	<p>Sexo: {{ $patient->sex }}</p>
	<p>C.P.: {{ $patient->postalCode }}</p>
	<p>Ciudad: {{ $patient->city }}</p>
	<p>País: {{ $patient->country }}</p>
	<p>Médico: <a href="/doctor/{{$doctor->id}}"> {{ $doctor->name }} </a> </p>
</div>

<div class="container" align="center">
	<a role="button" class="btn btn-info" href="/patient/{{$patient->dni}}/edit">Editar</a>
</div><br>

<div class="container" align="center">
	{!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
	{!! Form::close() !!}
</div>

@endsection