<div class="modal fade" id="EditarReceta" tabindex="-1" role="dialog" aria-labelledby="EditarRecetaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditarRecetaLabel"><i class="fal fa-envelope-open-text"></i> Editar Receta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => 'PrescriptionController@update', 'method' => 'POST','class'=>'actualizar-receta', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        {{ csrf_field()}}

        <div class="form-group form-inline align-items-start">

          {{Form::hidden('prescription_id')}}

          <div class="icon-form">
            <i class="fal fa-file-certificate"></i>
          </div>
          <div class="form-group">
            {{Form::textarea('content', '',['class'=>'form-control','placeholder'=>'Contenido'])}}
          </div>

          <div class="form-group form-inline justify-content-center ">
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
              <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised" style="height: 100px;width: 100px; overflow: hidden;"></div>
              <div>
                <span class="btn btn-raised btn-round btn-primary btn-file">
                  <span class="fileinput-new">Agregar archivo</span>
                  <span class="fileinput-exists">Modificar</span>
                  <input type="file" name="file" value="file" />
                </span>
                <br />
                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
              </div>
            </div>
          </div>

        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Editar</button>
        {!! Form::close() !!}

      </div>
    </div>
  </div>

</div>