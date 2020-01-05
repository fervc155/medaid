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
						<table class="table " id="data_table_today">

						<thead>
							<tr>
								<th >Hora</th>
								<th >Razón</th>
								<th >status</th>
								<th >Paciente</th>
						
							</tr>
						</thead>
						<tbody>
						@foreach ($_appointmentsToday as $appointment)

							@if($appointment->status=='pending' || $appointment->status=='accepted')


							<tr>
								<td>{{$appointment->time}}</td>
								<td>{{$appointment->description}}</td>

								<td>{{$appointment->condition->status}}</td>
								<td><a class="link" href="{{url('/patient/'.$appointment->patient->dni)}}">{{$appointment->patient->name}} </a></td>
							</tr>
							@endif
							@endforeach
						</tbody>
						</table>

						<!-- Si no hay registros, el usuario será informado -->
					

						</div>
			</div>

		</div>

		@if(Auth::Doctor())
		<div class="col-12 col-md-6">
			<div class="card">

					<div class="card-encabezado">

						<div class="card-cabecera-icono bg-info sombra-2 ">

							<i class="fal fa-book"></i>
						</div>
						<div class="card-title">Citas para aceptar</div>
					</div>
					<div class="card-body table-responsive">
					
					<!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
					<table class="table " id="data_table_pending">

						<thead>
							<tr>
								<th>Fecha</th>
								<th >Hora</th>
								<th >Razón</th>
								<th >Paciente</th>
								<th >Acciones</th>
						
							</tr>
						</thead>
						<tbody>
						@foreach ($_appointmentsPending as $pending)
							<tr>
								<td>{{$pending->date}}</td>
								<td>{{$pending->time}}</td>
								<td>{{$pending->description}}</td>
								<td><a class="link" href="{{url('/patient/'.$pending->patient->dni)}}">{{$pending->patient->name}}</a></td>
								<td>					{!! Form::open(['action' => ['AppointmentController@rejected', $pending->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						
						<button type="submit" class="btn btn-round btn-sm btn-danger btn-wait btn-just-icon"><i class="fas fa-times" name="submit"></i></button>
						{!! Form::close() !!}

			

						{!! Form::open(['action' => ['AppointmentController@accepted', $pending->id], 'method' => 'PATCH']) !!}
						{{ Form::hidden('_method', 'PATCH') }}
						<button type="submit" class="btn btn-round btn-sm btn-info btn-wait btn-just-icon"><i class="fas fa-check" name="submit"></i></button>
						{!! Form::close() !!}
</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<!-- Si no hay registros, el usuario será informado -->
					

				</div>
		</div>
	</div>


	@endif

	@if(Auth::Doctor())

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
@endif

@if(Auth::Doctor())
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

		@endif
	</div>
</div>


@endsection
