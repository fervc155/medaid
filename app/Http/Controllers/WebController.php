<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Speciality;
use App\User;
use App\SendMail;
use Illuminate\Http\Request;

class WebController extends Controller
{

    /*======================================
    =            especialidades            =
    ======================================*/

    public function especialidades()
    {


        $specialities = Speciality::All();

        return view('web.especialidades', compact('specialities'));
    }

    public function usuarios(){

      $usuarios = User::active();

      echo '<table><thead><tr><th>correo</th><th >Clave</th><th>nombre</th><th>Perfil</th></tr></thead><tbody>';
      foreach($usuarios as $user){
        echo '<tr>
          <td>'.$user->email.'</td> 
          <td style="width:100px">123456       </td> 
          <td>'.$user->name.'</td> 
          <td>'.$user->NamePrivilege.'</td> 
        </tr>';

      }

      echo "</tbody></table>";
    }



    public function test(){

        

        $doctors = User::all();


        $array = [];

        foreach ($doctors as $key => $doctor) {
            
            $sensitive = 0;

            $encontrados = 0;

            $array[$key]['doctor'] = $doctor->name;
          
            $data=[];
            while($sensitive <=100)
            {
             
                $encontrados =User::searchTest($doctor->name,$sensitive/100)->count();

                $array[$key][$sensitive.'']=$encontrados;
                
                



                 
               $sensitive += 5 ;
            }

      

            

 
        }


    $json= json_encode($array);
 
     return $json;
    }


    public function chart($json=null ){
         return view('chart', compact('json'));
    }

    public function especialidad($id)
    {


        $speciality = Speciality::find($id);

        return view('web.especialidad', compact('speciality'))
            ->with('doctors', $speciality->doctors);
    }

    public function mapa($id)
    {


        $office = Office::find($id);

        return view('web.mapa', compact('office'));
    }


    /*=====  End of especialidades  ======*/




    /*====================================
    =            consultorios            =
    ====================================*/





    public function consultorios()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));
    }

    public function consultorio($id)
    {

        $office = Office::find($id);

        $specialities = array();

        foreach ($office->doctors as $doctor) {

            foreach ($doctor->specialities as $speciality) {

                if (!in_array($speciality->name, $specialities)) {

                    array_push($specialities, $speciality->name);
                }
            }
        }




        return view('web.consultorio', compact('office', 'specialities'))->with('doctors', $office->doctors);
    }
    /*=====  End of consultorios  ======*/


    /*================================
        =            Doctores            =
        ================================*/

    public function doctor($id)
    {

        $doctor = Doctor::find($id);



        return view('web.doctor', compact('doctor'))->with('patients', $doctor->patients)
            ->with('appointments', $doctor->appointments);
    }

    public function doctores()
    {

        $doctors = Doctor::all();



        return view('web.doctores', compact('doctors'));
    }



    /*=====  End of Doctores  ======*/



    /*=============================
=            CITAS            =
=============================*/

    public function citas()
    {
        return view('web.citas');
    }

    /*=====  End of CITAS  ======*/


    public function acerca()
    {
        return view('web.acerca');
    }

    public function contacto()
    {
        return view('web.contacto');
    }

   public function contactus(Request $request)
    {

        $data= $request->validate([
            'name'=>'required|string',
            'mail'=>'required|email',
            'message'=>'required|string'
        ]);

    SendMail::toAdmin( array(
            'subject'=>"Quiero mas informacion",
            'text'=>[
                
                'Nombre: '.$data['name'],
                'correo: '.$data['mail'],
                'Mensaje: '.$data['message']
            ],
            'url'=> url('/chat'),
            'btnText'=>'Ir a mis mensajes'
        ));

        return back()->with('success','Mensaje enviado correctamente');
    }
    public function visitante()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));
    }
}
