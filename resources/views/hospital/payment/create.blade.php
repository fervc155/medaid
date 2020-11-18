@extends('layouts.nav-admin')

@section('content')


<div class="container">
	<div class="row">

    <div class="col-12">

      <div class="card">

        <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-calendar-check"></i>
          </div>
          <div class="card-title">Pagar una cita</div>
        </div>

        <div class="card-body">


          <form  method="post" action="{{route('payment.store')}}">

            @csrf

 
            @if(isset($nextStatus))

            <input type="hidden" value="{{$nextStatus}}" name="nextStatus">
            @endif


            @if(isset($appointments))
            <div class="form-group form-inline align-items-end ">
              <div class="icon-form">
                <i class="fal fa-user-md"></i>
              </div>



              <div class="form-group ">

                <select class="select2" name="appointment_id" data-style="select-with-transition" title="Selecciona una cita" data-size="sd7">
        
          

                    @foreach($appointments as $appointment)


                      @if(null==$appointment->payment && $appointment->condition->status != 'rejected' )
                      <option value="{{ $appointment->id}}" <?php if ($appointment->id == old('appointment_id')) { echo "selected";} ?>>{{ $appointment->date }} | {{$appointment->time}} | {{$appointment->condition->status}} | {{$appointment->patient->user()->name}}  | {{$appointment->price}}</option>

                      @endif
                    @endforeach
 
                </select>


              </div>

            </div>

            
            @else

              <input type="hidden" name="appointment_id" value="{{$appointment->id}}">

              <p>{{ $appointment->date }} | {{$appointment->time}} | {{$appointment->condition->status}} | {{$appointment->patient->user()->name}}  | {{$appointment->price}}</p>

            @endif



            <div class="form-group form-inline align-items-end">

              <div class="icon-form">
                <i class="fal fa-calendar-week"></i>
              </div>

              <div class="form-group">

                <label class="bmd-label-floating">Descripcion</label>

                <input type="text" class="form-control" name="description" value="{{old('description')}}">

              </div>
            </div>


            <button class="btn btn-primary">Registrar pago</button>



          </form>
        </div>



      </div>
    </div>
 
  </div>
</div>

@endsection
