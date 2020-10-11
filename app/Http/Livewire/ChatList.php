<?php

namespace App\Http\Livewire;

use App\Messages;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{

  public $users;
  public $active;
  public $notFound;

  public $countMessages;

  public function mount()
  {



    $this->users =Messages::senders();
    $this->notFound=false;


    $this->countMessages= Messages::total();
  }

  protected $listeners = ['chatList', 'sendMessage', 'reloadList'];

  public function chatList($search)
  {

    if(strlen($search)<1)
    {
      
            $this->notFound=false;
      $this->users =Messages::senders();
      return;

    }

    $this->users =  User::search($search);


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
    $this->countMessages= Messages::total();

  }

  public function reloadList()
  {
    $this->users =Messages::senders();
    $this->countMessages= Messages::total();


  }

  public function selectChat($id)
  {
    $this->active =$id;
    $this->users =Messages::senders();

    $this->emit('selectChat', $id);
  } 


  public function render()
  {
    return view('livewire.chat-list');
  }
}
