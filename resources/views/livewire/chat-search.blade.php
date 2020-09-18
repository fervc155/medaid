<div>
	<div class="input-group chat-search">
	
		<div class="input-group-prepend">
			<span class="input-group-text">
				<i class="fas fa-search" wire:click="buscarChat" ></i>
			</span>
		</div>
		<input type="text" class="form-control" wire:keydown.enter="buscarChat" wire:model="search" placeholder="Buscar un chat">





	</div>
	 
</div>
