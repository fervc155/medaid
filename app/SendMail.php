<?php

namespace App;
use App\Notifications\MessageNotification;

   
class SendMail  
{



    //////////////


    public static function toUser($user, $data=[])
    {

        $user->notify(new MessageNotification($data));
    }


}
