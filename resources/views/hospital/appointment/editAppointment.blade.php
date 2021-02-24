@extends('layouts.nav-admin')

@section('content')




<div class="container mb-5 appointmentAjax">
  <div class="row justify-content-center">

    <div class="col-12 ">
      <div class="card">

        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-calendar-check"></i>
          </div>
          <div class="card-title">Editar cita</div>
        </div>


        <div class="card-body">
          {!! Form::open(['action' => ['AppointmentController@update', $appointment->id], 'method' => 'PUT']) !!}
          <input type="hidden" name="_token" value="{{ csrf_token()}}">

 
          <input type="hidden" name="appointment_id" value="{{$appointment->id}}">

          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-quote-left"></i>
            </div>

            <div class="form-group">

              <label class="bmd-label-floating">Descripcion</label>

              {{Form::text('description', $appointment->description, ['class'=>'form-control'] )}}
            </div>
          </div>


          <select class="d-none" name="doctor_id">

            <option value="{{$appointment->doctor->id}}">></option>
          </select>








          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-calendar-week"></i>
            </div>

            <div class="form-group">

              <label class="bmd-label-floating">Fecha</label>

              {{Form::date('date', $appointment->date, ['class'=>'form-control datepicker'] )}}

            </div>
          </div>



          <input type="hidden" name="my-time" value="{{$appointment->time}}">

          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-clock"></i>
            </div>

            <div class="form-group groupTimepickerCita">


              <label class="bmd-label-floating">Hora</label>

              {{Form::time('time', $appointment->time, ['class'=>'form-control  timepickerCita','readonly'=>'true','id'=>'select-time'] )}}
            </div>
            <span class="appointment-reestablecer-hora btn-link btn">Reestablecer hora</span>
          </div>




          {{ Form::hidden('_method','PUT')}}

          <div class="text-center">
            <button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Editar</i></button>
          </div>
        </div>



      </div>
    </div>
  </div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection