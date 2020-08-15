<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Appointemt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    //Creo que no implementaremos esto, familia
    public function index()
    {

        if(Auth::isPatient())
        {
            $prescriptions =  Prescription::
            join('appointments','appointments.id','=','prescriptions.appointment_id')
            ->select('prescriptions.*','appointments.patient_dni')
            ->where('appointments.patient_dni', Auth::UserId())
            ->get();



            return view('hospital.prescription.indexPrescription', compact('prescriptions'));

        }
        if(Auth::isDoctor())
        {
           $prescriptions =  Prescription::
           join('appointments','appointments.id','=','prescriptions.appointment_id')
           ->select('prescriptions.*','appointments.doctor_id')
           ->where('appointments.doctor_id', Auth::UserId())
           ->get();


           return view('hospital.prescription.indexPrescription', compact('prescriptions'));


       }
       if(Auth::isOffice())
       {
           $prescriptions =  Prescription::
           join('appointments','appointments.id','=','prescriptions.appointment_id')
           ->join('doctors','appointments.doctor_id','=','doctors.id')
           ->select('prescriptions.*','appointments.*','doctors.*')
           ->where('doctors.office_id', Auth::UserId())
           ->get();


           return view('hospital.prescription.indexPrescription', compact('prescriptions'));


       }

       

       if(Auth::isAdmin())
       {

        $prescriptions = Prescription::all();
        return view('hospital.prescription.indexPrescription', compact('prescriptions'));



    }

    return view('admin');
}

public function store(Request $request )
{

    if(Auth::Doctor())
    {


        $prescription =  new Prescription();

        
        $prescription->appointment_id = htmlspecialchars($request->input('appointment_id'));

        $prescription->content = $request->input('content');


        $prescription->save();


        return back()->with('success', 'Se ha agregado la receta correctamente');

    }
    return view('admin');

}


public function show(Prescription $prescription)
{
        //
}

public function edit(Prescription $prescription)
{
        //
}

public function update(Request $request)
{

    if(Auth::Doctor())
    {

        $prescription = Prescription::find($request->input('prescription_id'));

        $prescription->content = $request->input('content');

        $prescription->save();

        return back()->with('success','Receta actualizada correctamente');

    }
    return view('admin');

}

public function destroy(Prescription $prescription)
{
        //
}
}
