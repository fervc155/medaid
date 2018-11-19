@extends('layouts.app')

@section('content')

<h3 align="center">Información del consultorio:</h3>
<h1 align="center">{{ $office->name }}</h1>
<hr>

<div class="card">

	<div class="row">
		<div class="col">
			<img style="width:100%, margin:10px" src="/storage/images/{{$office->image}}">
		</div>

		<div class="col">
			<p>ID: {{ $office->id }}</p>
			<p>Domicilio: {{ $office->address }}</p>
			<p>C.P.: {{ $office->postalCode }}</p>
			<p>Ciudad: {{ $office->city }}</p>
			<p>País: {{ $office->country }}</p>

			<div class="container" align="center">
				<a role="button" class="btn btn-info" href="/office/{{$office->dni}}/edit">Editar</a>
			</div><br>

			<div class="container" align="center">
				{!! Form::open(['action' => ['OfficeController@destroy', $office->dni], 'method' => 'POST']) !!}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
				{!! Form::close() !!}
			</div>

		</div>
	</div>

</div>


@endsection