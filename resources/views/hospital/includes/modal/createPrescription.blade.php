	<div class="modal fade" id="AgregarReceta" tabindex="-1" role="dialog" aria-labelledby="AgregarRecetaLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AgregarRecetaLabel"><i class="fal fa-envelope-open-text"></i> Agregar Receta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				{!! Form::open(['action' => 'PrescriptionController@store', 'method' => 'POST']) !!}
				<div class="modal-body">
					{{ csrf_field()}}

					<div class="form-group form-inline align-items-start">

						{{Form::hidden('appointment_id',$appointment->id)}}

						<div class="icon-form">
							<i class="fal fa-file-certificate"></i>
						</div>
						<div class="form-group">

							{{Form::textarea('content', '', ['class'=>'form-control','placeholder'=>'Contenido'])}}


						</div>
					</div> 


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Guardar</button>
				</div>
				{!! Form::close() !!}

			</div>
		</div>
	</div>
