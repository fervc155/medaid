@extends ('layouts.nav-admin')

@section('content')




@if(count($prescriptions) < 1)
<div class="container p-5 sin-datos">
  <div class="row">
    <div class="col text-center">
      <i class="fal fa-envelope-open-text"></i>
      <p class="lead ">No se encontraron recetas</p>
    </div>
  </div>
</div>



@else

@include('hospital.includes.modal.EditPrescription');

@include('hospital.includes.tablePrescriptions');


@endif
@endsection
@include('includes.dataTables')