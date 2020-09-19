<div class="chat-entrada">

			@if(isset($userOut))

					<div class="input-mensaje">

						<input type="text" class="form-control" placeholder="Mensaje" wire:model="message" wire:keydown.enter="sendMessage">
					</div>
					 

					 @endif

				</div>