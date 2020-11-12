  @foreach ($appointments as $a)
  <tr>
    <td>{{ $a->date }} | {{ $a->time }}</td>
 
    <td>{{ $a->price }} 
      @if(null==$a->payment)

      @if(Auth::user()->isPatient())
      <a href="{{route('payment.user',['appointment'=>$a->id])}}" class="btn btn-success">Pagar ahora</a>
      @else
      <a href="{{route('payment.doctor',['appointment'=>$a->id])}}" class="btn btn-success">Pagar ahora</a>

      @endif

      @endif
</td>
    <td>{{ $a->description }}</td>

    @if(!Auth::user()->isDoctor())

    <td><a class="link" href="{{url('/doctor/'.$a->doctor->id)}}">{{ $a->doctor->name }} </a></td>

    @endif

    @if(!Auth::user()->isPatient())

    <td><a class="link" href="{{url('/patient/'.$a->patient->dni)}}">{{ $a->patient->name }} </a></td>
    @endif
    @if(!Auth::user()->isDoctor())

    <td><a class="link" href="{{url('/office/'.$a->doctor->office->id)}}">{{ $a->doctor->office->name }} </a></td>

    @endif

    <td>
      {{$a->status}}
    </td>
    <td><a href="{{url('/appointment/'.$a->id)}}" class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>


      @if((Auth::user()->isPatient() && Auth::user()->id_user == $a->patient_dni) || (Auth::user()->isDoctor() && Auth::user()->id_user == $a->doctor_id) || (Auth::user()->isOffice() && Auth::user()->id_user == $a->doctor->office_id) || Auth::user()->Admin() )


      @if ($a->status=='pending')


      <a href="{{url('/appointment/'.$a->id.'/edit')}}" class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

      @endif

      @endif



    </td>
  </tr>
  @endforeach