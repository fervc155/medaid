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
	 

		$this->emit('chatList', $this->search);
			
	}


    public function render()
    {
        return view('livewire.chat-search');
    }
}
