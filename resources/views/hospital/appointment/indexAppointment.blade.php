@extends ('layouts.nav-admin')

@section('content')



<a href="{{ url('/appointment/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fal fa-plus"></i></a>

@if(count($appointments) < 1)
<div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-calendar-check"></i>
      <p class="lead ">No se encontraron citas. <a href="{{ url('/appointment/create')}}">¡Agrega una!</a></p>
    </div>
  </div>
</div>


@else


  @include('hospital.includes.tableAppointment')

@endif

@endsection

@include('includes.dataTables')