@foreach ($doctors as $doctor)
              <tr>
                <td>{{$doctor->id}}</td>

                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->stars }}</td>
                <td>{{ $doctor->telephoneNumber }}</td>
                <td>{{ $doctor->turno }}</td>
                <td>{{ $doctor->sexo }}</td>

                
                <td>{{ $doctor->speciality->name}}</td>
                <td><a href="{{url('/doctor/'.$doctor->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>
                  <a href="{{url('/doctor/'.$doctor->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                  <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id='doctor-{{$doctor->id}}' > <i class="fas fa-times"></i></button>

                  {!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$doctor->id]) }}
                  {!! Form::close() !!}

                </td>

              </tr>
              @endforeach