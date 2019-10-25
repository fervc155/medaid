@extends ('layouts.nav-admin')

@section('content')


<a href="{{ url('/patient/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fas fa-plus"></i></a>



@if(count($patients) < 1)

<div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-user-injured"></i>
      <p class="lead ">No se encontraron pacientes. <a href="{{ url('/patient/create')}}">¡Agrega uno!</a></p>
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
          <div class="card-title">Listado de pacientes</div>
        </div>
        
				<div class="card-body table-responsives">
					

			

			<table class="table" id="data_table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>CURP</th>
						<th>Teléfono</th>
						<th>Sexo</th>
						<th>Domicilio</th>
						<th>Médico</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($patients as $p)
					<tr>
						<td>{{$p->dni}}</td>
						<td>{{ $p->name }}</td>
						<td>{{ $p->curp }}</td>
						<td>{{ $p->telephoneNumber }}</td>
						<td>{{ $p->sex }}</td>
						<td>{{ $p->address }}</td>
						<td> <a class="link" href="{{url('/doctor/'.$p->doctor->id)}}"> {{ $p->doctor->name }} </a></td>


						 <td><a href="{{url('/patient/'.$p->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

                  <a href="{{url('/patient/'.$p->dni).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                  <button class="btn btn-danger btn-round btn-just-icon btn-sm" onclick="btn_confirm_delete()"> <i class="fas fa-times"></i></button>

                  {!! Form::open(['action' => ['DoctorController@destroy', $p->dni], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ']) }}
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





			@foreach ($patients as $patient)
			<div class="card   my-5">
		 <div class="card-encabezado">

		          <div class="card-cabecera-icono bg-info sombra-2 ">

		            <i class="fal fa-user-injured"></i>
		          </div>
		          <div class="card-title">{{$patient->name}}</div>
		        </div>
		        
				<div class="card-body">
					
					

					<div class="form-inline mb-2">
						
						
						<div class="icon-form">
							
							<i class="fas fa-id-card"></i> 
						</div>	
						<div class="icon-texto">
							<span class="color-principal">CURP </span> {{ $patient->curp }}
						</div>
					</div>



					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-phone"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Telefono </span> {{ $patient->telephoneNumber }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-venus-mars"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Sexo </span> {{ $patient->sex }}
						</div>
						
					</div>


					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-home"></i>
						</div>

						<div class="icon-texto">
							
							<span class="color-principal">Domicilio </span> {{ $patient->address }}
						</div>
						
					</div>	

					<div class="form-inline mb-2">
						<div class="icon-form">
							<i class="fas fa-user-md"></i>
						</div>

						<div class="icon-texto">
							
							<a href="/doctor/{{$patient->doctor->id}}" class="link"><span class="color-principal">Medico </span> {{ $patient->doctor->name }}</a>
						</div>
						
					</div>
					<div class="text-center">
					<a href="{{url('/patient/'.$p->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

                  <a href="{{url('/patient/'.$p->dni).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                  <button class="btn btn-danger btn-round btn-just-icon btn-sm" onclick="btn_confirm_delete()"> <i class="fas fa-times"></i></button>

                  {!! Form::open(['action' => ['DoctorController@destroy', $p->dni], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ']) }}
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