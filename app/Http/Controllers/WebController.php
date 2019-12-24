<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Office;
use App\Speciality;
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




    public function especialidad($id)
    {


        $speciality = Speciality::find($id);

        return view('web.especialidad', compact('speciality'))
        ->with('doctors', $speciality->doctors);

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

        foreach ($office->doctors as $doctor) 
        {

            if(!in_array($doctor->speciality,$specialities))
            {

            array_push($specialities,$doctor->speciality);
            }
        }


        return view('web.consultorio', compact('office','specialities'))->with('doctors',$office->doctors);

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


    public function visitante()
    {


        $offices = Office::all();
        return view('web.consultorios', compact('offices'));

    }

    
    
}



/*	public function searchespecialidades(Request $request )
	{



		$search =$request->input('search');

		$specialities= Speciality::where('name','like',"%$search%")->get();


		$html='';
		$array = array();
			foreach ($specialities as $speciality)
		{
	   $html='<div class="col-12 col-md-4 col-xl-3">
      <div class="card card-pricing">
        <div class="card-body ">
          <h6 class="card-category text-gray"> 
            <i class="fal fa-user-md"></i>'.count($speciality->doctors).'Doctores</h6>

            <div class="icon icon-info">
              <i class="fal fa-file-certificate"></i>
            </div>
            <h3 class="card-title">'.$speciality->price .'/<small>consulta</small></h3>
            <p class="card-description">
              <span class="text-uppercase text-primary">

                '.$speciality->name.'

              </span>
              <div class="stars">';
                $estrellas = round($speciality->stars);
                $noEstrellas = 5-$estrellas; 

                for($i = 0;$i<$estrellas ; $i++)
                {
                $html.='<i class="fas fa-star"></i>';

                }
                for($i = 0;$i<$noEstrellas ; $i++)
                {
                $html.='<i class="fal fa-star"></i>';

                }

              $html.='</div>
              <div>
                '.$speciality->stars.'
              </div>
            </p>
            <a href="'.url('/visitante/especialidad/'.$speciality->id).'" class="btn btn-info btn-round">Ver doctores</a>
          </div>
        </div>
      </div>';

      array_push($array,array(
      	'id'=>$speciality->id,
      	'html'=>$html,
      ));

      $html='';

		}

	
		return json_encode($array);

	}*/