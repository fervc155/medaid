@extends('layouts.web')

@section('content')

<div class="cabecera cabecera-30h" style="background-image: url({{asset('splash/header/doctor.jpg')}});">

  <div class="contenedor-titulo ">

  </div>
    <section class="container header-search h-100">

      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-10">

          <h1 class="display-4 text-capitalize  d-none d-md-block text-center">Consulta nuestros doctores</h1>
          <h2 class="text-center">{{$speciality->name}}</h2>


          <div id="formulario-especialidad-doctores-ajax">
            <div class="form-group">


              <input type="hidden" name="_token" value="{{ csrf_token()}}">
              <input type="hidden" name="speciality" value="{{ $speciality->id}}">


              <input type="hidden" name="url" value="{{url('/visitante/search-doctores/especialidad')}}">
              <input type="text" name="search" class="form-control" placeholder="Buscar" value="<?php if (isset($search)) {
                                                                                                  if (strlen($search) > 0) {
                                                                                                    echo $search;
                                                                                                  }
                                                                                                } ?>">

              <button class="btn btn-doctores-ajax float-right btn-just-icon"><i class="fas fa-search"></i></button>
            </div>
          </div>

        </div>
      </div>



    </section>

</div>



<main class="container pt-5">
  <div class="row">

    @foreach($doctors as $doctor)

    <div class="col-sm-6 col-md-4 ">
      @include('web.includes.doctor-card')


    </div>
    @endforeach
  </div>
</main>






@endsection