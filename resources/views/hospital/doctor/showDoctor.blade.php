@extends('layouts.app')

@section('content')

<h3 align="center">Información de médico:</h3>
<h1 align="center">{{ $doctor->name }}</h1>
<hr>

<div class="container" align="center">
	<p>ID: {{ $doctor->id }}</p>
	<p>Fecha de nacimiento: {{ $doctor->birthdate }}</p>
	<p>Teléfono: {{ $doctor->telephoneNumber }}</p>
	<p>Turno: {{ $doctor->turno }}</p>
	<p>Sexo: {{ $doctor->sexo }}</p>
	<p>Cédula: {{ $doctor->cedula }}</p>
	<p>Especialidad: {{ $doctor->especialidad }}</p>
</div>

<div class="container" align="center">
	<a role="button" class="btn btn-info" href="/doctor/{{$doctor->id}}/edit">Editar</a>
</div><br>

<div class="container" align="center">
	{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
		{{ Form::hidden('_method', 'DELETE') }}
		{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
	{!! Form::close() !!}
</div>

@endsection