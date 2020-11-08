<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
 
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Appointment $appointment)
    {

        // if(!Auth::user()->isPatient())
        //     return back()->with('error','Solo los pacientes pueden escribir reseñas');

        $data = $request->validate([


            'stars'=>'required|numeric',
            'comment'=>'nullable'
        ]);
        
       

        $review = new Review; 

        $review->appointment_id = $appointment->id;

        $review->stars = $data['stars'];

        $review->comment = $data['comment']??null;

        $review->save();


        return back()->with('success','Reseña escrita correctamente');
    }
 
 
}
