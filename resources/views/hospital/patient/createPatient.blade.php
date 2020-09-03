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
          <div class="card-title">Registrar paciente</div>
        </div>

        <div class="card-body">
          <form method="POST" class="formulario" action="{{ route('patient.store') }}" enctype="multipart/form-data">
            @csrf

            @include('forms.create.user')

            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-id-card"></i>
              </div>

              <div class="form-group">
                <label class="bmd-label-floating"> CURP</label>


                {{Form::text('curp', old('curp'), ['class'=>'form-control'] )}}
              </div>
            </div>

            @include('forms.create.address')






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