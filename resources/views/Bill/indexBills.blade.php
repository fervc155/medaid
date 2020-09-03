@extends ('layouts.nav-admin')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-12 col-md-6">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-area"></i>
          </div>
          <div class="card-title">Cantidad de citas</div>
        </div>

        <div class="card-body">
          mostrar las cantidad de citas al mes realizadas
          <div id="grafica-cantidad-citas"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-pie-alt"></i>
          </div>
          <div class="card-title">Relacion Citas</div>
        </div>

        <div class="card-body">
          grafica circular, completadas, canceladas, etc
          <div id="grafica-relacion-citas"></div>

        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Medicos con menos citas</div>
        </div>

        <div class="card-body">
          mostrar los peores medicos para corregir su comportamiento
          <div id="grafica-peores-medicos"></div>

        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Medicos con mas citas</div>
        </div>

        <div class="card-body">
          mostrar los mejor medicos para medir su comportamiento
          <div id="grafica-mejores-medicos"></div>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection