<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {

   
    	return view('bill.indexBills');
    }

    public function download(Request $request)
    {

    	$data = $request->validate([
    		'html'=>'required',
    	]);


    

    	 				// instantiate and use the dompdf class
			$dompdf = new Dompdf;
			$dompdf->loadHtml($data['html']);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'landscape');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream();


			return  '';
    }
}
