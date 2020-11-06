@extends('layouts.nav-admin')
@section('content')





<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
			     <div class="card-encabezado">

          <div class="card-cabecera-icono bg-info sombra-2 ">

            <i class="fal fa-list"></i>
          </div>
          <div class="card-title">Notificaciones</div>
        </div>

				<div class="card-body">


					<table class="table"  >
					 
						<tbody>


							<?php foreach ($notifications as $notification): ?>

										@php

										$text = '';

										foreach($notification->data['text'] as $string)
										{
											$text.=$string."\n";
										}

										$data= array(
										'subject'=>$notification->data['subject']??'',
										'text'=> $text,
										'url'=>$notification->data['url']??'',
										'date'=>$notification->created_at->diffForHumans(),
										);

										@endphp
								<tr>
									<td>



										<span class="font-weight-bold d-block">{{$data['subject']}}  
										<small class="font-weight-normal">{{$data['date']}}</small>
										</span> 
										<div>
											{{$data['text']}}
											<br>
										<a href="{{$data['url']}}" class="btn btn-link">Ver mas</a>
										</div>
									</td>
									 
								</tr>
							<?php endforeach ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection



@push('js')


<script type="text/javascript">


	$(document).ready( function () {




		$('#table-notifications').DataTable({
			'language':dataTableLanguaje
		});
	} );
</script>



@endpush


