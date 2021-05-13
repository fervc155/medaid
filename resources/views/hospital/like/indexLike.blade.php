@extends('layouts.nav-admin')

@section('content')


<main class="container py-5">

  <div class="row">

    @foreach($doctors as $doctor)
      @include('hospital.includes.card-profile-doctor-simple')

    @endforeach

    @if(count($doctors)<1)

    <div class="col-12">
      
    <div class="alert alert-warning">
      No tienes ningun doctor agregado como favorito
    </div>
    </div>

    @endif

  </div>
</main>






@endsection