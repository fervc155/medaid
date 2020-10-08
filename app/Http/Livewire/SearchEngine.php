<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class SearchEngine extends Component
{

 	public $search;

	public function mount()
	{
 		$this->search ='';
	}

	public function search()
	{

    
      $this->emit('searchUsers',$this->search);

      

	}
	
    public function render()
    {
        return view('livewire.search-engine');
    }
}
