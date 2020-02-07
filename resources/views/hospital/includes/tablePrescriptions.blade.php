<div class="container">

  <div class="row">
    <div class="col-12 d-none d-md-block">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-envelope-open-text"></i>
          </div>
          <div class="card-title">Listado de recetas</div>
        </div>
        
        <div class="card-body table-responsives">

          <table class="table" id="data_table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cita ID</th>
                @if(!Auth::isDoctor())
                  <th>Doctor</th>
                @endif

                @if(!Auth::isPatient())

                  <th>Paciente</th>
                @endif
                <th>Fecha</th>
                <th>Opciones</th>

              </tr>
            </thead>
            <tbody>
                @include('hospital.includes.loopPrescription-desktop')
      
             
            </tbody>
          </table>

        </div>
      </div>

    </div>




  <div class="col-12 d-block d-md-none">
                @include('hospital.includes.loopPrescription-movil')
      
    </div>

  </div>
</div>