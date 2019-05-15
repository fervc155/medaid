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



			@foreach ($offices as $office)
			<div class="card tarjeta  my-3">

				<p class="lead bg-primary text-light card-header card-title"> <i class="fas fa-user-md"></i> {{ $office->name}}</p>

				<div class="card-body">
					
					

					<div class="form-inline mb-2">
						
						
						<div class="icon-form">
							
							<i class="fas fa-home"></i> 
						</div>	
						<div class="icon-texto">
							<span class="color-principal">Domicilio: </span> {{ $office->address }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-envelope"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">CP: </span> {{ $office->postalCode }}
						</div>
						
					</p>		</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-city"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Ciudad: </span> {{ $office->city }}
						</div>
						
					</div>


					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fas fa-flag"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Pais: </span> {{ $office->country }}
						</div>
						
					</div>


					<a href="/office/{{$office->id}}" class=" btn btn-wait btn-primary btn-block"><i class="fas fa-eye"></i> Ver mas</a>
				</div>
				
			</div>

			@endforeach
			@endif
			
		</div>
	</div>
</div>

@endsection

@include('includes.dataTables')