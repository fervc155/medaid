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
        <span class="color-principal">Teléfono: </span> {{ $doctor->telephone }}
      </div>
    </div>



    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fal fa-venus-mars"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Sexo: </span> {{ $doctor->sex }}
      </div>

    </div>


    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fal fa-address-card"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Cedula: </span> {{ $doctor->schedule }}
      </div>

    </div>


    <div class="form-inline mb-3">
      <div class="icon-form">
        <i class="fal fa-user-tie"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Especialidad: </span> <?php foreach ($doctor->specialities as $speciality) : ?>
                     <a href="{{url('speciality/'.$speciality->id)}}"><span class="badge badge-pill badge-info">{{$speciality->name}}</span></a>
        <?php endforeach ?></td>
      </div>

    </div>
    <div class="text-center">
      <a href="{{url('/doctor/'.$doctor->id)}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>


      @if((Auth::user()->Office() && Auth::user()->id_user == $doctor->office_id) || Auth::user()->Admin())

      <a href="{{url('/doctor/'.$doctor->id).'/edit'}}" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

      <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="doctor-{{$doctor->id}}"> <i class="fas fa-times"></i></button>

      {!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none ', 'id'=>'doctor-'.$doctor->id]) }}
      {!! Form::close() !!}

      @endif


    </div>
  </div>

</div>

@endforeach