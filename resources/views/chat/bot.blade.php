@extends('layouts.nav-admin')


@section('content')

<div class="container-fluid   chat-contenedor">
	<div class="row h-100">
		 
		<div class="col-12   h-100 p-0">
			<div class="chat-individual">
			
			<div class="chat-cabecera">


 
					<span class="nombre">MedBot</span>
					<span class="estado">Siempre disponible</span>
  
		
				</div>

	 
				@livewire('bot-messages')
				@livewire('bot-form')

				
			</div> 

		</div>
	</div>
</div>

@endsection