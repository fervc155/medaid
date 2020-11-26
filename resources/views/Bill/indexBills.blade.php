@extends ('layouts.nav-admin')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-12  mt-5">
      @livewire('bi.select')
    </div>
      <div class="col-12  col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Ingresos totales</div>
        </div>

        <div class="card-body">
         
          @livewire('bi.total')

  
        </div>
      </div>
    </div>
    
       <div class="col-12 html-print col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-pie-alt"></i>
          </div>
          <div class="card-title">Relacion especialidades</div>
        </div>

        <div class="card-body">
           @livewire('bi.circle')
        </div>
      </div>
    </div>

 
       <div class="col-12 html-print">

      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-area"></i>
          </div>
          <div class="card-title">Cantidad de citas</div>
        </div>

        <div class="card-body">
          mostrar las cantidad de citas por especialidad
          @livewire('bi.appointment.quantity')
        </div>
      </div>
    </div>

    <div class="col-12 html-print col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Medicos con menos citas</div>
        </div>

        <div class="card-body">
          mostrar los peores medicos para corregir su comportamiento
          @livewire('bi.doctor.worst')
        </div>
      </div>
    </div>
    <div class="col-12 html-print col-md-6">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Medicos con mas citas</div>
        </div>

        <div class="card-body">
          mostrar los mejor medicos para medir su comportamiento
          @livewire('bi.doctor.best')

        </div>
      </div>
    </div>

    <div class="col-12 html-print">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-bar"></i>
          </div>
          <div class="card-title">Ganancias de los ultimos 12 meses</div>
        </div>

        <div class="card-body">
          mostrar las ganancias por mes
          @livewire('bi.appointment.gain')

        </div>
      </div>
    </div>

  </div>
</div>

    <div class="col-12 html-print">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-chart-pie-alt"></i>
          </div>
          <div class="card-title">Regresion lineal</div>
        </div>

        <div class="card-body">
           @livewire('bi.regression')
        </div>
      </div>
    </div>
@endsection