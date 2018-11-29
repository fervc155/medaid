@extends('layouts.nav')

@section('content')

<h1 align="center">Agregar médico</h1>

<div class="container">
    <div class="row">

        <div class="col">
        </div>

        <div class="col-6">
            {!! Form::open(['action' => 'DoctorController@store', 'method' => 'POST']) !!}
            <div class="form-group">
             {{Form::label('name', 'Nombre:')}}
             {{Form::text('name', '', ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
         </div>
         <div class="form-group">
            {{Form::label('birthdate', 'Fecha de nacimiento:')}}
             {{Form::date('birthdate', '', ['class'=>'form-control', 'placeholder' => 'Fecha de nacimiento'] )}}
         </div>
         <div class="form-group">
             {{Form::label('telephoneNumber', 'Número de teléfono:')}}
             {{Form::text('telephoneNumber', '', ['class'=>'form-control', 'placeholder' => 'Número telefónico'] )}}
         </div>
         <div class="form-group">
             {{Form::label('turno', 'Turno:')}}
             {{Form::select('turno', ['Vespertino' => 'Vespertino', 'Matutino' => 'Matutino'])}}
         </div>
         <div class="form-group">
             {{Form::label('sexo', 'Sexo:')}}
             {{Form::select('sexo', ['M' => 'M', 'F' => 'F'])}}
         </div>
         <div class="form-group">
             {{Form::label('cedula', 'Cedula:')}}
             {{Form::text('cedula', '', ['class'=>'form-control', 'placeholder' => 'Cedula'] )}}
         </div>
         <div class="form-group">
             {{Form::label('especialidad', 'Especialidad:')}}
             {{Form::text('especialidad', '', ['class'=>'form-control', 'placeholder' => 'Especialidad'] )}}
         </div>
         {{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
         {!! Form::close() !!}
     </div>

     <div class="col">
     </div>

 </div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection