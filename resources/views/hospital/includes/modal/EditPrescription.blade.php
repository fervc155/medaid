
<div class="modal fade" id="EditarReceta" tabindex="-1" role="dialog" aria-labelledby="EditarRecetaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditarRecetaLabel"><i class="fal fa-envelope-open-text"></i> Editar Receta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => 'PrescriptionController@update', 'method' => 'POST','class'=>'actualizar-receta']) !!}
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
