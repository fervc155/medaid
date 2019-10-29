@extends ('layouts.nav-admin')

@section('content')


<!-- Modal Actializar -->



<div class="container">
  <div class="row">
    <div class="col">
      
aqui van la lista de medicos que tienen esa especialidad para posteriormente hacer una cita con ellos
    </div>
    <div class="col">
Especialidad: {{$speciality->name}}
      
    </div>
  </div>
</div>

@endsection
@include('includes.dataTables')