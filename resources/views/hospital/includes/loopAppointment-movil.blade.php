@foreach ($appointments as $appointment)
<div class="card  my-5">

  <div class="card-encabezado">

    <div class="card-cabecera-icono bg-info sombra-2 ">
      <i class="fal fa-calendar-check"></i>
    </div>
    <div class="card-title">{{ $appointment->date}} - {{$appointment->time}}</div>
  </div>
  <div class="card-body">


    @if(!Auth::isPatient())

    
    <div class="form-inline mb-2">


      <div class="icon-form">

        <i class="fal fa-user-injured"></i> 
      </div>  
      <div class="icon-texto">
        <span class="color-principal">Paciente: </span> {{ $appointment->patient->name }}
      </div>
    </div>

    @endif


    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fal fa-clock"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Hora: </span> {{ $appointment->time }}
      </div>
    </div>


    <div class="form-inline mb-2">
      <div class="icon-form">
        <i class="fal fa-money-bill-wave"></i>
      </div>

      <div class="icon-texto">

        <span class="color-principal">Costo: </span>$ {{ $appointment->price }}
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

        <a href="/office/{{$appointment->doctor->office->id}}" class="link"><span class="color-principal">Consultorio: </span> {{ $appointment->doctor->office->name }}</a>
      </div>

    </div>

    <div class="form-inline mb-3">
      <div class="icon-form">
        <i class="fal fa-question"></i>

      </div>
      <div class="icon-texto">
        <span class="color-principal">Status:</span> {{$appointment->status}}


      </div>
    </div>

    <div class="text-center">

      <a href="{{url('/appointment/'.$appointment->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>


      @if((Auth::isPatient() && Auth::UserId() == $appointment->patient_dni) || (Auth::isDoctor() && Auth::UserId() == $appointment->doctor_id) || (Auth::isOffice() && Auth::UserId() == $appointment->doctor->office_id) || Auth::Admin() )

      @if($appointment->status=='pending')
      <a href="{{url('/appointment/'.$appointment->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

      @endif

      @endif
    </div>  
  </div>

</div>

@endforeach
