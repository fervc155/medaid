<?php 
namespace App;


use App\Doctor;




class Options 
{
	public function Moneda()
    {
    	return Option::All()->where('name','moneda')->first()->value;
    }

    public Function UserDefault()
    {
    	return Option::All()->where('name','user-default')->first()->value;
    }

    public Function Idioma()
    {
    	return Option::All()->where('name','idioma')->first()->value;
    }
}