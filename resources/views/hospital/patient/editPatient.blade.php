@extends('layouts.app')

@section('content')
<section class="container my-5">
  <div class="row">
    <div class="col">
      
      <h1 class="text-center display-4 text-capitalize color-principal">Editar Paciente</h1>
    </div>
  </div>
</section>
<div class="container tarjeta">
  <div class="row justify-content-center">

   

    <div class="col-md-6 col-12">

      {!! Form::open(['action' => ['PatientController@update', $patient->dni], 'method' => 'PUT']) !!}
      <div class="form-group form-inline">
       <div class="icon-form">
        <i class="fas fa-user"></i>
      </div>
      {{Form::text('name', $patient->name, ['class'=>'form-control', 'placeholder' => 'Nombre'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-id-card"></i>
      </div>

      {{Form::text('curp', $patient->curp, ['class'=>'form-control', 'placeholder' => 'CURP'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-birthday-cake"></i>
      </div>

      {{Form::text('birthdate', '', ['class'=>'form-control datepicker2 ','placeholder' => 'Fecha de nacimiento'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-phone"></i>
      </div>
      {{Form::text('telephoneNumber', $patient->telephoneNumber, ['class'=>'form-control', 'placeholder' => 'Número telefónico'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-venus-mars"></i>
      </div>
      {{Form::select('sex', ['M' => 'M', 'F' => 'F'], null , ['class'=> 'form-control'])}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-home"></i>
      </div>
      {{Form::text('address', $patient->address, ['class'=>'form-control', 'placeholder' => 'Calle, número y colonia'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-envelope"></i>
      </div>
      {{Form::text('postalCode', $patient->postalCode, ['class'=>'form-control', 'placeholder' => 'Código Postal'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-city"></i>
      </div>
      {{Form::text('city', $patient->city, ['class'=>'form-control', 'placeholder' => 'Ciudad'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-flag"></i>
      </div>
      {{Form::text('country', $patient->country, ['class'=>'form-control', 'placeholder' => 'País'] )}}
    </div>
    <div class="form-group form-inline">
      <div class="icon-form">
        <i class="fas fa-user-md"></i>
      </div>
      {{Form::text('doctor_id', $patient->doctor_id, ['class'=>'form-control', 'placeholder' => 'ID del médico del paciente'] )}}
    </div>

    {{ Form::hidden('_method','PUT')}}
    {{ Form::submit('Aceptar', ['class'=>'btn btn-block btn-primary']) }}

    {!! Form::close() !!}
  </div>


</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection