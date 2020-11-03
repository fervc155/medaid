<?php

namespace App\Soft;
 

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



  public static function in_array($array,$var)
  {
    foreach($array as $word)
    {
       
      if($word == $var)
        return true;
    }


    return false;
  }


  public static function sim($arrayX,$arrayY)
  {
     $xy=0;
     $xl=0;
     $yl=0;


     for($i =0; $i< count($arrayX); $i++)
     {

        $xy+=$arrayX[$i]*$arrayY[$i];
        $xl+=pow($arrayX[$i],2);
        $yl+=pow($arrayY[$i],2);

     }

     $xl = sqrt($xl);
     $yl = sqrt($yl);


     return $xy/ ($xl*$yl);
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

    public static function sortDesc($array)
  {

    
    for ($i =0; $i<count($array); $i++) 
    {
      
      for ($j =0; $j<count($array); $j++) 
      {
        if($array[$i][1]>$array[$j][1])
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
