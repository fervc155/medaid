<div class="chat-entrada">

			@if(isset($userOut))

					<div class="input-mensaje">

						<input type="text" class="form-control" placeholder="Mensaje" wire:keydown.enter="send($event.target.value)">
					</div>
					 

					 @endif

				</div>







<script>
	
	Livewire.on('sendMessage', function()
	{
		$('input[type="text"]').val("");
	});

	

</script>