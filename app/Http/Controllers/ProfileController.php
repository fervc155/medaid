<?php

namespace App\Http\Controllers;

use App\SendMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	public function image($id)
	{

		$user = User::find($id);

		return $user->ProfileImg;

	}

	public function updateLogin(Request $request,  $id)
	{

		$user = User::find($id);
		if (( Auth::user()->isPatient() || Auth::user()->isDoctor()) &&  $id!= Auth::user()->id ) 
		{
			abort(403);
		}
		


		$data = request()->validate([
			'password' => 'required|string|min:6',
			'newpassword' => 'required|string|min:6',

		]);








		if (Hash::check($data['password'], $user->password)) {

			if ($data['newpassword'] == $data['password']) {
				return  back()->with('error', 'La contraseña nueva debe ser diferente');
			}	



 			$user->password = bcrypt($data['newpassword']);


			$user->save();

			return redirect($user->ProfileUrl)->with('success', '¡El usuario ha sido actualizado con éxito!');
		}

		return  back()->with('error', 'La contraseña no es correcta, ingresala para editar tus datos');

	}

		public function regenerate(Request $request, User $user)
	{


 

        if(!Auth::user()->office())
        {
            return redirect('/home');

        }

        $password = User::randomPassword(10); 
        $user->password = bcrypt($password);

        $user->save();


        SendMail::toUser($user, array(
            'subject'=>"Tu contraseña ha sido generada",
            'text'=>[
                'Un administrador ha regenerado tu contraseña.',
                'Tu nueva contraseña es: '.$password
            ],
            'url'=> url('login'),
            'btnText'=>'Ingresar ahora'
        ));







        return redirect($user->profileUrl)->with('success','el usuario fue actualizado correctamente');

	}

  //Método update
	public function updateImage(Request $request,  $id)
	{

		$user = User::find($id);
		if (( Auth::user()->isPatient() || Auth::user()->isDoctor()) &&  $id!= Auth::user()->id ) 
		{
			abort(403);
		}




		$data = request()->validate([
			'image' => 'required',
		]);






		$ruta_imagen =  $data['image']->store('profile', 'public');

		if(null!=$user->image)
		{

			unlink($user->Pathimg);
		}

		$user->image = $ruta_imagen;
		$user->save();

		return redirect($user->ProfileUrl)->with('success', '¡La imagen ha sido actualizada con éxito!');


	}
}
