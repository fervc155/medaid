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
          

            <input type="hidden" name="url" value="{{url('/api/appointment/gettime')}}">
    
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

              <select class="select2" name="patient_dni" id="patient_dni" data-style="select-with-transition" title="Selecciona un paciente" data-size="sd7">
                <optgroup label="Selecciona un paciente">

                <?php foreach ($patients as $patient ): ?>

                  <option value="{{ $patient->dni}}" <?php if($appointment->patient_dni==$patient->dni){echo "selected";} ?>>{{ $patient->name }}</option>

                <?php endforeach ?>
              </optgroup>
              </select>


            </div>
          </div>



         
          <div class="form-group form-inline align-items-end ">
            <div class="icon-form">
              <i class="fal fa-user-md"></i>
            </div>


            
            <div class="form-group "  >
              
              <select class="select2" name="doctor_id" data-style="select-with-transition" title="Selecciona un doctor" data-size="sd7" >
                <optgroup label="Selecciona un doctor">

                  @foreach($offices as $office)
                  <optgroup label="Clinica {{$office->name}}">

                    <?php foreach ($office->doctors as $doctor ): ?>
                      
                      
                      <option value="{{ $doctor->id}}" <?php if($appointment->doctor_id==$doctor->id){ echo "selected";}?>>{{ $doctor->name }} - {{$doctor->speciality->name}}</option>
                      
                    <?php endforeach ?>
                  </optgroup>
                  @endforeach
                </optgroup>
              </select>

              
            </div>




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
          <span class="appointment-reestablecer-hora btn-link btn" >Reestablecer hora</span>
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

              <select class="select2" name="condition" id="condition" data-style="select-with-transition" title="Completada" data-size="sd7">
                <?php foreach ($conditions as $condition): ?>
                  


                  <option value="{{$condition->id}}" <?php if($appointment->condition_id==$condition->id){ echo "selected";} ?>>{{$condition->status}}</option>


                <?php endforeach ?>
              </select>


            </div>

        </div>
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

