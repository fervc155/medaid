@extends('layouts.nav-admin')

@section('content')




<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-sign-in"></i>
          </div>
          <div class="card-title">Login</div>
        </div>

        <div class="card-body">

          @include('forms.edit.login',
          [
          'model'=>$patient,
          'route'=> route('patient.update.login', ['patient'=>$patient->id])
          ]);

        </div>




      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card card-profile">
        <div class="card-body">



          @include('forms.edit.image',
          [
          'route'=>route('patient.update.image', ['patient'=>$patient->id]),
          'model'=>$patient

          ]);
        </div>

      </div>
    </div>
  </div>
</div>



<div class="container  mb-5">
  <div class="row justify-content-center">

    <div class="col-12">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-user-md"></i>
          </div>
          <div class="card-title">Datos del paciente</div>
        </div>
        <div class="card-body">


          <form method="post" action="{{route('patient.update', ['patient'=>$patient->id])}}">

            @method('PUT')
            @csrf


            @include('forms.edit.user', [
            'model'=>$patient
            ])


            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-id-card"></i>
              </div>

              <div class="form-group">
                <label class="bmd-label-floating"> CURP</label>


                {{Form::text('curp', $patient->curp, ['class'=>'form-control'] )}}
              </div>
            </div>

            @include('forms.edit.address', [
            'model'=>$patient
            ])



            <div class="form-group form-inline align-items-end ">
              <div class="icon-form">
                <i class="fal fa-user-md"></i>
              </div>



              <div class="form-group ">

                <select class="select2" name="doctor_id" data-style="select-with-transition" title="Selecciona un doctor" data-size="sd7">
                  <optgroup label="Selecciona un doctor">

                    @foreach($offices as $office)
                  <optgroup label="Clinica {{$office->name}}">

                    <?php foreach ($office->doctors as $doctor) : ?>


                      <option value="{{ $doctor->id}}" <?php if ($patient->doctor_id == $doctor->id) {
                                                          echo "selected";
                                                        } ?>>{{ $doctor->name }} </option>

                    <?php endforeach ?>
                  </optgroup>
                  @endforeach
                  </optgroup>
                </select>


              </div>





              <div class="my-5 text-right text-md-center">

                <button type="submit" class="btn btn-primary "><i class="fal fa-pen"> Editar</i></button>
              </div>
          </form>
        </div>


      </div>
    </div>


  </div> <!-- Fila -->
</div> <!-- Contenedor -->




@endsection