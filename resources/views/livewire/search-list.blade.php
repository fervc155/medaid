

<div >

	@if(count($users)>0)
	<div class="search-list">
		
  	@foreach ($users as $user) 


  	
	<li class="chat-item" id="chat-{{$user['id']}}"  >
		<div class="imagen-chat">
			<img src="{{$user->Profileimg}}">

		</div>
		<div class="texto">


			<a href="{{$user->profileUrl}}"><span class="nombre">{{$user['name']}}</span></a>
			 <small class="d-block">{{$user->NamePrivilege}}</small>
		</div>
	</li>
      
        
       @endforeach
	</div>

	@endif		
 
</div>
