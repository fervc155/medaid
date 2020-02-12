@foreach ($doctors as $doctor)
              <tr>
                <td>{{$doctor->id}}</td>

                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->stars }}</td>
                <td>{{ $doctor->telephoneNumber }}</td>
                <td>{{ $doctor->turno }}</td>
                <td>{{ $doctor->sexo }}</td>

                
                <td><?php foreach ($doctor->specialities as $speciality): ?>
                    
                    <a href="{{url('speciality/'.$speciality->id)}}"><span class="badge badge-pill badge-info">{{$speciality->name}}</span></a>           
                <?php endforeach ?></td>
                <td><a href="{{url('/doctor/'.$doctor->id)}}"  class="btn btn-primary btn-round btn-just-icon btn-sm"><i class="fal fa-user-md"></i></a>



                  @if(Auth::Doctor())

                  <a href="{{url('/doctor/'.$doctor->id).'/edit'}}"  class="btn btn-success btn-round btn-just-icon btn-sm"><i class="fal fa-pen"></i></a>

                  <button class="btn btn-danger btn-round btn-just-icon btn-sm btn-confirm-delete" id='doctor-{{$doctor->id}}' > <i class="fas fa-times"></i></button>

                  {!! Form::open(['action' => ['DoctorController@destroy', $doctor->id], 'method' => 'POST']) !!}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit('Eliminar', ['class' => 'btn-delete d-none', 'id'=>'doctor-'.$doctor->id]) }}
                  {!! Form::close() !!}

                  @endif

                </td>

              </tr>
              @endforeach