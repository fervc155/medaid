@extends('layouts.web')

@section('content')



<div class="container">
  <div class="row">
      
  @foreach($doctors as $doctor)
      
    <div class="col-3 py-5">

  {{$doctor->name}}        
      


    </div>
  @endforeach
  </div>
</div>






@endsection