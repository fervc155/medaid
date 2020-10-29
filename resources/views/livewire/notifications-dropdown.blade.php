<div class=" notification-dropdown "  >
  <ul class="search-list"   >


    
    

    @foreach($notifications as $n)
    
    <li class="chat-item @if(!$n['read']) active @endif" onclick="Livewire.emit('openNotifications')"  >
      
      <div class="texto">


        <a href="{{$n['url']}}"><span class="nombre">{{$n['subject']}} <small>| {{$n['date']}}</small></span>  </a>
        <small class="d-block">{{$n['text']}}</small>
      </div>
    </li>
    
    
    @endforeach


    <li class="chat-item" onclick="Livewire.emit('openNotifications')"  >


      <a href="{{route('notifications.index')}}"  >
       
          
          Ver Todas las notificaciones
     
      </a>
    </li>
  </ul>

</div>