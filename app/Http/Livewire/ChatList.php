<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ChatList extends Component
{
 	
 	public $chats;

	public function mount()
	{

		$this->chats =new  Collection;
	}

	protected $listeners = ['listaDeChats'];

 	public function listaDeChats($users)
 	{

 		$this->chats = $users;
 	}

 	public function selectChat($id)
 	{
 					$this->emit('selectChat', $id);

 	}


    public function render()
    {
        return view('livewire.chat-list');
    }
}
