<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class InvoiceController extends Controller
{
 
    public function download(Payment $payment)
    {

       $user = $payment->appointment->patient->user();
       $invId= $payment->invoice->id;
       $invoice = $user->findInvoice($invId);
        if(Auth::user()->isPatient())
        {
            if($payment->appointment->patient_dni !=  Auth::user()->id_user)
                return view('admin');


                        return redirect($invoice->hosted_invoice_url); 

                        

        }

          if(Auth::user()->isDoctor())
        {
            if($payment->appointment->doctor_id !=  Auth::user()->id_user)
                return view('admin');

                        return redirect($invoice->hosted_invoice_url);
        

        }

          if(Auth::user()->Office())
          {
          
                        return redirect($invoice->hosted_invoice_url);
          }
    }
}
