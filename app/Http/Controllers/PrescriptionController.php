<?php

namespace App\Http\Controllers;

use Storage;
use App\Prescription;
use App\Appointemt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notification;

class PrescriptionController extends Controller
{
    //Creo que no implementaremos esto, familia
    public function index()
    {

        if (Auth::user()->isPatient()) {
            $prescriptions =  Prescription::join('appointments', 'appointments.id', '=', 'prescriptions.appointment_id')
                ->select('prescriptions.*', 'appointments.patient_dni')
                ->where('appointments.patient_dni', Auth::user()->id_user)
                ->get();



            return view('hospital.prescription.indexPrescription', compact('prescriptions'));
        }
        if (Auth::user()->isDoctor()) {
            $prescriptions =  Prescription::join('appointments', 'appointments.id', '=', 'prescriptions.appointment_id')
                ->select('prescriptions.*', 'appointments.doctor_id')
                ->where('appointments.doctor_id', Auth::user()->id_user)
                ->get();


            return view('hospital.prescription.indexPrescription', compact('prescriptions'));
        }
        if (Auth::user()->isOffice()) {
            $prescriptions =  Prescription::join('appointments', 'appointments.id', '=', 'prescriptions.appointment_id')
                ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
                ->select('prescriptions.*', 'appointments.*', 'doctors.*')
                ->where('doctors.office_id', Auth::user()->id_user)
                ->get();


            return view('hospital.prescription.indexPrescription', compact('prescriptions'));
        }



        if (Auth::user()->isAdmin()) {

            $prescriptions = Prescription::all();
            return view('hospital.prescription.indexPrescription', compact('prescriptions'));
        }

        return view('admin');
    }

    public function store(Request $request)
    {

        if (Auth::user()->Doctor()) {


            $prescription =  new Prescription();


            $prescription->appointment_id = htmlspecialchars($request->input('appointment_id'));

            $prescription->content = $request->input('content');


            $prescription->save();

                  $getUsers = $prescription->appointment->getUsers();

    Notification::toUsers($getUsers, array(
            'subject'=>"Una receta ha sido registrada en tu cita",
            'text'=>[
                
                'Para ver sus detalles ingresa al link que hemos enviado',
                'Cita id: '.$prescription->appointment->id
                

            ],
            'url'=> $prescription->appointment->profileUrl,
            'btnText'=>'Ver cita'
        ));



            return back()->with('success', 'Se ha agregado la receta correctamente');
        }
        return view('admin');
    }


    public function update(Request $request)
    {

        if (Auth::user()->Doctor()) {

            $data = request()->validate([
                'file' => 'required',
            ]);

            $prescription = Prescription::find($request->input('prescription_id'));

            $prescription->content = $request->input('content');

            $file_path =  $data['file']->store('profile', 'public');

            $prescription->file = $file_path;

            $prescription->save();

            return back()->with('success', 'Receta actualizada correctamente');
        }
        return view('admin');
    }

    public function download($id)
    {
        $prescription = Prescription::find($id);
        $file_path = $prescription->file;

        return Storage::disk('public')->download($file_path);
    }

}
