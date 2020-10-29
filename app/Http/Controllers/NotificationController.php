<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
   
        public function __construct()
    {
        $this->middleware('patient');
    }

   public function unread()
   {





    $count = Auth::user()->unreadNotifications()->count();

//    $limit = ($count>20)? $count: 20;

  //  $notifications = Auth::user()->notifications->take($limit)->sortBy('created_at');
    $notifications = Auth::user()->unreadNotifications->sortBy('created_at');
 
    $notificationsArray = array();


    foreach ($notifications as $notification) 
    {
       $data= array(
        'subject'=>$notification->data['subject']??'',
        'text'=>$notification->data['text']??'',
        'url'=>$notification->data['url']??'',
        'date'=>$notification->created_at->diffForHumans(),
       );

 
       array_push( $notificationsArray,$data);
    }

    $data = array(
        'count'=>$count,
        'notifications'=>$notificationsArray
    );
    return $data;

   }


   public function markAsRead()
   {



     Auth::user()->unreadNotifications->markAsRead();

    return  true;

   }



   public function index()
   {




      $notifications =Auth::user()->notifications;



    return view('notifications.index',compact('notifications'));

   }
}
