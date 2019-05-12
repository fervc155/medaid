@extends('layouts.nav')

@section('content')


<section class="container my-5">
  <div class="row">
    <div class="col">

      <h1 class="text-center display-4 text-capitalize color-principal">Editar Cita</h1>
    </div>
  </div>
</section>
<!-- Se crea un formulario cuya información se envía el método "Update" del controlador,
  utilizando el método PUT de HTTP-->

  <div class="container tarjeta">
    <div class="row justify-content-center">


      <div class="col-12 col-md-6">
        <!-- El contenido se enviará a 'update' con el método PUT -->
        {!! Form::open(['action' => ['AppointmentController@update', $appointment->id], 'method' => 'PUT']) !!}

        <div class="form-group form-inline">
         <div class="icon-form">
          <i class="fas fa-calendar-week"></i>
        </div>
        {{Form::date('date', '', ['class'=>'form-control datepicker','placeholder' => 'Selecciona la Fecha'] )}}

      </div>

      <div class="form-group form-inline">
        <div class="icon-form">
          <i class="fas fa-clock"></i>
        </div>

        {{Form::time('time', '', ['class'=>'form-control timepicker','placeholder' => 'Selecciona la hora'] )}}
      </div>

      <div class="form-group form-inline">
        <div class="icon-form">
          <i class="fas fa-money-bill-wave"></i>
        </div>
        {{Form::number('cost', '', ['class'=>'form-control','placeholder' => 'Precio'] )}}
      </div>

      <div class="form-group form-inline">
       <div class="icon-form">
        <i class="fas fa-tag"></i>
      </div>
      {{Form::text('description', $appointment->description, ['class'=>'form-control', 'placeholder' => 'Razón o motivo'] )}}
    </div>

    <div class="form-group form-inline">
     <div class="icon-form">
      <i class="fas fa-user-md"></i>
    </div>
    {{Form::text('doctor_id', $appointment->doctor_id, ['class'=>'form-control', 'placeholder' => 'ID del médico'] )}}
  </div>

  <div class="form-group form-inline">
   <div class="icon-form">
    <i class="fas fa-user-injured"></i>
  </div>
  {{Form::text('patient_dni', $appointment->patient_dni, ['class'=>'form-control', 'placeholder' => 'ID del paciente'] )}}
</div>

<div class="form-group form-inline">
 <div class="icon-form">
  <i class="fas fa-hospital"></i>
</div>
{{Form::text('office_id', $appointment->office_id, ['class'=>'form-control', 'placeholder' => 'ID del consultorio'] )}}
</div>

<div class="form-group form-inline">
 <div class="icon-form">
  <i class="fas fa-quote-left"></i>
</div>
{{Form::text('comments', $appointment->comments, ['class'=>'form-control', 'placeholder' => 'Comentarios o conclusiones'] )}}
</div>

<div class="form-group form-inline">
 <div class="icon-form">
  <i class="fas fa-check"></i>
</div>
{{Form::select('completed', [true => 'Sí', false => 'No'],null, ['class'=> 'form-control'])}}
</div>

{{ Form::hidden('_method','PUT')}}
<div class="my-3">
 <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"> Agregar</i></button>
</div>      
{!! Form::close() !!}
</div>


</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection