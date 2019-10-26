@extends('layouts.nav-admin')

@section('content')



<div class="container">
	<div class="row">
			<div class="col-12 col-md-6">
			<div class="card">

					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-calendar-check"></i>
						</div>
						<div class="card-title">Citas para hoy</div>
					</div>
					<div class="card-body table-responsive">
					
						<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
						<table class="table " id="data_table">

						<thead>
							<tr>
								<th >Hora</th>
								<th >Razón</th>
								<th >Paciente</th>
						
							</tr>
						</thead>
						<tbody>
						@for ($i =0; $i<5;$i++)
							<tr>
								<td>12:12</td>
								<td>Gripa la wea cosmica</td>
								<td><a class="link" href="">el wey que se enferma </a></td>
							</tr>
							@endfor
						</tbody>
						</table>

						<!-- Si no hay registros, el usuario será informado -->
					

						</div>
			</div>

		</div>
		<div class="col-12 col-md-6">
			<div class="card">

					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-book"></i>
						</div>
						<div class="card-title">Nuevas citas</div>
					</div>
					<div class="card-body table-responsive">
					
					<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
					<table class="table " id="data_table">

						<thead>
							<tr>
								<th>Fecha</th>
								<th >Hora</th>
								<th >Razón</th>
								<th >Paciente</th>
						
							</tr>
						</thead>
						<tbody>
						@for ($i =0; $i<5;$i++)
							<tr>
								<td>12/12/12</td>
								<td>12:12</td>
								<td>Gripa la wea cosmica</td>
								<td><a class="link" href="">el wey que se enferma </a></td>
							</tr>
							@endfor
						</tbody>
					</table>

					<!-- Si no hay registros, el usuario será informado -->
					

				</div>
		</div>
	</div>

		<div class="col-12 col-md-6">
			<div class="card">

					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-coin"></i>
						</div>
						<div class="card-title">Ingresos mensuales</div>
					</div>


        <div class="card-body">
        	mostrar las ventas al mes
        	<div id="grafica-ventas-mes"></div>
        </div>
			
		</div>
	</div>

				<div class="col-12 col-md-6">
			<div class="card">

					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-user"></i>
						</div>
						<div class="card-title">Nuevos usuarios</div>
					</div>
					<div class="card-body table-responsive">
					
					<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
					<table class="table " id="data_table">

						<thead>
							<tr>
								<th >Nombre</th>
								<th >Correo</th>
								<th >Usuario</th>
						
							</tr>
						</thead>
						<tbody>
						@for ($i =0; $i<5;$i++)
							<tr>
								<td>Fer</td>
								<td>fer@mail.com</td>
								<td><a class="link" href="">Paciente</a></td>
							</tr>
							@endfor
						</tbody>
					</table>

					<!-- Si no hay registros, el usuario será informado -->
					

				</div>
			</div>

		</div>
	</div>
</div>


@endsection
