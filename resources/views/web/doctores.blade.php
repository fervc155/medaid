@extends('layouts.web')

@section('content')



<div class="container py-5">
<div class="row">
	<div class="col py-3">
     {{$doctors->links()}}
		
	</div>
</div>
  <div class="row">
    
    @foreach($doctors as $doctor)
    
    <div class="col-sm-6 col-md-4 ">

		@include('web.includes.doctor-card')

    </div>
    @endforeach

  </div>
<div class="row">
	<div class="col py-3">
     {{$doctors->links()}}
		
	</div>
</div>
</div>






@endsection