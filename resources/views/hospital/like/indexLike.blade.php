@extends('layouts.nav-admin')

@section('content')


<main class="container py-5">

  <div class="row">

    @foreach($doctors as $doctor)
      @include('hospital.includes.card-profile-doctor-simple')

    @endforeach

  </div>
</main>






@endsection