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
          {!! Form::open(['route' => 'office.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
     

          @csrf




            @include('forms.create.user')


            @include('forms.create.address')



          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-user"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating">Nombre consultorio</label>


              {{Form::text('name_office', '', ['class'=>'form-control'] )}}
            </div>
          </div>

    
 

          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-map"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating">Mapa</label>


              {{Form::text('map', '', ['class'=>'form-control'] )}}
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