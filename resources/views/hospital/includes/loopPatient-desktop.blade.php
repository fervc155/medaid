          @foreach ($patients as $patient)
              <tr>
                <td>{{$patient->dni}}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->curp }}</td>
                <td>{{ $patient->telephoneNumber }}</td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->address }}</td>
                <td> <a class="link" href="{{url('/doctor/'.$patient->doctor->id)}}"> {{ $patient->doctor->name }} </a></td>


                <td><a href="{{url('/patient/'.$patient->dni)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-injured"></i></a>

                  <a href="{{url('/patient/'.$patient->dni).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                  <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id="paciente-{{$patient->dni}}"> <i class="fas fa-times"></i></button>

                  {!! Form::open(['action' => ['PatientController@destroy', $patient->dni], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Eliminar', ['class' => 'btn-delete  d-none','id'=>'paciente-'.$patient->dni]) }}
                  {!! Form::close() !!}

                </td>

              </tr>
              @endforeach
              