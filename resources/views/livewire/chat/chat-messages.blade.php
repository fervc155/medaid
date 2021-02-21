<div>
	<div class="chat-cabecera">


		@if(isset($userOut))
		<span class="nombre"><a href="{{$userOut->ProfileUrl}}">{{$userOut->name}} </a></span>
		<span class="estado">{{$userOut->NamePrivilege}}</span>

		@if(!$userOut->active)
		<span class="nombre">Este usuario ha sido bloqueado </span>

		@endif

		@else
		<span class="nombre">Selecciona un chat </span>

		@endif

		
	</div>


	<div class="chat-contenido">
		@if(isset($userOut))

		@if($countMessages>20)

		<div class="ver-mas mensaje-entrada" wire:click="loadMore()">
			<span>Cargar mas mensajes</span>
		</div>

		@endif

		<?php foreach ($messages as $message): ?>

			<div class="mensaje-<?php
			if($message->user_out == Auth::user()->id)
			{ 
				echo 'salida';
			}
			else
			{

				echo 'entrada' ;
			} 
			?>"><span class="mensaje">{{$message->message}}</span></div>

		<?php endforeach ?>

		@endif

	</div>

	<div class="chat-entrada">

		@if(isset($userOut))

		<div class="input-mensaje">

			<input type="text" wire:ignore class="form-control" placeholder="Mensaje" wire:keydown.enter="send($event.target.value)">
		</div>


		@endif

	</div>



</div>

<script>
	
	$(document).ready(function(){
		setScrollMessages()

		$("input[type=text]").on('keydown', function (e) {
			var keycode = e.keyCode || e.which;
			if (keycode == 13) {
				$(this).val('');
			}
		});
	}
	); 

	Livewire.on('sendMessage',function()
	{
		$("input[type=text]").val('');
			
	})

	Livewire.on('scrollMessage', setScrollMessages);

	


	function setScrollMessages()
	{

		$(".chat-contenido").animate({ scrollTop: $('.chat-contenido').prop("scrollHeight")}, 1000);
	}

 
 
	

</script>

