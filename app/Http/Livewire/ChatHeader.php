<?php

namespace App\Http\Livewire;

use App\Chat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatHeader extends Component
{

	public $userOut;


	public function mount()
	{

		$lastChat =Chat::where('user_in',Auth::user()->id)
		->orwhere('user_out',Auth::user()->id)
		->get()->first();


		if($lastChat->user_in == Auth::user()->id)
		{

			$this->userOut=User::find($lastChat->user_out);
		}
		else
		{
			$this->userOut=User::find($lastChat->user_in);
		}
	}

	protected $listeners = ['selectChat'];

 	public function selectChat($idUser)
 	{
 		$this->userOut = User::find($idUser);


 		// $this->chat = Chat::where('user_out',$id)
 		// ->where('user_in',Auth::user()->id)
 		// ->get();
 	}

    public function render()
    {
        return view('livewire.chat-header');
    }
}
