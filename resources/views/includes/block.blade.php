@if(!$model->user()->active)

<div class="row">
		<div class="col">
			<div class="alert alert-danger">
				Este usuario ha sido bloqueado de nuestro sistema, por lo tanto no podra ingresar a el
			</div>
		</div>
	</div>

@endif