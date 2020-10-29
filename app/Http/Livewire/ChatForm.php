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

	public $message;


	public $userOut;


	public function mount()
	{
		$this->message ='';

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


 	public function sendMessage()
 	{

 		$message =new Chat;

 		$message->user_out= Auth::user()->id;
 		$message->user_in = $this->userOut->id;
 		$message->message = $this->message;

 		$message->save();
 		$this->message="";


 			 $this->emit('sendMessage', $message->id);


        SendMail::toUser($this->userOut, array(
            'subject'=>"Tienes un nuevo mensaje",
            'text'=>[
                'El usuario '.Auth::user()->name." escribio:",
                $message->message,
            ],
            'url'=> url('/chat'),
            'btnText'=>'Ir a mis mensajes'
        ));






 	}

    public function render()
    {
        return view('livewire.chat-form');
    }
}
