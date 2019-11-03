@extends('layouts.web')

@section('content')



<div class="container pt-5">
  <div class="row">
      
  @foreach($doctors as $doctor)
      
    <div class="col-sm-6 col-md-4 ">
		@include('web.includes.doctor-card')


    </div>
  @endforeach
  </div>
</div>






@endsection