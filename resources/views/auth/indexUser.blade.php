@extends ('layouts.nav-admin')

@section('content')




@if(count($users) < 1) 
<div class="container p-5 sin-datos">

<a href="{{ url('/admin/create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fas fa-plus"></i></a>
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-user"></i>
      <p class="lead ">No se encontraron usuarios. </p>
    </div>
  </div>
  </div>


  @else

  @include('hospital.includes.tableUser')

  @endif

  @endsection

