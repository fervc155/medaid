@extends ('layouts.nav-admin')

@section('content')


@if(Auth::Office())
<a href="{{route('doctor.create')}}" role="button" class="btn btn-wait btn-success  btn-float"><i class="fal fa-plus"></i></a>

@endif

@if(count($doctors) < 1) <div class="container p-5 sin-datos">
	<div class="row">
		<div class="col text-center">
			<i class="fal fa-user-md"></i>
			<p class="lead ">No se encontraron doctores. <a href="{{ url('/doctor/create')}}">¡Agrega uno!</a></p>
		</div>
	</div>
	</div>


	@else

	@include('hospital.includes.tableDoctor')

	@endif
	@endsection

	@include('includes.dataTables')