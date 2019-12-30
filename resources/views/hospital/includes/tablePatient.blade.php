<div class="container">

  <div class="row">
    <div class="col-12 d-none d-md-block">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-list"></i>
          </div>
          <div class="card-title">Listado de pacientes</div>
        </div>
        
        <div class="card-body table-responsives">
          

          

          <table class="table" id="data_table_pacientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Teléfono</th>
                <th>Sexo</th>
                <th>Domicilio</th>
                <th>Médico</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @include('hospital.includes.loopPatient-desktop');

            </tbody>
          </table>

        </div>
      </div>

    </div>


    <div class="col-12 d-block d-md-none">



      @include('hospital.includes.loopPatient-movil');


      
    </div>



  </div>
</div>
