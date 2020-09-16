<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class ChatSearch extends Component
{


	public $search;

	public function mount()
	{

		$this->search = "";
	}

	public function buscarChat()
	{
		$users = User::
		where('id_privileges','>',1)
 		->where('name','LIKE', "%{$this->search}%")
		->get();

			$this->emit('listaDeChats', $users);
	}


    public function render()
    {
        return view('livewire.chat-search');
    }
}
