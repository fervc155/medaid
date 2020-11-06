
<div class="chat-contenido">
  
	 

	<?php foreach ($messages as $message): ?>

		<div class="mensaje-<?php
		if($message[1] == 'left')
		{ 
			echo 'entrada';
		}
		else
		{

			echo 'salida' ;
		} 
		?>"><span class="mensaje"> {{$message[0]}}</span></div>

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

 
	

</script>

