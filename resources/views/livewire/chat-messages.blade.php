
<div class="chat-contenido">

	<div class="ver-mas mensaje-entrada" wire:click="loadMore()">
		<span>Cargar mas mensajes</span>
	</div>

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


		function load_unseen_notification(view = '')
		{
			let antiqueNotifications = <?= $countMessages ?>

			self=this;
			$.ajax({
				url: _URL+"/chat/count",
				method:"POST",
				data:
				{
					_token: '<?php echo csrf_token() ?>' ,
					_userOut: '<?= $userOut->id?>'
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

		setInterval(function(){ 
			load_unseen_notification(); 
		}, 5000);


	}); 




</script>