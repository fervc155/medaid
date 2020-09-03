@foreach ($prescriptions as $prescription)
<div class="card  my-5">

  <div class="card-encabezado">

    <div class="card-cabecera-icono bg-info sombra-2 ">
      <i class="fal fa-envelope-open-text"></i>
    </div>
    <div class="card-title">{{$prescription->created_at}}</div>
  </div>
  <div class="card-body">


    @if(!Auth::isPatient())


    <div class="form-inline mb-2">


      <div class="icon-form">

        <i class="fal fa-user-injured"></i>
      </div>
      <div class="icon-texto">
        <span class="color-principal">Paciente: </span> <a href="{{url('patient/'.$prescription->appointment->patient->dni)}}">{{ $prescription->appointment->patient->name }}</a>
      </div>
    </div>

    @endif


    @if(!Auth::isDoctor())
    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fal fa-user-md"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Doctor: </span>
        <a href="{{url('doctor/'.$prescription->appointment->doctor->id)}}">{{ $prescription->appointment->doctor->name }}</a>
      </div>

    </div>

    @endif


    <div class="form-inline mb-3">
      <div class="icon-form">
        <i class="fal fa-calendar-check"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Cita: </span>
        <a href="{{url('appointment/'.$prescription->appointment->id)}}">{{ $prescription->appointment->id }}</a>
      </div>

    </div>

    <div class="text-center">

      <a href="#" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-download"></i></a>
      @if(Auth::Doctor())
      <button type="button" data-toggle="modal" data-target="#EditarReceta" class="btn btn-actualizar-receta btn-primary btn-just-icon btn-round btn-sm
        " data-id="{{$prescription->id}}" data-content='{{$prescription->content}}'><i class="fal fa-pen"></i></button>
      <!-- Modal Crear -->

      @endif

    </div>
  </div>
</div>
@endforeach