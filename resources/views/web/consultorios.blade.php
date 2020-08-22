@extends('layouts.web')

@section('content')



<div class="container">
  <div class="row">

    @foreach ($offices as $office)
    <div class="col-md-6 ">

                  <div class="card card-rotate">
                    <div class="front front-background" style="background-image: url({{asset($office->Profileimg)}});">
                      <div class="card-body">
                        <h6 class="card-category"><i class="fal fa-user-md"></i> {{count($office->doctors)}} Doctores</h6>
                        <a href="#pablo">
                          <h3 class="card-title">{{$office->name}}</h3>
                        </a>
                        <p class="card-description">
                          {{$office->country}} {{$office->city}} {{$office->postalCode}}
                          <br>
                         Direccion: {{$office->address}}
                        </p>
                        <div class="stats text-center">
                          <a target="_blank" href="{{url('/visitante/mapa/'.$office->id)}}"type="button" name="button" class="btn btn-danger btn-fill btn-round btn-rotate">
                            <i class="fal fa-map-marker"></i> Ver mapa
                          </a>

                           <a href="{{url('/visitante/consultorio/'.$office->id)}}"  class="btn btn-primary btn-round btn-sm">
                            <i class="fal fa-hospital"></i> Ver Consultorio
                          </a>
                        </div>
                      </div>
                    </div>
                 
                    </div>
    </div>

    @endforeach
  </div>
</div>



@endsection