<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $doctors =Doctor::join('likes','likes.doctor_id','doctors.id')
        ->select('doctors.*')
        ->where('likes.patient_dni',Auth::user()->profile()->id)
        ->get();


        return view('hospital.like.indexLike')->with('doctors',$doctors);
    }
}
