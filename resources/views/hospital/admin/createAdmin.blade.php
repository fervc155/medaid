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
          <div class="card-title">Registrar administrador</div>
        </div>

        <div class="card-body">
          <form method="POST" class="formulario" action="{{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf




            @include('forms.create.user')


     


     
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