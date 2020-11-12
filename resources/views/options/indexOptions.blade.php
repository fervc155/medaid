@extends ('layouts.nav-admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-user"></i>
					</div>
					<div class="card-title">Foto defaul de perfil</div>
				</div>
				<div class="card-body ">

					<form method="POST" action="{{url('options/user-default')}}" enctype="multipart/form-data">
						{{csrf_field()}}

						<div class="form-group form-file-upload form-file-multiple">
							<input type="file" name="photo" class="inputFileHidden">
							<div class="input-group">
								<input type="text" class="form-control inputFileVisible" placeholder="Seleccionar foto de perfil">
								<span class="input-group-btn">
									<button type="button" class="btn btn-link btn-fab ">
										<i class="fal fa-save"></i>
									</button>
								</span>
							</div>
						</div>
						<button type="submit" class="btn btn-primary ">
							<i class="fal fa-save"></i> Guardar
						</button>
					</form>

				</div>
			</div>


		</div>

	 
	</div>
</div>
@endsection