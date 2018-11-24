@extends('layouts.nav')

@section('content')

<h1 align="center">Actualizar consultorio</h1>

<div class="container">
  <div class="row">

    <div class="col">
    </div>

    <div class="col-6">
      {!! Form::open(['action' => ['OfficeController@update', $office->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
      
      <div class="form-group">
       {{Form::label('name', 'Nombre:')}}
       {{Form::text('name', $office->name, ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
     </div>
     <div class="form-group">
      {{Form::label('address', 'Domicilio:')}}
      {{Form::text('address', $office->address, ['class'=>'form-control', 'placeholder' => 'Calle, número y colonia'] )}}
    </div>
    <div class="form-group">
     {{Form::label('postalCode', 'C.P.:')}}
     {{Form::text('postalCode', $office->postalCode, ['class'=>'form-control', 'placeholder' => 'Código Postal'] )}}
   </div>
   <div class="form-group">
     {{Form::label('city', 'Ciudad:')}}
     {{Form::text('city', $office->city, ['class'=>'form-control', 'placeholder' => 'Ciudad'] )}}
   </div>
   <div class="form-group">
     {{Form::label('country', 'País:')}}
     {{Form::text('country', $office->country, ['class'=>'form-control', 'placeholder' => 'País'] )}}
   </div>
   <div class="form-group">
     {{Form::label('image', 'Imagen:')}}
     {{Form::file('image')}}
   </div>

   {{ Form::hidden('_method','PUT')}}
   {{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}

   {!! Form::close() !!}
 </div>

 <div class="col">
 </div>

</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection