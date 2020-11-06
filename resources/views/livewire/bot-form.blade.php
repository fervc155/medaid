<div class="chat-entrada">

	

	<div class="input-mensaje">

		<input type="text" class="form-control" placeholder="Mensaje" wire:keydown.enter="send($event.target.value)"  >
	</div>
	
	
</div>









<script>
	
	Livewire.on('sendMessage', function()
	{
		$('input[type="text"]').val("");
	});

	

</script>