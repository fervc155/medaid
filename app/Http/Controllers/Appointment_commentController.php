<?php

namespace App\Http\Controllers;

use App\Appointment_comment;
use Illuminate\Http\Request;
use App\Notification;

class Appointment_commentController extends Controller
{
	public function register(Request $request)
	{
		$id_appointment = $request->input('appointment_id');
		$comment = $request->input('comment');

		$id_user = $request->input('user_id');

		$Acomment  = new Appointment_comment();
		$Acomment->user_id = $id_user;
		$Acomment->comment = $comment;
		$Acomment->appointment_id = $id_appointment;
		$Acomment->save();


		$getUsers  = $Acomment->appointment->getUsers(true);

		Notification::toUsers($getUsers, array(
            'subject'=>"El usuario: ".Auth::user()->name." ha comentado tu cita",
            'text'=>'Para ver los detalles ingresa a tu cita',
            'url'=> $Acomment->appointment->profileUrl,
            'btnText'=>'Ir a mi cita'
        ));

		return back()->with('success', 'Comentario enviado');
	}

	public function update(Request $request)
	{
		$id_comment = $request->input('comment_id');
		$comment = $request->input('comment');

		$id_user = $request->input('user_id');

		$Acomment  = Appointment_comment::find($id_comment);


		if ($Acomment->user_id == $id_user) {

			$Acomment->user_id = $id_user;
			$Acomment->comment = $comment;
			$Acomment->save();

			return back()->with('success', 'Comentario actualizado');

			
		}

		return back()->with('error', 'Este comentario no te pertenece');
	}

	public function destroy(Request $request)
	{
		$id_comment = $request->input('comment_id');
		$id_user = $request->input('user_id');

		$comment = Appointment_comment::find($id_comment);

		if ($comment->user_id == $id_user) {
			$comment->delete();
			return back()->with('success', 'Comentario eliminado');
		}

		return back()->with('error', 'Este comentario no te pertenece');
	}
}
