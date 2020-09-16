<div class="chat-entrada">
					<div class="input-mensaje">

						<input type="text" class="form-control" placeholder="Mensaje" wire:model="message">
					</div>
					<div class="boton-mensaje">
						<button class="btn btn-secondary btn-sm" wire:click="enviarMensaje">
							
						<i class="fal fa-paper-plane"></i>
						</button>
					</div>

				</div>