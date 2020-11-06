<?php

namespace App\Http\Livewire;

use App\Chat;
use App\Messages;
use App\SendMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatForm extends Component
{

 
	public $userOut;


	public function mount()
	{
		 
		$lastChat =Messages::lastest();

if(null == $lastChat)
			return;
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

 	}


 	public function send($messageTxt)
 	{



 		$this->emit('sendMessage', $messageTxt);
 	






 	}

    public function render()
    {
        return view('livewire.chat-form');
    }
}
