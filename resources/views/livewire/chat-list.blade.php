<div>
	


	@foreach($chats as $chat)
	<li class="chat-item " wire:click="selectChat({{$chat['id']}})">
          <div class="imagen-chat">
            <img src="">

          </div>
          <div class="texto">


            <span class="nombre">{{$chat['name']}}</span>
            <span class="fecha ">123</span>
            <div class="mensaje">mensaje</div>
          </div>
          </li>
	@endforeach
</div>
