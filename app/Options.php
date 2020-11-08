<?php 
namespace App;


use App\Doctor;




class Options 
{
	public static function Moneda()
    {
    	return Option::All()->where('name','moneda')->first()->value;
    }

    public static Function UserDefault()
    {
    	return Option::All()->where('name','user-default')->first()->value;
    }

    public static Function Idioma()
    {
    	return Option::All()->where('name','idioma')->first()->value;
    }




}