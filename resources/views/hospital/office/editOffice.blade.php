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
          'model'=>$office,
          'route'=> route('office.update.login', ['office'=>$office->id])
          ]);

        </div>




      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card card-profile">
        <div class="card-body">

          @include('forms.edit.image',
          [
          'route'=>route('office.update.image', ['office'=>$office->id]),
          'model'=>$office

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
          <div class="card-title">Datos del oficinista</div>
        </div>

        <div class="card-body">

          <form method="post" action="{{route('office.update', ['office'=>$office->id])}}">

 
            @csrf

            @method('put')

            @include('forms.edit.user',
            [
            'model'=>$office,
            ]);



            @include('forms.edit.address',
            [
            'model'=>$office,
            ]);



 
          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-user"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating">Nombre consultorio</label>


              {{Form::text('name_office', $office->name, ['class'=>'form-control'] )}}
            </div>
          </div>

    
 

          <div class="form-group form-inline align-items-end">

            <div class="icon-form">
              <i class="fal fa-map"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating">Pega el link del mapa de google maps para compartir aqui</label>


              {{Form::text('map', $office->map, ['class'=>'form-control'] )}}
            </div>
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