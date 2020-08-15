@extends('layouts.nav-admin')

@section('content')






<div class="container mt-5">

	<div class="row ">


		<div  class=" col-12 col-md-4">



			<div class="card ">
				<img src="{{asset($office->Profileimg)}}" class="img-fluid">

				<h5 class="h4 text-light bg-secondary text-center text-capitalize mt-0 p-3"> {{$office->name}}</h5>


				<div class="card-body">






					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-address-card"></i> ID:
						</div>  

						{{ $office->id }}

					</div>
					<div class="form-inline mb-2">


						<div class="color-principal">

							<i class="fal fa-home"></i> Domicilio:
						</div>  

						{{ $office->address }}

					</div>


					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-envelope"></i> CP:
						</div>

						{{ $office->postalCode }}

					</div>
					<div class="form-inline mb-2">
						<div class="color-principal">
							<i class="fal fa-city"></i> Ciudad:
						</div>                                  
						{{ $office->city }}

					</div>



					<div class="form-inline mb-3">
						<div class="color-principal">
							<i class="fal fa-flag"></i> Pais:
						</div>
						{{ $office->country }}

					</div>

					@if(Auth::Admin()  || (Auth::isOffice() && $office->id == Auth::UserId()) )

					<div class="text-center">



						<a role="button" class="btn btn-wait btn-round mt-3  btn-info" href="{{url('/office/'.$office->id.'/edit')}}"> <i class="fal fa-pen"></i> Editar</a>

						<a role="button" class="btn btn-round btn-danger text-light mt-3 btn-confirm-delete" id="office-{{$office->id}}"> <i class="fal fa-trash"></i> Eliminar</a>

						{!! Form::open(['action' => ['OfficeController@destroy', $office->id], 'method' => 'POST']) !!}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Eliminar', ['class' => 'd-none  btn-delete', 'id'=>'office-'.$office->id]) }}
						{!! Form::close() !!}

					</div>

					@endif
				</div>

			</div>


		</div>

		<div class=" col-12 col-md-8 ">



			<div class=" row  text-center contadores">
				<div class="col-12 col-md-6">

 					@include('hospital.includes.counter.model',
					[
					'model'=>$doctors,
					'title'=>'Doctores',
					'icon'=>'fa-user-md'

					])

				</div>
					<div class="col-12 col-md-6">

					<div class="caja-contador card">

						<?php $i=0; 

						foreach ($doctors as $d)
						{
							$i+=count($d->appointments);

						}  

						?>
						<div class="caja-contador-icono">
							
						<i class="fal fa-calendar-check"></i>
						</div>
						<div class="card-body">


							<h3>{{$i}}</h3>
							<p>Citas</p> 
						</div>
					</div>


				</div>




			</div>

			<div class="row">
				<div class="col">
					<iframe src="https://www.google.com/maps/d/embed?mid=19EoyniwVmLG_wj1xSTgfHLBzyH8&hl=es" width="640" height="480"></iframe>
				</div>
			</div>







		</div>
	</div>


</div>





@if(count($doctors) < 1)
<div class="container p-5 sin-datos">
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

