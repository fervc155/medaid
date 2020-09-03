@extends('layouts.nav-admin')

@section('content')




<div class="container">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-injured"></i>
          </div>
          <div class="card-title">Registrar doctor</div>
        </div>

        <div class="card-body">
          <form method="POST" class="formulario" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
            @csrf




            @include('forms.create.user')


            @include('forms.create.address')



            <div class="form-group form-inline align-items-end">

              <div class="icon-form">
                <i class="fal fa-address-card"></i>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Cedula</label>
                {{Form::text('schedule', old('schedule'), ['class'=>'form-control'] )}}

              </div>
            </div>

            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-user-tie"></i>
              </div>
              <div class="form-group">

                <select data-size="7" class="selectpicker" name="especialidad[]" id="especialidad" multiple data-style="select-with-transition" title="Especialidad" data-size="sd7">

                  <?php foreach ($specialities as $speciality) : ?>

                    <option value="{{ $speciality->id}}">{{ $speciality->name }}</option>

                  <?php endforeach ?>
                </select>


              </div>
            </div>


            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-hospital"></i>
              </div>

              <div class="form-group">

                <select class="select2" name="office_id" id="office_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

                  <?php foreach ($offices as $office) : ?>

                    <option value="{{ $office->id}}" <?php if (old('office_id') == $office->id) {
                                                        echo "selected";
                                                      } ?>>{{ $office->name }}</option>

                  <?php endforeach ?>
                </select>


              </div>
            </div>

            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-clock"></i>
              </div>



              <div class="form-group">
                <label class="bmd-label-floating">Horario de entrada</label>
                {{Form::time('inTime', old('inTime'), ['class'=>'form-control timepicker timepickerEntrada' ] )}}

              </div>
            </div>

            <div class="form-group form-inline align-items-end d-none formtimepickerSalida">
              <div class="icon-form">
                <i class="fal fa-clock"></i>
              </div>

              <div class="form-group">
                <label class="bmd-label-floating">Horario de salida</label>
                {{Form::time('outTime', old('outTime'), ['class'=>'form-control timepicker timepickerSalida' ] )}}

              </div>
            </div>


            <div class="mb-3 text-center">

              <button type="submit" onclick="" class="btn   btn-primary">
                {{ __('Agregar') }}
              </button>
            </div>

          </form>
        </div>




      </div>
    </div>



  </div>
</div>


</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection