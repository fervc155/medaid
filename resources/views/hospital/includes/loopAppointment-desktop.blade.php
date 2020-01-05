  @foreach ($appointments as $a)
              <tr>
                <td>{{ $a->date }}</td>
                <td>{{ $a->time }}</td>
                <td>{{ $a->price }}</td>
                <td>{{ $a->description }}</td>
                <td><a class="link" href="{{url('/doctor/'.$a->doctor->id)}}">{{ $a->doctor->name }} </a></td>

                                @if(!Auth::isPatient())

                <td><a class="link" href="{{url('/patient/'.$a->patient->dni)}}">{{ $a->patient->name }} </a></td>
                @endif

                <td><a class="link" href="{{url('/office/'.$a->doctor->office->id)}}">{{ $a->doctor->office->name }} </a></td>
                <td>
                  {{$a->status}}
                </td>
                <td><a href="{{url('/appointment/'.$a->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-calendar-check"></i></a>


                  @if ($a->status=='pending')
                  

                  <a href="{{url('/appointment/'.$a->id.'/edit')}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>
                  
                  @endif



                </td>
              </tr>
              @endforeach