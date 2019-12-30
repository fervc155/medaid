
<div class="container">

  <div class="row">
    <div class="col-12 d-none d-md-block">
      <div class="card">
        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-list"></i>
          </div>
          <div class="card-title">Listado de medicos</div>
        </div>
        <div class="card-body table-responsive">


          <table class="table " id="data_table">
            <thead>
              <tr>
                <th>Id</th>
                <th >Nombre</th>
                <th >Estrellas</th>
                <th >Teléfono</th>
                <th >Turno</th>
                <th >Sexo</th>
                <th >Especialidad</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                @include('hospital.includes.loopDoctor-desktop')

            </tbody>
          </table>
        </div>
      </div>


    </div>
    <div class="col-12 d-block d-md-none">



                @include('hospital.includes.loopDoctor-movil')



    </div>
  </div>
</div>
