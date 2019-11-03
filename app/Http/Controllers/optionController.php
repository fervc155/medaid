<?php

namespace App\Http\Controllers;


use App\Option;
use App\Options;


use File;
use Illuminate\Http\Request;

class optionController extends Controller
{
    public function index()
    {

    	$options = new Options();
    	
    	return view('options.indexOptions', compact('options'));

    }

    public function userDefault(Request $request)
    {

    	$Option= Option::All()->where('name','user-default')->first();
      	$file = $request->file('photo');
     	$path = public_path().'/splash/img/';
     	$fileName= uniqid(). $file->getClientOriginalName();
    	$move = $file->move($path, $fileName);



    	if($move)
    	{
	
    		File::delete($path.$Option->value);

    		$Option->value =$fileName;
    		$Option->save();





    	}







        return back()->with('success','La Imagen default se ah actualizado correctamente');
    }


	public    function moneda(Request $request )
	{
		$Option= Option::All()->where('name','moneda')->first();

		$Option->value = $request->input('moneda');

		$Option->save();


		return back()->with('success','La moneda se ah actualizado correctamente');

	}


	public function idioma(Request $request)
	{
		$Option= Option::All()->where('name','idioma')->first();
		$Option->value = $request->input('idioma');

		$Option->save();


        return back()->with('success','El idioma se ha actualizado correctamente');
	}
}
