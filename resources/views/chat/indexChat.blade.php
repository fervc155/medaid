@extends('layouts.nav-admin')


@section('content')

<div class="container-fluid   chat-contenedor">
	<div class="row h-100">
		<div class="col-12 col-sm-4 h-100 p-0">


			<ul class="chat-list">

			
					@livewire('chat-search')

					@livewire('chat-list')
			</ul>

		</div>
		<div class="col-12 col-sm-8 h-100 p-0">
			<div class="chat-individual">
			
				@livewire('chat-header')
				@livewire('chat-messages')
				@livewire('chat-form')

				
			</div>

		</div>
	</div>
</div>

@endsection