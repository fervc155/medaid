<div>
	
	@if($notFound)
	<li class="p-3 text-center" >
		<div class="texto">
			<span class="Nombre">No se encontrados coincidencias</span>
			<div class="mensaje"><span class="btn btn-link text-primary" wire:click="searchAll()">Ver todos los usuarios</span></div>
		</div>
		
	</li>


	@endif


	@foreach($users as $user)



	<li class="chat-item" id="chat-{{$user['id']}}" wire:click="selectChat({{$user['id']}})">
		<div class="imagen-chat">
			<img src="{{$user->Profileimg}}">

		</div>
		<div class="texto">


			<span class="nombre">{{$user['name']}}</span>
			<span class="fecha "><?php  
			if(null !=$user['lastChat']['created_at'])
			{
				echo $user['lastChat']['created_at']->diffForHumans() ;
			}
			?></span>
			<div class="mensaje">{{$user['lastChat']['message']}}</div>
		</div>
	</li>
	@endforeach
</div>


<script>
	
	$(document).ready(function()
	{

		if($('.chat-item').length>0)
			$('.chat-item')[0].classList.add('active');



	})

	Livewire.on('selectChat',(id) =>
	{

		setChatAsActive(id)

	});

	function setChatAsActive(id)
	{
		$('.chat-item').removeClass('active');
		$(`#chat-${id}`).addClass('active')
	}

	let antiqueTotalChat =  <?= $countMessages??0 ?>;

	$(document).ready(function()
	{
 
 
		function reloadChatLists(view = '')
		{

			self=this;
			$.ajax({
				url: _URL+"/chat/total",
				method:"POST",
				data:
				{
					_token: '<?php echo csrf_token() ?>' ,
 				},

				success:function(data)
				{




					if(antiqueTotalChat!=data)
					{


						if(data>0)
						{
							
							Livewire.emit('reloadList');
 							

						}



						antiqueTotalChat= data;
					}
				}

			});
		}


		setInterval(function(){ 
			reloadChatLists(); 
		}, 2000);


	}); 

</script>