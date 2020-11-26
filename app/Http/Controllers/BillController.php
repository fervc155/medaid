<?php

namespace App\Http\Controllers;

use App\Soft\Regression;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index()
    {

 

     	return view('bill.indexBills');
    }

  
}
