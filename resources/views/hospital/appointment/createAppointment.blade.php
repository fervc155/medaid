@extends('layouts.nav')

@section('content')

<h1 align="center">Agregar cita</h1>

<!-- Se crea un formulario cuya información se envía el método "Store" en el controlador
  utilizando el método POST de HTPP-->

<div class="container">
    <div class="row">

        <div class="col">
        </div>

        <div class="col-6">
        {!! Form::open(['action' => 'AppointmentController@store', 'method' => 'POST']) !!}

            <div class="form-group">
               {{Form::label('date', 'Fecha de la cita:')}}
               {{Form::date('date', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('time', 'Hora de la cita:')}}
               {{Form::time('time', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('cost', 'Costo de la cita ($ MXN):')}}
               {{Form::number('cost', '', ['class'=>'form-control'] )}}
           </div>

           <div class="form-group">
               {{Form::label('description', 'Razón de la cita:')}}
               {{Form::text('description', '', ['class'=>'form-control', 'placeholder' => 'Razón o motivo'] )}}
           </div>

           <div class="form-group">
               {{Form::label('doctor_id', 'ID del médico:')}}
               {{Form::text('doctor_id', '', ['class'=>'form-control', 'placeholder' => 'ID del médico'] )}}
           </div>

           <div class="form-group">
               {{Form::label('patient_dni', 'DNI del paciente:')}}
               {{Form::text('patient_dni', '', ['class'=>'form-control', 'placeholder' => 'ID del paciente'] )}}
           </div>

           <div class="form-group">
               {{Form::label('office_id', 'ID del consultorio:')}}
               {{Form::text('office_id', '', ['class'=>'form-control', 'placeholder' => 'ID del consultorio'] )}}
           </div>
           
       {{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
       {!! Form::close() !!}
   </div>

   <div class="col">
   </div>

</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection