@extends('layouts.nav-admin')

@section('content')

 

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				
			  <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-list"></i>
          </div>
          <div class="card-title">Calendario</div>
        </div>

        <div class="card-body table-responsive">


 

					@include('includes.calendar', [
					'user_id'=>auth::user()->id,
					'route'=>url('/api/appointments/patient')

					])
				</div>
			</div>
		</div>
	</div>
</div>
 
 @endsection