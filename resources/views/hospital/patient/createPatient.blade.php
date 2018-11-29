@extends('layouts.app')

@section('content')

<h1 align="center">Agregar paciente</h1>

<div class="container">
    <div class="row">

        <div class="col">
        </div>

        <div class="col-6">
        {!! Form::open(['action' => 'PatientController@store', 'method' => 'POST']) !!}
            <div class="form-group">
               {{Form::label('name', 'Nombre:')}}
               {{Form::text('name', '', ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
           </div>
           <div class="form-group">
               {{Form::label('curp', 'CURP:')}}
               {{Form::text('curp', '', ['class'=>'form-control', 'placeholder' => 'CURP'] )}}
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
               {{Form::label('sex', 'Sexo:')}}
               {{Form::select('sex', ['M' => 'M', 'F' => 'F'])}}
           </div>
           <div class="form-group">
               {{Form::label('address', 'Domicilio:')}}
               {{Form::text('address', '', ['class'=>'form-control', 'placeholder' => 'Calle, número y colonia'] )}}
           </div>
           <div class="form-group">
               {{Form::label('postalCode', 'C.P.:')}}
               {{Form::text('postalCode', '', ['class'=>'form-control', 'placeholder' => 'Código Postal'] )}}
           </div>
           <div class="form-group">
               {{Form::label('city', 'Ciudad:')}}
               {{Form::text('city', '', ['class'=>'form-control', 'placeholder' => 'Ciudad'] )}}
           </div>
           <div class="form-group">
               {{Form::label('country', 'País:')}}
               {{Form::text('country', '', ['class'=>'form-control', 'placeholder' => 'País'] )}}
           </div>
           <div class="form-group">
               {{Form::label('doctor_id', 'ID del médico:')}}
               {{Form::text('doctor_id', '', ['class'=>'form-control', 'placeholder' => 'ID del médico del paciente'] )}}
           </div>
       {{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
       {!! Form::close() !!}
   </div>

   <div class="col">
   </div>

</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection