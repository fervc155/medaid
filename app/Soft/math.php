<?php

namespace App\Soft;

use App\Speciality;
use App\User;
use Illuminate\Database\Eloquent\Collection;


class math  
{
 

  public static function distance($x1, $y1, $x2, $y2) {
   
    
    $dist =  pow($x2-$x1,2) + pow($y2-$y1,2);
    return sqrt($dist);
  }

  public static function distance3D($x1, $y1,$z1, $x2, $y2,$z2) 
  {
   
    
    $dist =  pow($x2-$x1,2) + pow($y2-$y1,2) + pow($z2-$z1,2);
    return sqrt($dist);
  }

  public static function sort($array)
  {

    
    for ($i =0; $i<count($array); $i++) 
    {
      
      for ($j =0; $j<count($array); $j++) 
      {
        if($array[$i][1]<$array[$j][1])
        {

          $temp = $array[$i];
          $array[$i] = $array[$j];
          $array[$j] = $temp;


        }  

      }
    }

    return $array;
  }
  
}
