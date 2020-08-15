 @foreach ($prescriptions as $prescription)
 <tr>
  <td>{{$prescription->id}}</td>
  <td><a href="{{url('appointment/'.$prescription->appointment->id)}}">{{ $prescription->appointment->id }}</a></td>

  @if(!Auth::isDoctor())
  <td><a href="{{url('doctor/'.$prescription->appointment->doctor->id)}}">{{ $prescription->appointment->doctor->name }}</a></td>
  @endif

  @if(!Auth::isPatient())


  <td><a href="{{url('patient/'.$prescription->appointment->patient->dni)}}">{{ $prescription->appointment->patient->name }}</a></td>

  @endif
  <td>{{$prescription->created_at->diffForHumans() }}</td>


  <td><a href="#"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-download"></i></a>
    @if(Auth::Doctor())
      <button type="button" data-toggle="modal" data-target="#EditarReceta" class="btn btn-actualizar-receta btn-primary btn-just-icon btn-round btn-sm
        " data-id="{{$prescription->id}}" data-content='{{$prescription->content}}'><i class="fal fa-pen"></i></button>

      @endif



    </td>   
  </tr>
  @endforeach
