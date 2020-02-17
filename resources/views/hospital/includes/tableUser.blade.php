<div class="container">

  <div class="row">
    <div class="col-12 d-none d-md-block">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-list"></i>
          </div>
          <div class="card-title">Listado de Usuarios</div>
        </div>
        
        <div class="card-body table-responsives">
          

          

          <table class="table" id="data_table_pacientes">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Privilegio</th>
                <th>ID cuenta</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @include('hospital.includes.loopUser-desktop');

            </tbody>
          </table>

        </div>
      </div>

    </div>


    <div class="col-12 d-block d-md-none">




      
    </div>



  </div>
</div>
