@extends ('layouts.nav-admin')

@section('content')



<a href="{{ url('/appointment/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fal fa-plus"></i></a>

@if(count($appointments) < 1)
<div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-calendar-check"></i>
      <p class="lead ">No se encontraron citas. <a href="{{ url('/appointment/create')}}">¡Agrega una!</a></p>
    </div>
  </div>
</div>


@else


<div class="container">


  <div class="row">
    <div class="col-12  d-none d-md-block">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-book"></i>
          </div>
          <div class="card-title">Listado de citas</div>
        </div>
        <div class="card-body table-responsive">

          <!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
          <table class="table " id="data_table">
            <thead>
              <tr>
                <th >Fecha</th>
                <th >Hora</th>
                <th >Costo</th>
                <th >Razón</th>
                <th >Médico</th>
                <th >Paciente</th>
                <th >Consultorio</th>
                <th >Status</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
            
                @include('hospital.includes.loopAppointment-desktop')


            </tbody>
          </table>

          <!-- Si no hay registros, el usuario será informado -->


        </div>
      </div>
    </div>
    <div class="col-12 d-block d-md-none">
                @include('hospital.includes.loopAppointment-movil')
      
    </div>

  </div>

</div>

@endif

@endsection

@include('includes.dataTables')