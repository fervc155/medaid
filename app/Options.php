<?php 
namespace App;


use App\Doctor;




class Options 
{
 
    public static Function UserDefault()
    {
    	return Option::All()->where('name','user-default')->first()->value;
    }

 

}