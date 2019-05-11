@extends ('layouts.nav')

@section('content')

<div class="contenedor">
		
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

						<h1 class="display-4 text-capitalize  text-center">Consultorios</h1> 
					
				</div>
			</div>



		</section>
	</div>

	<div class="contenedor-fondo">
		
	</div>

	<div class="contenedor-imagen">
		
		<div class="container-fluid mt-0  p-0">

			<div class="row ">
				<div class="col ">

						<img src="{{asset('splash/header/consultorio.jpg')}}"> 
					
				</div>
			</div>



		</div>
	</div>

</div>

<div class="container my-5">
	<div class="row justify-content-end">
		<div class="col-12 col-md-4">
			
		<div class="form-group" align="center">
			<a href="/office/create" role="button" class="btn btn-secondary btn-block"><i class="fas fa-plus"></i> Agregar</a>
		</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-12 d-none d-md-inline table-responsive">
			

	@if(count($offices) > 0)
	<table class="table " id="data_table">
		<thead>
			<tr >
			
				<th >Nombre</th>
				<th >Domicilio</th>
				<th >C.P.</th>
				<th >Ciudad</th>
				<th >País</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($offices as $o)
				<tr>
					
					<td><a class="link" href="/office/{{$o->id}}">{{ $o->name }}</a></td>
					<td>{{ $o->address }}</td>
					<td>{{ $o->postalCode }}</td>
					<td>{{ $o->city }}</td>
					<td>{{ $o->country }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>

	@else
		<p class="lead">No se encontraron consultorios. <a class="link" href="/office/create">¡Agrega uno!</a></p>
	@endif

		</div>
	<div class="col-12 d-block d-md-none">
		


	@if(count($offices)>0)


		@foreach( $offices as $office)
		<table class="table ">
						<tbody>
							<tr><th><i class="fas fa-id-card"></i> ID</th> <td>{{ $office->id }}</td></tr>

							<tr><th><i class="fas fa-home"></i> Domicilio</th> <td>{{ $office->address }}</td></tr>

							<tr><th><i class="fas fa-envelope"></i> CP</th> <td> {{ $office->postalCode }}</td></tr>
							
							<tr><th><i class="fas fa-city"></i> Ciudad</th> <td> {{ $office->city }}</td></tr>

						

							<tr><th><i class="fas fa-flag"></i> Pais</th> <td> {{ $office->country }}</td></tr>

							
						</tbody>
					</table>
		@endforeach
	@endif


		</div>
	</div>
</div>

@endsection

@include('includes.dataTables')