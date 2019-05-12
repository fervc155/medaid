@extends('layouts.nav')

@section('content')



<div class="contenedor">
		
	<div class="contenedor-titulo hidden-lg-down">
		
		<section class="container m-0  p-0">

			<div class="row contenedor-titulo align-items-center">
				<div class="col ">

						<h1 class="display-4 text-capitalize  text-center">{{ $office->name }}</h1> 
						<h3 class="text-center text-capitalize">Consultorio</h3>
					
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




<div class="container-fluid tabmenu pl-5 ">
	<div class="row justify-content-center">
		
	
		<ul class="nav  md-tabs" id="Tabmenu" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
		      aria-selected="true"><i class="fas fa-hospital"></i> Informacion</a>
		  </li>
		
		  <li class="nav-item">
		    <a class="nav-link" id="medicos-tab" data-toggle="tab" href="#medicos" role="tab" aria-controls="medicos"
		      aria-selected="false"><i class="fas fa-user-md"></i> Medicos</a>
		  </li>
		</ul>
	</div>
</div>


<div class="tab-content container  pt-5 mb-5" id="TabContenido">
  <div class="tab-pane row justify-content-center fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

		<div class="col-12 tarjeta">
			<div class="row tarjeta-titulo">
					
				<div class="col ">
						
					<h5 class="text-center text-capitalize"><i class="fas fa-user-injured"></i> Datos del Consultorio</h5>
				</div>
			</div>
			<div class="row tarjeta-contenido-blanco p-3">
				<div class="col-12 col-md-6">
					
				<a href="" data-target="#imagenModal" data-toggle="modal">
            		  <img class="img-fluid" src="{{asset('splash/header/consultorio.jpg')}}">
           		 </a>
				         <div class="modal fade" id="imagenModal" tabindex="-1" role="Dialog" aria-labelledby="Imagen 2" aria-hidden="true">
				              <div class="modal-dialog modal-lg" role="document">
				                <div class="moda-content">
				                  <div class="modal-body">
            		  				<img class="img-fluid" src="{{asset('splash/header/consultorio.jpg')}}">
				                  </div>
				                </div>
				              </div>
				        </div>

				</div>

				<div class="col-12 col-md-6">

				<table class="table">
						<tbody>
							<tr><th><i class="fas fa-id-card"></i> ID</th> <td>{{ $office->id }}</td></tr>

							<tr><th><i class="fas fa-home"></i> Domicilio</th> <td>{{ $office->address }}</td></tr>

							<tr><th><i class="fas fa-envelope"></i> CP</th> <td> {{ $office->postalCode }}</td></tr>
							
							<tr><th><i class="fas fa-city"></i> Ciudad</th> <td> {{ $office->city }}</td></tr>

						
							<tr><th><i class="fas fa-phone"></i> Telefono</th> <td> {{ $office->phone }}</td></tr>

							<tr><th><i class="fas fa-flag"></i> Pais</th> <td> {{ $office->country }}</td></tr>

							
						</tbody>
					</table>
				</div>
			
			
			</div>
			<div class="row tarjeta-contenido-blanco align-items-center py-3 ">

			
				<div class="col-12 col-md-6">
					
					<a role="button" class="btn  btn-block btn-info" href="/office/{{$office->id}}/edit"><i class="fas fa-pen"></i> Editar</a>
				</div>
	
				<div class="col-12 col-md-6">
				{!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Eliminar', ['class' => 'btn btn-block btn-danger']) }}
				{!! Form::close() !!}
				</div>
			</div>

		</div>
	
	


  </div>



  <div class="tab-pane fade row justify-content-center" id="medicos" role="tabpanel" aria-labelledby="medicos-tab">
		
	<div class="col-12 tarjeta">
		
		<div class="row tarjeta-titulo">
			<div class="col-12">
				<h5 class="text-center text-capitalize"><i class="fas fa-book"></i> medicos del consultorio</h5>
			</div>
		</div>
		<div class="row tarjeta-contenido-blanco">
			<div class="col-12 p-0 ">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Horario</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($doctors as $d)
					<tr>
						<td > <a href="/doctor/{{$d->id}}"> {{ $d->id }} </a> </td>
						<td> <a href="/doctor/{{$d->id}}">{{ $d->name }}</a> </td>
						<td> {{ $d->pivot->inTime }} - {{ $d->pivot->outTime }} </td>
					</tr>
					@endforeach
				</tbody>
			</table>

			</div> <!--Card-->
		</div> <!--Row-->

	</div> <!--Card-->




  </div>
</div>





@endsection