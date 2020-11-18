
<div class="container-fluid p-0">
	<div class="row align-items-center bg-primary">

		<div class="col-12 h-100  col-md-6 col-foto" style="background-image: url({{asset('splash/img/contacto.jpg')}});">
		</div>
		<div class="col-12 col-md-6   align-items-center">
			<div class="row ">
				<div class="col px-5 lead  text-light">


					<h3 class="display-4  text-left text-capitalize"> Envianos un mensaje</h3>

					<div class="formulario formulario-blanco">
						<form action="{{route('contact.us')}}" method="post">
							@csrf



							<div class="form-group form-inline align-items-end">
								<div class="icon-form">
									<i class="fas fa-user"></i>
								</div>


								<div class="form-group">
									<label for="nombre" class="bmd-label-floating">Nombre</label>
									<input type="text" name="name" class="form-control" id="nombre">
								</div>
							</div>

							<div class="form-group form-inline align-items-end">
								<div class="icon-form">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="form-group">
									<label class="bmd-label-floating"> Correo</label>
									<input type="email" class="form-control form-control-claro" name="mail">
								</div>
							</div>

							<div class="form-group form-inline align-items-end">
								<div class="icon-form">
									<i class="fas fa-pen"></i>
								</div>
								<div class="form-group ">
									<label class="bmd-label-floating"> Mensaje</label>
									<textarea type="text" class="form-control form-control-claro" name="message"></textarea>
								</div>
							</div>


							<div class="text-center">
								<button type="submit" class=" btn btn-primary-alt">Enviar</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
