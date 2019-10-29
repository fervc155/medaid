@extends('layouts.web')

@section('content')



<div class="container">
  <div class="row">
      
  @foreach($specialities as $speciality)
        @if(count($speciality->doctors)>0)
      
    <div class="col-3 py-5">

          <a href="{{url('/visitante/especialidades/'.$speciality->name)}}">{{$speciality->name}}</a>
          <span>{{count($speciality->doctors)}}</span>
          
      


    </div>
          @endif
  @endforeach
  </div>
</div>






@endsection