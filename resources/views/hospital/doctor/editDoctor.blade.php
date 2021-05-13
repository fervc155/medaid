@extends('layouts.nav-admin')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-file-certificate"></i>
          </div>
          <div class="card-title">Login</div>
        </div>

        <div class="card-body">

          @include('forms.edit.login',
          [
          'model'=>$doctor,
           ]);

        </div>




      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card card-profile">
        <div class="card-body">

          @include('forms.edit.image',
          [
           'model'=>$doctor

          ]);
        </div>

      </div>
    </div>
  </div>
</div>
<div class="container mb-5">
  <div class="row justify-content-center">

    <div class="col-12">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-md"></i>
          </div>
          <div class="card-title">Especialidades</div>
        </div>

        <div class="card-body">
          

        
      @livewire('doctor.edit.specialities', ['doctor'=>$doctor])
        </div>


      </div>

    </div>

  </div> <!-- Fila -->
</div> <!-- Contenedor -->


<div class="container mb-5">
  <div class="row justify-content-center">

    <div class="col-12">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-md"></i>
          </div>
          <div class="card-title">Datos del médico</div>
        </div>

        <div class="card-body">

          <form method="post" action="{{route('doctor.update', ['doctor'=>$doctor->id])}}">

 
            @csrf

            @method('put')

            @include('forms.edit.user',
            [
            'model'=>$doctor,
            ])



            @include('forms.edit.address',
            [
            'model'=>$doctor,
            ])







            <div class="form-group form-inline align-items-end">

              <div class="icon-form">
                <i class="fal fa-address-card"></i>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Cedula</label>
                {{Form::text('schedule', $doctor->schedule, ['class'=>'form-control'] )}}

              </div>
            </div>

          



            @if(count($offices)>0)
            <div class="card-encabezado mt-5">

              <div class="card-cabecera-icono bg-info sombra-2 ">

                <i class="fal fa-user-md"></i>
              </div>
              <div class="card-title">Consultorio </div>
            </div>




            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-hospital"></i>
              </div>

              <div class="form-group">

                <select class="select2" name="office_id" id="office_id" data-style="select-with-transition" title="Selecciona un consultorio" data-size="sd7">

                  <?php foreach ($offices as $office) : ?>

                    <option value="{{ $office->id}}" <?php if ($doctor->id == $office->id) {
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
                {{Form::time('inTime',$doctor->inTime, ['class'=>'form-control timepicker timepickerEntrada' ] )}}

              </div>
            </div>

            <div class="form-group form-inline align-items-end d-none formtimepickerSalida">
              <div class="icon-form">
                <i class="fal fa-clock"></i>
              </div>

              <div class="form-group">
                <label class="bmd-label-floating">Horario de salida</label>
                {{Form::time('outTime', $doctor->outTime, ['class'=>'form-control timepicker timepickerSalida' ] )}}

              </div>
            </div>

            @endif



            <div class="my-5 text-right text-md-center">

              <button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Agregar</i></button>
            </div>
          </form>



        </div>




      </div>

    </div>

  </div> <!-- Fila -->
</div> <!-- Contenedor -->


@endsection