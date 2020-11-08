	<div class="modal fade" id="crearReview" tabindex="-1" role="dialog" aria-labelledby="crearReviewLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="crearReviewLabel"><i class="fal fa-envelope-open-text"></i> Calificar mi cita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{route('review.store',['appointment'=>$appointment->id])}}" method="post">
				<div class="modal-body">
					@csrf 
				@method('put')

					<input type="hidden" name="stars" value="">
					<div class="form-group text-center">
						
						<i class="fal click-star fa-star" data-star="1"></i>
						<i class="fal click-star fa-star" data-star="2"></i>
						<i class="fal click-star fa-star" data-star="3"></i>
						<i class="fal click-star fa-star" data-star="4"></i>
						<i class="fal click-star fa-star" data-star="5"></i>
					</div>

					<div class="form-group form-inline align-items-start">

					 

						<div class="icon-form">
							<i class="fal fa-file-certificate"></i>
						</div>
						<div class="form-group">

							{{Form::textarea('comment', '', ['class'=>'form-control','placeholder'=>'Contenido'])}}


						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Enviar reseña</button>
				</div>
</form>
			</div>
		</div>
	</div>