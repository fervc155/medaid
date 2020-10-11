@extends('layouts.nav-admin')

@section('content')




<div class="container mt-5">
	@include('includes.block', ['model'=>$admin])

	
	<div class="row">
		<div class="col-md-6 col-lg-4">

			<div class="card card-profile pt-0">
				<img src="{{$admin->user()->Profileimg}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$admin->user()->name}}</h5>
				<div>

				 


				</div>


				<div class="card-body">
				 

					@if(Auth::Patient())


					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-address-card"></i> ID:
						</div>

						{{ $admin->user()->id }}

					</div>


					@endif
 

					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-phone"></i> Telefono:
						</div>

						{{ $admin->user()->telephone }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-birthday-cake"></i> Nacimiento:
						</div>
						{{ $admin->user()->birthdate }}

					</div>



					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-venus-mars"></i> Sexo:
						</div>
						{{ $admin->user()->sex }}

					</div>


		 

					<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/admin/'.$admin->id.'/edit')}}"> <i class="fal fa-pen"></i> Editar</a>
			  
				</div>

			</div>
		</div>
	 

	</div>
</div>


@endsection
