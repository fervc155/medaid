<?php

namespace App\Http\Livewire\Chat;

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

 
	protected $listeners = ['selectChat','reloadMessages'];

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



	public function selectChat($idUser)
	{
		$this->userOut=User::find($idUser);

		$response = Messages::get($this->userOut->id);
		$this->messages =$response['messages'];
		$this->countMessages =$response['count'];


		$this->emit('scrollMessage');


	}


	public function loadMore()
	{
		$count  = count($this->messages);
		$this->messages =Messages::get($this->userOut->id,$count+10)['messages'];

	}



	public function reloadMessages()
	{


		$this->selectChat($this->userOut->id);

	}

	public function send($messageTxt)
	{

		$message =new Chat;

		$message->user_out= Auth::user()->id;
		$message->user_in = $this->userOut->id;
		$message->message = $messageTxt;

		$message->save();

		$this->countMessages+=1;

 

		$this->emit('scrollMessage');
		$this->emit('sendMessage');


 
		
	}

 

	public function render()
	{
		return view('livewire.chat.chat-messages');
	}
}
