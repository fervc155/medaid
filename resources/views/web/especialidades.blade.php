@extends('layouts.web')

@section('content')
<div class="cabecera cabecera-30h" style="background-image: url({{asset('splash/header/speciality.jpg')}});">

  <div class="contenedor-titulo ">

  </div>
    <section class="container header-search h-100">

      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-10">

          <h1 class="display-4 text-capitalize  d-none d-md-block text-center">Consulta nuestras especialidades</h1>


          <div id="formulario-especialidades-ajax">
            <div class="form-group">


              <input type="hidden" name="_token" value="{{ csrf_token()}}">


               
              <input type="text" name="search" class="form-control" placeholder="Buscar" value="<?php if (isset($search)) {
                                                                                                  if (strlen($search) > 0) {
                                                                                                    echo $search;
                                                                                                  }
                                                                                                } ?>">

              <button class="btn btn-especialidades-ajax float-right btn-just-icon"><i class="fas fa-search"></i></button>
            </div>
          </div>

        </div>
      </div>



    </section>

</div>




<main class="container">
  <div class="row justify-content-center">

    @foreach($specialities as $speciality)
    @if(count($speciality->doctors)>0)
    <div class="col-6 col-md-4 col-xl-3">
      <div class="card card-pricing">
        <div class="card-body ">
          <h6 class="card-category text-gray">
            <i class="fal fa-user-md"></i> {{count($speciality->doctors)}} Doctores</h6>

          <div class="icon icon-info">
            <i class="fal fa-file-certificate"></i>
          </div>
          <h3 class="card-title"><small>A partir de</small> {{$speciality->price}}/<small>consulta</small></h3>
          <p class="card-description">
            <span class="text-uppercase text-primary">

              {{$speciality->name}}

            </span>
            <div class="stars">
              <?php $estrellas = round($speciality->stars);
              $noEstrellas = 5 - $estrellas; ?>

              @for($i = 0;$i<$estrellas ; $i++) <i class="fas fa-star"></i>
                @endfor
                @for($i = 0;$i<$noEstrellas ; $i++) <i class="fal fa-star"></i>
                  @endfor
            </div>
            <div>
              {{$speciality->stars}}
            </div>
          </p>
          <a href="{{url('/visitante/especialidad/'.$speciality->id)}}" class="btn btn-info btn-round">Ver doctores</a>
        </div>
      </div>




    </div>


    @endif
    @endforeach
  </div>

</main>




@endsection