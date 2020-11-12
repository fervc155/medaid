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
          <table class="table " id="data_table_citas">
            <thead>
              <tr>
                <th>Fecha y hora</th>
              
                <th>Costo</th>
                <th>Razón</th>
                @if(!Auth::user()->isDoctor())

                <th>Médico</th>
                @endif

                @if(!Auth::user()->isPatient())
                <th>Paciente</th>
                @endif
                @if(!Auth::user()->isDoctor())

                <th>Consultorio</th>
                @endif

                <th>Status</th>
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