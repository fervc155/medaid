@extends('layouts.web')

@section('content')

<div class="contenedor">
  
  <div class="contenedor-titulo hidden-lg-down">
    
    <section class="container m-0  p-0">

      <div class="row contenedor-titulo align-items-center">
        <div class="col ">

          <h1 class="display-4 text-capitalize  d-none d-md-block text-center">contacto <img  src="{{asset('splash/img/logowhite.png')}}" ></h1>
          
        </div>
      </div>



    </section>
  </div>

  <div class="contenedor-fondo">
    
  </div>

  <div class="contenedor-welcome">
    
    <div class="container-fluid mt-0  p-0">

      <div class="row ">
        <div class="col ">

          <img class="img-fluid" src="{{asset('splash/img/hospital.gif')}}"> 
          
        </div>
      </div>



    </div>
  </div>

</div>

<section class="container-fluid d-block d-md-none bg-primary">
  <div class="row">
    <div class="col p-3">
      <h1 class="h2 text-capitalize text-light  text-center">Bienvenido a <img  src="{{asset('splash/img/logowhite.png')}}" class="w-50" ></h1>
    </div>
  </div>
</section>






<!-- Footer -->



@endsection