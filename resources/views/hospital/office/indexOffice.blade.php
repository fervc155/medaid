@extends ('layouts.nav-admin')

@section('content')





@if(Auth::user()->Admin())
<a href="{{ url('/office/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fas fa-plus"></i></a>

@endif



@if(count($offices) < 1) <div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-hospital"></i>
      <p class="lead ">No se encontraron consultorios. <a href="{{ url('/office/create')}}">¡Agrega uno!</a></p>
    </div>
  </div>
  </div>


  @else



  <div class="container">
    <div class="row">
      <div class="col-12 d-none d-md-inline">

        <div class="card">
          <div class="card-encabezado">

            <div class="card-cabecera-icono bg-info sombra-2 ">

              <i class="fal fa-list"></i>
            </div>
            <div class="card-title">Listado de Consultorios</div>
          </div>

          <div class="card-body table-responsive">


            <table class="table " id="data_table">
              <thead>
                <tr>
                  <th>Id</th>

                  <th>Nombre</th>
                  <th>Domicilio</th>
                  <th>C.P.</th>
                  <th>Ciudad</th>
                  <th>País</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($offices as $o)
                <tr>

                  <td>{{$o->id}}</td>
                  <td>{{ $o->name }}</td>
                  <td>{{ $o->address }}</td>
                  <td>{{ $o->postalCode }}</td>
                  <td>{{ $o->city }}</td>
                  <td>{{ $o->country }}</td>
                  <td><a href="{{route('office.show', ['id'=>$o->id])}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-hospital"></i></a>

                    @admin
                    <a href="{{url('/office/'.$o->id).'/edit'}}" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                    <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="office-{{$o->id}}"> <i class="fas fa-times"></i></button>

                    {!! Form::open(['action' => ['OfficeController@destroy', $o->id], 'method' => 'POST']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ','id'=>'office-'.$o->id]) }}
                    {!! Form::close() !!}

                    @endadmin

                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>


          </div>
        </div>

      </div>
      <div class="col-12 d-block d-md-none">





        @foreach ($offices as $office)
        <div class="card   my-5">
          <div class="card-encabezado">

            <div class="card-cabecera-icono bg-info sombra-2 ">

              <i class="fal fa-list"></i>
            </div>
            <div class="card-title">{{$office->name}}</div>
          </div>

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

              </p>
            </div>


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

            <div class="text-center">
              <a href="{{route('office.show', ['id'=>$o->id])}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-hospital"></i></a>

              @admin
              <a href="{{url('/office/'.$office->id).'/edit'}}" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

              <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="office-{{$office->id}}"> <i class="fas fa-times"></i></button>

              {!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ', 'id'=>'office-'.$office->id]) }}
              {!! Form::close() !!}

              @endadmin

            </div>



          </div>

        </div>

        @endforeach

      </div>
    </div>
  </div>

  @endif
  @endsection

