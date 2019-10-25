@extends ('layouts.nav-admin')

@section('content')



<a href="{{ url('/appointment/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fal fa-plus"></i></a>


@if(count($appointments) < 1)
<div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-calendar-check"></i>
			<p class="lead ">No se encontraron citas. <a href="{{ url('/appointment/create')}}">¡Agrega una!</a></p>
		</div>
	</div>
</div>


@else


  <div class="container">


    <div class="row">
      <div class="col-12  d-none d-md-block">

			<div class="card">
					<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-book"></i>
					</div>
					<div class="card-title">Listado de citas</div>
				</div>
				<div class="card-body">
					
        <!-- Si el número de citas es mayor a cero, se mostrarán los datos -->
        <table class="table " id="data_table">
          <thead>
            <tr>
              <th >Fecha</th>
              <th >Hora</th>
              <th >Costo</th>
              <th >Razón</th>
              <th >Médico</th>
              <th >Paciente</th>
              <th >Consultorio</th>
              <th >¿Completada?</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($appointments as $a)
            <tr>
              <td>{{ $a->date }}</td>
              <td>{{ $a->time }}</td>
              <td>${{ $a->cost }} MXN</td>
              <td>{{ $a->description }}</td>
              <td><a class="link" href="{{url('/doctor/'.$a->doctor->id)}}">{{ $a->doctor->name }} </a></td>
              <td><a class="link" href="{{url('/patient/'.$a->patient->dni)}}">{{ $a->patient->name }} </a></td>
              <td><a class="link" href="{{url('/office/'.$a->office->id)}}">{{ $a->office->name }} </a></td>
              <td>
                @if ($a->completed == true)
                Sí
                @else
                No
                @endif
              </td>
              				<td><a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>
									<a href="{{url('/appointment/'.$a->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

							

								</td>
            </tr>
            @endforeach

          </tbody>
        </table>

        <!-- Si no hay registros, el usuario será informado -->
        

      </div>
    </div>
  </div>
      <div class="col-12 d-block d-md-none">
        @foreach ($appointments as $appointment)
        <div class="card  my-5">

        <div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">
						<i class="fal fa-calendar-check"></i>
					</div>
					<div class="card-title">{{ $appointment->patient->name}}</div>
				</div>
          <div class="card-body">



            <div class="form-inline mb-2">


              <div class="icon-form">

                <i class="fal fa-calendar-week"></i> 
              </div>  
              <div class="icon-texto">
                <span class="color-principal">Fecha: </span> {{ $appointment->date }}
              </div>
            </div>

            <div class="form-inline mb-2">
              <div class="icon-form">
                <i class="fal fa-clock"></i>
              </div>

              <div class="icon-texto">

                <span class="color-principal">Hora: </span> {{ $appointment->time }}
              </div>

            </p>    </div>


            <div class="form-inline mb-2">
              <div class="icon-form">
                <i class="fal fa-money-bill-wave"></i>
              </div>

              <div class="icon-texto">

                <span class="color-principal">Costo: </span>$ {{ $appointment->cost }}
              </div>

            </div>


            <div class="form-inline mb-2">
              <div class="icon-form">
                <i class="fal fa-user-md"></i>
              </div>

              <div class="icon-texto">

                <a href="/doctor/{{$appointment->doctor->id}}" class="link"><span class="color-principal">Doctor: </span> {{ $appointment->doctor->name }}</a>
              </div>

            </div>


            <div class="form-inline mb-3">
              <div class="icon-form">
                <i class="fal fa-hospital"></i>
              </div>

              <div class="icon-texto">

                <a href="/office/{{$appointment->office->id}}" class="link"><span class="color-principal">Consultorio: </span> {{ $appointment->office->name }}</a>
              </div>

            </div>

            <div class="form-inline mb-3">
            	<div class="icon-form">
            		<i class="fal fa-question"></i>
            	
            	</div>
            	<div class="icon-texto">
            		<span class="color-principal">Completada:</span>  @if ($a->completed == true)
                Sí
                @else
                No
                @endif
              
            	</div>
            </div>

            <div class="text-center">
            	
            	<a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>
									<a href="{{url('/appointment/'.$a->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

</div>  
          </div>

        </div>

        @endforeach

      </div>

    </div>

				</div>
			</div>
  </div>
        @endif

  @endsection

  @include('includes.dataTables')