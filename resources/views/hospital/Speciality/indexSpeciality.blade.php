@extends ('layouts.nav-admin')

@section('content')

@if(Auth::user()->Office())

<button class="btn btn-success  btn-float" data-toggle="modal" data-target="#AgregarEspecialidad">
  <i class="fal fa-plus"></i>
</button>

<!-- Modal Crear -->
<div class="modal fade" id="AgregarEspecialidad" tabindex="-1" role="dialog" aria-labelledby="AgregarEspecialidadLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AgregarEspecialidadLabel"><i class="fal fa-plus"></i> Agregar Especialidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => 'SpecialityController@store', 'method' => 'POST']) !!}
      <div class="modal-body">
        {{ csrf_field()}}

        <div class="form-group form-inline align-items-end">

          <div class="icon-form">
            <i class="fal fa-file-certificate"></i>
          </div>
          <div class="form-group">

            {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'Nombre especialidad'])}}


          </div>
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Guardar</button>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>



<!-- Modal Actializar -->



<div class="modal fade" id="ActualizarEspecialidad" tabindex="-1" role="dialog" aria-labelledby="ActualizarEspecialidadLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ActualizarEspecialidadLabel"><i class="fal fa-plus"></i>Actualizar especialidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => 'SpecialityController@update','class'=>'actualizar-especialidad', 'method' => 'POST']) !!}
      <div class="modal-body">
        {{ csrf_field()}}

        <div class="form-group form-inline align-items-end">

          <div class="icon-form">
            <i class="fal fa-file-certificate"></i>
          </div>
          <div class="form-group">


            {{Form::hidden('id')}}

            {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'Nuevo Nombre'])}}


          </div>
        </div>
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Guardar</button>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>

@endif

@if(count($specialities) < 1) <div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-user-md"></i>
      <p class="lead ">No se encontraron especialidades.

        @if(Auth::user()->Office())<a href="{{ url('/speciality/create')}}">¡Agrega uno!</a></p>@endif
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
            <div class="card-title">Listado de especialidades</div>
          </div>

          <div class="card-body table-responsives">

            <table class="table" id="data_table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Estrellas</th>
                  <th>Precio</th>
                  <th>Cantidad de doctores</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($specialities as $speciality)
                <tr>
                  <td>{{$speciality->id}}</td>
                  <td>{{ $speciality->name }}</td>
                  <td>{{ $speciality->stars }}</td>

                  <td>{{ $speciality->price }}</td>
                  <td>{{$speciality->doctor_speciality->count()}}</td>


                  <td><a href="{{url('/speciality/'.$speciality->id)}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-file-certificate"></i></a>



                    @if(Auth::user()->Office())

                    <button type="button" class="btn btn-success btn-round btn-just-icon btn-sm btn-actualizar-especialidad" data-id="{{$speciality->id}}" data-cost="{{$speciality->cost}}" data-name="{{$speciality->name}}" data-toggle="modal" data-target="#ActualizarEspecialidad"><i class="fal fa-pen"></i></button>

                    @if (count($speciality->doctor_speciality)<1) <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id='speciality-{{$speciality->id}}'> <i class="fas fa-times"></i></button>



                      {!! Form::open(['action' => ['SpecialityController@destroy'], 'method' => 'POST']) !!}

                      <input type="hidden" name="id" value="{{$speciality->id}}">
                      {{csrf_field()}}

                      {{ method_field('DELETE')}}




                      {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'speciality-'.$speciality->id]) }}
                      {!! Form::close() !!}
                      @endif


                  </td>
                  @endif

                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>

      </div>


      <div class="col-12 d-block d-md-none">





        @foreach ($specialities as $speciality)
        <div class="card   my-5">
          <div class="card-encabezado">

            <div class="card-cabecera-icono bg-info sombra-2 ">

              <i class="fal fa-file-certificate"></i>
            </div>
            <div class="card-title">{{$speciality->name}}</div>
          </div>

          <div class="card-body">


            <div class="form-inline mb-2">
              <div class="icon-form">
                <i class="fas fa-user-md"></i>
              </div>

              <div class="icon-texto">

                <span class="color-principal">Cantidad de medicos </span> {{count($speciality->doctor_speciality)}}
              </div>

            </div>
            <div class="form-inline mb-2">
              <div class="icon-form">
                <i class="fas fa-user-md"></i>
              </div>

              <div class="icon-texto">

                <span class="color-principal">Precio </span> {{$speciality->price}}
              </div>

            </div>
            <div class="text-center">
              <a href="{{url('/speciality/'.$speciality->id)}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-file-certificate"></i></a>



              @if(Auth::user()->Office())
              <button type="button" class="btn btn-success btn-round btn-just-icon btn-sm btn-actualizar-especialidad" data-id="{{$speciality->id}}" data-name="{{$speciality->name}}" data-toggle="modal" data-target="#ActualizarEspecialidad"><i class="fal fa-pen"></i></button>

              @if (count($speciality->doctor_speciality)<1) <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id='speciality-{{$speciality->id}}'> <i class="fas fa-times"></i></button>



                {!! Form::open(['action' => ['SpecialityController@destroy'], 'method' => 'POST']) !!}

                <input type="hidden" name="id" value="{{$speciality->id}}">
                {{csrf_field()}}

                {{ method_field('DELETE')}}




                {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'speciality-'.$speciality->id]) }}
                {!! Form::close() !!}
                @endif


                </td>
                @endif


            </div>
          </div>

        </div>

        @endforeach


      </div>



    </div>
  </div>

  @endif
  @endsection
  