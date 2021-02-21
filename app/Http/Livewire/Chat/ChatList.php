<?php

namespace App\Http\Livewire\Chat;

use App\Chat;
use App\Messages;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{


  
 
  public $search;
  public $users;
  public $active;
  public $notFound;
  public $messages;
  protected $listeners = [ 'sendMessage', 'reloadList'];

 
  public function mount()
  {


    $this->search = "";

    $this->users =Messages::senders();
    $this->notFound=false;


    $this->messages = Messages::total();


  }



  public function checkMessages()
  {
    $messages = Messages::total();

    if($messages>$this->messages)
    {
      $this->messages =$messages;
      $this->reloadList();
    }
  }

  public function buscarChat()
  {

    if(strlen($this->search)<1)
    {
      
            $this->notFound=false;
      $this->users =Messages::senders();
      return;

    }

    $this->users =  User::search($this->search);


    $this->users = $this->users->reject(Auth::user());

    if($this->users->count()<1)
    {
      $this->notFound=true;

    }
    else
    {
      $this->notFound=false;

    }


  }


  public function searchAll()
  {
    
    $this->users =  User::
    where('id_privileges','>',1)
    ->get();


    $this->users = $this->users->reject(Auth::user());
 
    $this->notFound=false;

  }


  public function sendMessage()
  {
    $this->users =Messages::senders();
 
  }

  public function reloadList()
  {
    $this->users =Messages::senders();
    $this->emit('reloadMessages');
 
  }

  public function selectChat($id)
  {
    $this->active =$id;
    $this->emit('selectChat', $id);
    $this->users =Messages::senders();

  } 


  public function render()
  {
    return view('livewire.chat.chat-list');
  }
}
