@extends('layouts.nav')

@section('content')

<h3 align="center">Información del consultorio:</h3>
<h1 align="center">{{ $office->name }}</h1>
<hr>


<div class="row">
	<div class="col" style="margin:20px">
		<img style="width:100%, margin:50px" src="/storage/images/{{$office->image}}">
	</div>

	<div class="col" style="margin:20px">
		<p>ID: {{ $office->id }}</p>
		<p>Domicilio: {{ $office->address }}</p>
		<p>C.P.: {{ $office->postalCode }}</p>
		<p>Ciudad: {{ $office->city }}</p>
		<p>País: {{ $office->country }}</p>

		<div class="container" align="center">
			<a role="button" class="btn btn-info" href="/office/{{$office->id}}/edit">Editar</a>
		</div><br>

		<div class="container" align="center">
			{!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
			{!! Form::close() !!}
		</div>

	</div>
</div>
<hr>

<h3>Médicos que encontrarás en {{ $office->name }}:</h3>
<table class="table table-striped table-responsive">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Horario</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($doctors as $d)
		<tr>
			<th scope="row"> <a href="/doctor/{{$d->id}}"> {{ $d->id }} </a> </th>
			<td> {{ $d->name }} </td>
			<td> {{ $d->pivot->inTime }} - {{ $d->pivot->outTime }} </td>
		</tr>
		@endforeach
	</tbody>
</table>


@endsection