@extends('layouts.nav-admin')

@section('content')

<div class="container">




  <div class="row  ">


    <div class=" col-12 col-md-4">




      <div class="card card-profile">

        <img src="{{asset($appointment->patient->Profileimg)}}" class="img-fluid">

        <h5 class="p-3 mt-0 h4 text-light bg-secondary text-center text-capitalize"><i class="fal fa-book"></i> {{$appointment->patient->name}}</h5>

        <div class="card-body">


          <div class="form-inline mb-2">


            <div class="color-principal">

              <i class="fal fa-calendar-week"></i> FOLIO:
            </div>  

            {{ $appointment->id }}









          </div>



          <div class="form-inline mb-2">


            <div class="color-principal">

              <i class="fal fa-calendar-week"></i> Fecha:
            </div>  

            {{ $appointment->date }}

          </div>


          
          <div class="form-inline mb-2">


            <div class="color-principal">

              <i class="fal fa-clock"></i> Hora:
            </div>  

            {{ $appointment->time }}

          </div>


          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-money-bill-wave"></i> Precio:
            </div>
            {{ $appointment->price }}

          </div>
          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-tag"></i> Descripcion:
            </div>                                  
            {{ $appointment->description }}

          </div>



          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-quote-left"></i> Comentarios:
            </div>
            {{ $appointment->comment }}

          </div>


          <div class="form-inline mb-2">
            <div class="color-principal">
              <i class="fal fa-user-md"></i> Doctor: 
            </div>



            <a href="{{url('/doctor/'.$appointment->doctor_id)}}" class="link">{{ $appointment->doctor->name }}</a>


          </div>


          <div class="form-inline mb-3">
            <div class="color-principal">
              <i class="fal fa-hospital"></i> Consultorio:
            </div>


            <a href="{{url('/office/'.$appointment->doctor->office_id)}}" class="link">
              {{ $appointment->doctor->office->name }}</a>
            </div>


            @if($appointment->status=='pending')
            
              @if(Auth::Patient())

            <a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/appointment/'.$appointment->id)}}/edit"> <i class="fal fa-pen"></i> Editar</a>
            @endif

            @endif




            @if($appointment->condition->status =='pending')

              @if(Auth::Patient())




              {!! Form::open(['action' => ['AppointmentController@rejected', $appointment->id], 'method' => 'PATCH']) !!}
              {{ Form::hidden('_method', 'PATCH') }}
              {{ Form::submit('Rechazar', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
              {!! Form::close() !!}

              @endif




              @if(Auth::Doctor())

                {!! Form::open(['action' => ['AppointmentController@accepted', $appointment->id], 'method' => 'PATCH']) !!}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('Aceptar', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
                {!! Form::close() !!}
              @endif

            @endif


            @if($appointment->condition->status =='accepted')
              @if(Auth::Patient())


              {!! Form::open(['action' => ['AppointmentController@cancelled', $appointment->id], 'method' => 'PATCH']) !!}
              {{ Form::hidden('_method', 'PATCH') }}
              {{ Form::submit('Cancelar', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
              {!! Form::close() !!}
              @endif

              @if(Auth::Doctor())



                {!! Form::open(['action' => ['AppointmentController@complete', $appointment->id], 'method' => 'PATCH']) !!}
                {{ Form::hidden('_method', 'PATCH') }}
                {{ Form::submit('Atender', ['class' => 'btn  mt-3 btn-wait btn-round btn-secondary']) }}
                {!! Form::close() !!}

              @endif

            @endif



            @if(Auth::Doctor())


              @if($appointment->condition->status =='lost')


                @if($appointment->IsToday)

                  

                  @if($appointment->CanUpdateLate)


                    {!! Form::open(['action' => ['AppointmentController@late', $appointment->id], 'method' => 'PATCH']) !!}
                    {{ Form::hidden('_method', 'PATCH') }}
                    {{ Form::submit('Aceptar con retraso', ['class' => 'btn  mt-3 btn-wait btn-danger btn-round btn-secondary']) }}
                    {!! Form::close() !!}


                  @endif

                @endif
              @endif


            @endif




          </div>

        </div>
      </div>










      <div class=" col-12 col-md-8 ">

        <div class=" row ">


          <div class="col-12 ">

            <div class="card caja-contador">



              <span class="caja-contador-icono"><i class="fal fa-calendar-check"></i></span>              <div class="card-body">
                <h3>{{$appointment->status}}</h3>


              </div>
            </div>


          </div>

          <div class="col-12 ">

            <div class="card caja-contador">
              <span class="caja-contador-icono"><i class="fal fa-user-injured"></i></span>
              <div class="card-body">


                <a href="{{url('/patient/'.$appointment->patient_dni)}}" class="link"><h3>{{$appointment->patient->name}}</h3></a>
                <p>Paciente</p>
              </div>
            </div>
          </div>
          <div class="col-12   ">

            <div class="card caja-contador">
              <span class="caja-contador-icono">
                <i class="fal fa-user-md"></i>
                
              </span>
              <div class="card-body">


                <a href="{{url('/doctor/'.$appointment->doctor_id)}}" class="link"><h3>{{$appointment->doctor->name}}</h3></a>
                <p>Doctor</p>
              </div>
            </div>
          </div>

          <div class="col-12   ">

            <div class="card caja-contador ">
              <span class="caja-contador-icono">
                
                <i class="fal fa-hospital"></i>
              </span>
              <div class="card-body">


                <a href="{{url('/appointment/'.$appointment->doctor->office_id)}}" class="link"><h3>{{$appointment->doctor->office->name}}</h3></a>
                <p>Consultorio</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>




  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-encabezado">

            <div class="card-cabecera-icono bg-info sombra-2 ">

              <i class="fal fa-comment"></i> 
            </div>
            <div class="card-title"> Envia un comentario </div>
          </div>
          <div class="card-body ">

            <form action="{{url('/appointment/comment/register')}}" method="post" id="appointment-comment-form">

              <input type="hidden" name="_token" value="{{ csrf_token()}}">
              


              <!-- <div class="" id="editor-container" ></div> -->

              <div class="form-group label-floating">
                <label class="form-control-label bmd-label-floating" for="exampleInputTextarea">Escribe tu comentario</label>
                <textarea name="comment" rows="5" class="form-control"></textarea>
              </div>

              <input type="hidden" name="appointment_id" value="{{$appointment->id}}">

              <input type="hidden" name="user_id" value="1">


              <button type="submit" class="btn btn-primary float-right btn-round">Enviar</button>


              <!-- <span id="submit-comment" class="btn btn-primary float-right btn-round">ajax Enviar</span> -->
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-encabezado">

            <div class="card-cabecera-icono bg-info sombra-2 ">

              <i class="fal fa-comment"></i>
            </div>
            <div class="card-title">{{count($appointment->comments)}} comentarios </div>
          </div>
          <div class="card-body ">
            <div class="media-area ">

              @foreach($appointment->comments as $comment )


              <div class="media">
                <a class="float-left" href="#pablo">
                  <div class="avatar">
                    <img class="media-object" src="./assets/img/faces/avatar.jpg" alt="...">
                  </div>
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Nombre
                    <small>&#xB7; {{$comment->created_at}}</small>
                  </h4>
                  <p>{{$comment->comment}}</p>
                  <div class="media-footer">

                    <form action="{{url('/appointment/comment/delete')}} " method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <input type="hidden" name="comment_id" value="{{ $comment->id}}">



                      <span  comment-id="{{$comment->id}}" class="btn btn-danger  btn btn-just-icon btn-round btn-confirm-delete-comment"><i class="fal fa-times"></i></span>

                      <button type="submit" id="btn-delete-comment-{{$comment->id}}" class="d-none"></button>




                    </form>
                  </div>
                </div>
              </div>

              @endforeach
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>




  @endsection

