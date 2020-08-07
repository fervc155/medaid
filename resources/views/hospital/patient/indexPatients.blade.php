@extends ('layouts.nav-admin')

@section('content')

 

@if(Auth::Office())
<a href="{{ url('/patient/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fas fa-plus"></i></a>

@endif


@if(count($patients) < 1)

<div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-user-injured"></i>
      <p class="lead ">No se encontraron pacientes. <a href="{{ url('/patient/create')}}">¡Agrega uno!</a></p>
    </div>
  </div>
</div>



@else


  @include('hospital.includes.tablePatient')

@endif
@endsection
@include('includes.dataTables')