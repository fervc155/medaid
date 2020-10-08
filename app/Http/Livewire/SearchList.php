<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class SearchList extends Component
{
	public $users;
 
	public function mount()
	{
		$this->users = User::empty();
 	}
	  protected $listeners = ['searchUsers'];


	public function searchUsers($search)
	{
		$this->users = User::search($search);
	}

 

    public function render()
    {
        return view('livewire.search-list');
    }
}
