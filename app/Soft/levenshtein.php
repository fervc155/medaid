<?php

namespace App\Soft;

use App\Speciality;
use App\User;
use Illuminate\Database\Eloquent\Collection;

 
class Levenshtein  
{
    public static function searchIn($models, $s)
    {
 
   	if(strlen($s)<1)
    {
        return $models;
    }

    $s = strtolower($s);
    

 	$collection=[];
 
    if (get_class($models->first())=='App\User') 
    {
    	$collection = Collection::make(new User);
    }

    else  if (get_class($models->first())=='App\Speciality') 
    {
    	$collection = Collection::make(new Speciality);
    }

    else 
    	return $models;



    $match =false;

    foreach ($models as $model ) 
    {

        $stringName = strtolower($model->name);

        $explode = explode(' ',$s);
        $countExplode=0;

        foreach (explode(' ',$stringName) as $string) 
        {


            foreach ($explode as $subSearch) 
            {
                if(levenshtein($string,$subSearch)<= strlen($string)/2)
                {  

                    $countExplode++;
                    break;


                }
            }
        }

        if($countExplode> count($explode)/2)
        {

            $match=true;
        }


        if(levenshtein($stringName, $s)< strlen($string)/2)
        {  
            $match=true;

        }


        if(strpos($stringName,$s)!==false)
        {  
            $match=true;

        }


        if($match)
        {
           $collection->push($model);
           $match=false;

       }
   }


   return $collection;
 
    }
}
