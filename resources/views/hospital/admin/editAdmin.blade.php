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
          'model'=>$admin,
          'route'=> route('admin.update.login', ['admin'=>$admin->id])
          ]);

        </div>




      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card card-profile">
        <div class="card-body">

          @include('forms.edit.image',
          [
          'route'=>route('admin.update.image', ['admin'=>$admin->id]),
          'model'=>$admin

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
          <div class="card-title">Datos del médico</div>
        </div>

        <div class="card-body">

          <form method="post" action="{{route('admin.update', ['admin'=>$admin->id])}}">

 
            @csrf

            @method('put')

            @include('forms.edit.user',
            [
            'model'=>$admin,
            ])


            <button type="submit" class="btn btn-primary">Guardar</button>
 
          </form>



        </div>




      </div>

    </div>

  </div> <!-- Fila -->
</div> <!-- Contenedor -->


@endsection