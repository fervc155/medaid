
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
		?>"><span class="mensaje">{{$message->id}} - {{$message->message}}</span></div>

	<?php endforeach ?>

	@endif

</div>



<script>

	Livewire.on('scrollMessage', function()
	{
		setScrollMessages()
	});

	


	function setScrollMessages()
	{

		$(".chat-contenido").animate({ scrollTop: $('.chat-contenido').prop("scrollHeight")}, 1000);
	}

	$(document).ready(function()
	{
		setScrollMessages()

		
		


	}); 

	let antiqueNotifications = <?= $countMessages??0 ?>;
	function load_unseen_messages()
	{

		self=this;
		$.ajax({
			url: _URL+"/chat/count",
			method:"POST",
			data:
			{
				_token: '<?php echo csrf_token() ?>' ,
				_userOut: '<?= (null ==$userOut )? '' :  $userOut->id;?>'
			},

			success:function(data)
			{




				if(antiqueNotifications!=data)
				{


					if(data>0)
					{
						
						Livewire.emit('reloadMessages');



					}



					antiqueNotifications= data;
				}
			}

		});
	}


	Livewire.on('reloadList', function()
	{
		load_unseen_messages()
	});

	

</script>

