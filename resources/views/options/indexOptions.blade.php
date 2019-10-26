
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

		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-moon"></i>
					</div>
					<div class="card-title">Modo nocturno</div>
				</div>
				<div class="card-body ">

					<form action="" method="post">
						  <div class="togglebutton">
                <label>
                  <input type="checkbox" checked="false">
                  <span class="toggle"></span>
                  
                </label>
              </div>
					</form>

				</div>
			</div>


		</div>

		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-lock"></i>
					</div>
					<div class="card-title">usuarios bloqueados</div>
				</div>
				<div class="card-body ">

					<input type="" placeholder="seleccionar foto" name="">

				</div>
			</div>


		</div>

		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-coins"></i>
					</div>
					<div class="card-title">Moneda</div>
				</div>
				<div class="card-body ">


					<form method="POST" action="{{url('options/moneda')}}">
						{{csrf_field()}}


						
							
						<select class="selectpicker" name="moneda" id="moneda" data-style="select-with-transition" title="Seleccionar Moneda" data-size="sd7">
							<option value="MXN $" <?php if($options->Moneda()=='MXN $'){echo "selected";} ?>>MXN</option>
							<option value="USD $" <?php if($options->Moneda()=='USD $'){echo "selected";} ?>>
							USD
							</option>
						</select>

						<input type="submit" class="btn btn-primary">
	</form>

				</div>
			</div>


		</div>


		<div class="col-12">

			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-coins"></i>
					</div>
					<div class="card-title">Idioma</div>
				</div>
				<div class="card-body ">


					<form method="POST" action="{{url('options/idioma')}}">
						{{csrf_field()}}


						
						
						<select class="selectpicker" name="idioma" id="idioma" data-style="select-with-transition" title="Seleccionar idioma" data-size="sd7">
							<option value="esp" <?php if($options->Idioma()=='esp'){echo "selected";} ?>>Español</option>
							<option value="eng" <?php if($options->Idioma()=='eng'){echo "selected";} ?>>Inglés</option>
						</select>

						<input type="submit" class="btn btn-primary">
					</form>
			

				</div>
			</div>


		</div>
	</div>
</div>
@endsection