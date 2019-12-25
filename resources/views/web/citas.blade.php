@extends('layouts.web')

@section('content')

<div class="cabecera cabecera-30h" style="background-image: url({{asset('splash/header/doctor.jpg')}});">

  <div class="contenedor-titulo header-search">

    <section class="container h-100">

      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-10">

        <h1 class="display-4 text-capitalize  d-none d-md-block text-center">Tus citas</h1>


     <div id="formulario-citas-ajax">
          <div class="form-group">


            <input type="hidden" name="_token" value="{{ csrf_token()}}">
          

            <input type="hidden" name="url" value="{{url('/visitante/search-citas')}}">
            <input type="text" name="search" class="form-control" placeholder="Agrega tu DNI"  value="<?php if( isset($search)){if(strlen($search)>0){echo $search;}}?>">

            <button  class="btn btn-doctores-ajax float-right btn-just-icon"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>



  </section>
</div>

</div>


<main class="container py-5">


  <div class="row">
    <div class="col-12 ">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-book"></i>
          </div>
          <div class="card-title">Listado de citas: <span  id="nombre-paciente"></span></div>
   
        </div>
        <div class="card-body table-responsive">

          <!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
          <table class="table " id="data_table">
            <thead>
              <tr>
                <th >Fecha</th>             
                <th >Costo</th>
                <th >Médico</th>
                <th >Consultorio</th>
                <th >Status</th>
               
              </tr>
            </thead>

            <tbody id="body-table-citas">
            
           
              
            </tbody>
          </table>

          <!-- Si no hay registros, el usuario será informado -->


        </div>
      </div>
    </div>
  </div>


</main>






@endsection