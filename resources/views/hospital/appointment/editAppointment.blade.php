@extends('layouts.nav')

@section('content')

<h1 align="center">Actualizar cita</h1>

<!-- Se crea un formulario cuya información se envía el método "Update" del controlador,
  utilizando el método PUT de HTTP-->

<div class="container">
    <div class="row">

        <div class="col">
        </div>

        <div class="col-6">
        {!! Form::open(['action' => ['AppointmentController@update', $appointment->id], 'method' => 'PUT']) !!}

            <div class="form-group">
               {{Form::label('date', 'Fecha de la cita:')}}
               {{Form::date('date', $appointment->date, ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('time', 'Hora de la cita:')}}
               {{Form::time('time', $appointment->time, ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('cost', 'Costo de la cita ($ MXN):')}}
               {{Form::number('cost', $appointment->cost, ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('description', 'Razón de la cita:')}}
               {{Form::text('description', $appointment->description, ['class'=>'form-control', 'placeholder' => 'Razón o motivo'] )}}
           </div>

           <div class="form-group">
               {{Form::label('doctor_id', 'ID del médico:')}}
               {{Form::text('doctor_id', $appointment->doctor_id, ['class'=>'form-control', 'placeholder' => 'ID del médico'] )}}
           </div>

           <div class="form-group">
               {{Form::label('patient_dni', 'DNI del paciente:')}}
               {{Form::text('patient_dni', $appointment->patient_dni, ['class'=>'form-control', 'placeholder' => 'ID del paciente'] )}}
           </div>

           <div class="form-group">
               {{Form::label('office_id', 'ID del consultorio:')}}
               {{Form::text('office_id', $appointment->office_id, ['class'=>'form-control', 'placeholder' => 'ID del consultorio'] )}}
           </div>

           <div class="form-group">
               {{Form::label('comments', 'Comentarios sobre la cita: (opcional)')}}
               {{Form::text('comments', $appointment->comments, ['class'=>'form-control', 'placeholder' => 'Comentarios o conclusiones'] )}}
           </div>

           <div class="form-group">
               {{Form::label('completed', '¿La cita ha sido completada?')}}
               {{Form::select('completed', [true => 'Sí', false => 'No'])}}
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