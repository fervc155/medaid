<?php

namespace App\Http\Livewire;

use App\Chat;
use App\Messages;
use App\Notification;
use App\SendMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatMessages extends Component
{

	public $messages;
	public $countMessages;
	public $userOut;

	public function mount()
	{

		$lastChat = Messages::lastest();
if(null == $lastChat)
			return;

		if($lastChat->user_in == Auth::user()->id)
		{

			$this->selectChat($lastChat->user_out);
			$this->userOut=User::find($lastChat->user_out);

		}
		else
		{
			$this->selectChat($lastChat->user_in);
			$this->userOut=User::find($lastChat->user_in);

		}
	}


	protected $listeners = ['selectChat','reloadMessages','sendMessage','sendNotification'];

	public function selectChat($idUser)
	{
		$this->userOut=User::find($idUser);

		$this->messages =Messages::get($this->userOut->id);
		$this->countMessages =Messages::count($this->userOut->id);


		$this->emit('scrollMessage');


	}


	public function loadMore()
	{
		$count  = count($this->messages);
		$this->messages =Messages::get($this->userOut->id,$count+10);

	}



	public function reloadMessages()
	{


		$this->selectChat($this->userOut->id);

 	}

	public function sendMessage($messageTxt)
	{

			$message =new Chat;

 		$message->user_out= Auth::user()->id;
 		$message->user_in = $this->userOut->id;
 		$message->message = $messageTxt;

 		$message->save();
 	 
	 $this->countMessages+=1;
		 

		 $this->messages->push($message);

		$this->emit('scrollMessage');


        // SendMail::toUser($this->userOut, array(
        //     'subject'=>"Tienes un nuevo mensaje de: ".Auth::user()->name,
        //     'text'=>[
                
        //         $message->message,
        //     ],
        //     'url'=> url('/chat'),
        //     'btnText'=>'Ir a mis mensajes'
        // ));

		$this->emit('sendNotification',$message->message);

		
	}


	public function sendNotification($message)
	{
		Notification::toUser($this->userOut, array(
            'subject'=>"Tienes un nuevo mensaje de: ".Auth::user()->name,
            'text'=>[
                
                $message,
            ],
            'url'=> url('/chat'),
            'btnText'=>'Ir a mis mensajes'
        ));

	}

	public function render()
	{
		return view('livewire.chat-messages');
	}
}
