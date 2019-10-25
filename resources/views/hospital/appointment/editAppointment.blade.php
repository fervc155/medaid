@extends('layouts.nav-admin')

@section('content')




<div class="container mb-5">
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

          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-calendar-week"></i>
            </div>

            <div class="form-group">

              <label class="bmd-label-floating">Fecha</label>

              {{Form::date('date', $appointment->date, ['class'=>'form-control datepicker'] )}}

            </div>
          </div>

          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-clock"></i>
            </div>

            <div class="form-group">


              <label class="bmd-label-floating">Hora</label>

              {{Form::time('time', $appointment->time, ['class'=>'form-control timepicker'] )}}
            </div>
          </div>
          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-money-bill-wave"></i>
            </div>


            <div class="form-group">

              <label class="bmd-label-floating">Precio</label>

              {{Form::number('cost', $appointment->cost, ['class'=>'form-control'] )}}
            </div>          
          </div>

          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-quote-left"></i>
            </div>

            <div class="form-group">

              <label class="bmd-label-floating">Descripcion</label>

              {{Form::text('description', $appointment->description, ['class'=>'form-control'] )}}
            </div>
          </div>


          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-user-injured"></i>
            </div>


            <div class="form-group">

              <select class="selectpicker" name="patient_dni" id="patient_dni" data-style="select-with-transition" title="Selecciona un paciente" data-size="sd7">

                <?php foreach ($patients as $patient ): ?>

                  <option value="{{ $patient->dni}}" <?php if($appointment->patient_dni==$patient->dni){echo "selected";} ?>>{{ $patient->name }}</option>

                <?php endforeach ?>
              </select>


            </div>
          </div>


          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-user-md"></i>
            </div>

            <div class="form-group">

              <select class="selectpicker" name="doctor_id" id="doctor_id" data-style="select-with-transition" title="Selecciona un doctor" data-size="sd7">

                <?php foreach ($doctors as $doctor ): ?>

                  <option value="{{ $doctor->id}}" <?php if($appointment->doctor_id==$doctor->id){ echo "selected";} ?>>{{ $doctor->name }}</option>

                <?php endforeach ?>
              </select>


            </div>

          </div>

          <div class="form-group form-inline align-items-end">
            <div class="icon-form">
              <i class="fal fa-hospital"></i>
            </div>

            <div class="form-group">

              <select class="selectpicker" name="office_id" id="office_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

                <?php foreach ($offices as $office ): ?>

                  <option value="{{ $office->id}}" <?php if($appointment->office_id==$office->id){ echo "selected";} ?>>{{ $office->name }}</option>

                <?php endforeach ?>
              </select>


            </div>
          </div>
          <div class="form-group form-inline align-items-end">
           <div class="icon-form">
            <i class="fal fa-quote-left"></i>
          </div>

          <div class="form-group">
            <label  class="bmd-label-floating">Comentarios</label>
          {{Form::text('comments', $appointment->comments, ['class'=>'form-control'] )}}
          </div>
        </div>

        <div class="form-group form-inline align-items-end">
         <div class="icon-form">
          <i class="fal fa-check"></i>
        </div>

        <div class="form-group">
                    <div class="form-group">

              <select class="selectpicker" name="completed" id="completed" data-style="select-with-transition" title="Completada" data-size="sd7">


                  <option value="1" <?php if($appointment->completed=='true'){ echo "selected";} ?>>Si</option>
                  <option value="0" <?php if($appointment->completed=='false'){ echo "selected";} ?>>No</option>

              </select>


            </div>

        </div>
      </div>

      {{ Form::hidden('_method','PUT')}}

      <div class="text-center">
        <button type="submit" class="btn btn-primary "><i class="fal fa-plus"> Agregar</i></button>
      </div>
    </div>



  </div>
</div>
</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection

