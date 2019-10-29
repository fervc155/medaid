
@extends ('layouts.nav-admin')

@section('content')


<a href="{{ url('/doctor/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fal fa-plus"></i></a>


@if(count($doctors) < 1)
<div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-user-md"></i>
			<p class="lead ">No se encontraron doctores. <a href="{{ url('/doctor/create')}}">¡Agrega uno!</a></p>
		</div>
	</div>
</div>


@else


<div class="container">

	<div class="row">
		<div class="col-12 d-none d-md-block">
			<div class="card">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-list"></i>
					</div>
					<div class="card-title">Listado de medicos</div>
				</div>
				<div class="card-body table-responsive">


					<table class="table " id="data_table">
						<thead>
							<tr>
								<th>Id</th>
								<th >Nombre</th>
								<th >Teléfono</th>
								<th >Turno</th>
								<th >Sexo</th>
								<th >Especialidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($doctors as $d)
							<tr>
								<td>{{$d->id}}</td>

								<td>{{ $d->name }}</td>
								<td>{{ $d->telephoneNumber }}</td>
								<td>{{ $d->turno }}</td>
								<td>{{ $d->sexo }}</td>

								
								<td>{{ $d->speciality->name}}</td>
								<td><a href="{{url('/doctor/'.$d->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>
									<a href="{{url('/doctor/'.$d->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

									<button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id='doctor-{{$d->id}}' > <i class="fas fa-times"></i></button>

									{!! Form::open(['action' => ['DoctorController@destroy', $d->id], 'method' => 'POST']) !!}
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$d->id]) }}
									{!! Form::close() !!}

								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>


		</div>
		<div class="col-12 d-block d-md-none">





			@foreach ($doctors as $doctor)
			<div class="card  my-5">
				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">
						<i class="fal fa-user-md"></i>
					</div>
					<div class="card-title">{{ $doctor->name}}</div>
				</div>

				<div class="card-body">



					<div class="form-inline mb-2">


						<div class="icon-form">

							<i class="fal fa-phone"></i> 
						</div>  
						<div class="icon-texto">
							<span class="color-principal">Teléfono: </span> {{ $doctor->telephoneNumber }}
						</div>
					</div>

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-sun"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Turno: </span> {{ $doctor->turno }}
						</div>

					</p>    </div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-venus-mars"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Sexo: </span> {{ $doctor->sexo }}
						</div>

					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fal fa-address-card"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Cedula: </span> {{ $doctor->cedula }}
						</div>

					</div>


					<div class="form-inline mb-3">
						<div class="icon-form">
							<i class="fal fa-user-tie"></i>
						</div>

						<div class="icon-texto">

							<span class="color-principal">Especialidad: </span> {{ $doctor->speciality->name }}
						</div>

					</div>  
					<div class="text-center">
						<a href="{{url('/doctor/'.$doctor->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>
						<a href="{{url('/doctor/'.$doctor->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

						<button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="doctor-{{$doctor->id}}"> <i class="fas fa-times"></i></button>

						{!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ', 'id'=>'doctor-'.$doctor->id]) }}
						{!! Form::close() !!}


					</div>
				</div>

			</div>

			@endforeach

		</div>
	</div>
</div>

@endif
@endsection

@include('includes.dataTables')

