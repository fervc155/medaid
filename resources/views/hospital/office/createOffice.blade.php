@extends('layouts.nav-admin')

@section('content')


<div class="container  mb-5">
  <div class="row justify-content-center">

    <div class="col-12 ">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-hospital"></i>
          </div>
          <div class="card-title">Nuevo consultorio</div>
        </div>

        <div class="card-body"> 
         {!! Form::open(['action' => 'OfficeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{csrf_field()}}

         <div class="form-group form-inline align-items-end">

          <div class="icon-form">
            <i class="fal fa-user"></i>
          </div>
          <div class="form-group">
            <label class="bmd-label-floating">Nombre consultorio</label>


            {{Form::text('name', '', ['class'=>'form-control'] )}}
          </div>
        </div>

        <div class="form-group form-inline align-items-end">
         <div class="icon-form">
          <i class="fal fa-home"></i>
        </div>

        <div class="form-group">
          <label class="bmd-label-floating">Direccion</label>


          {{Form::text('address', '', ['class'=>'form-control'] )}}
        </div>
      </div>

      <div class="form-group form-inline align-items-end">
       <div class="icon-form">
        <i class="fal fa-envelope"></i>
      </div>

      <div class="form-group">
        <label class="bmd-label-floating">codigo postal</label>

        {{Form::text('postalCode', '', ['class'=>'form-control'] )}}
      </div>
    </div>

    <div class="form-group form-inline align-items-end">
     <div class="icon-form">
      <i class="fal fa-city"></i>
    </div>

    <div class="form-group">
      <label class="bmd-label-floating">Ciudad</label>

      {{Form::text('city', '', ['class'=>'form-control'] )}}
    </div>
  </div>


  <div class="form-group form-inline align-items-end">
   <div class="icon-form">
    <i class="fal fa-flag"></i>
  </div>
  <div class="form-group">
    <label class="bmd-label-floating">Pais</label>

    {{Form::text('country', '', ['class'=>'form-control'] )}}
  </div>
</div>


<div class="form-group form-inline align-items-end ">
  <div class="icon-form">
    <i class="fal fa-camera-retro"></i>
  </div>

  <div class="form-group has-default form-file-upload form-file-simple">
    <label class="bmd-label-floating">Foto de la clinica</label>


    <input type="text" class="form-control inputFileVisible">
    <input type="file" name="image" class="inputFileHidden">
  </div>
</div>


<div class="text-md-center text-right">
 <button type="submit" class="btn btn-primary "><i class="fal fa-plus"> Agregar</i></button>
</div>
{!! Form::close() !!}
</div>
</div>


</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection