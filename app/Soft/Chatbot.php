<?php

namespace App\Soft;

use App\Speciality;
use App\User;
use App\soft\Nlp;
use Illuminate\Database\Eloquent\Collection;


class Chatbot  
{


  public static function greeting_response($text)
  {

    $text = strtolower($text);

    $greetings = array('hola','buenas tardes','que tal','mucho gusto');


    foreach (explode(' ',$text) as $word)
    {

      if (in_array($word, $greetings))
      {

        return $greetings[array_rand( $greetings,1)];
      }
    }
  }





  public static function getCorpus()
  {
   $txt = file_get_contents( storage_path()."/app/public/soft/text.txt");


 //limpieza
   $text = Nlp::clean($txt);
 //sence tokenize

   return $text;
 }


public static function findResponse($sentences,$search)
{
  $elements = array();
  foreach ($sentences as $index=> $sentence ) 
  {
    
    $stringName = strtolower($sentence);
    $explodeString = explode(' ',$stringName);

    $explodeSearch = explode(' ',$search);

    $countSearch = count($explodeSearch);
    $countName = count($explodeString);

    
    $countMatch=0;
    $indiceJaro=0;
    $indiceLev=0;

    foreach ( $explodeString as $key=> $subName) 
    {


      $distancias = 0;
      $distanciasLev = 99;
      foreach ($explodeSearch as $key2=> $subSearch) 
      {
        $lev=levenshtein($subName,$subSearch);
        
        $jaro =JaroWinkler::JaroWinkler($subName,$subSearch);
        $distanciasLev= ($lev<$distanciasLev)? $lev : $distanciasLev ;
        
        if($jaro>= 0.90 && $lev<= max(strlen($subName),strlen($subSearch))/2)
        {  
          $distancias= ($jaro>$distancias)? $jaro : $distancias ;

          
          $countMatch++;
          unset($explodeSearch[$key2]);

          break;
          

        }

      }

      $indiceJaro+=$distancias;
      $indiceLev+=$distanciasLev;

      
    }

    if($countMatch>0)
    {


      array_push($elements,

        array(
          $index,
          Math::distance(
            1, $countSearch,
            $indiceJaro/max($countSearch,$countName),   $countMatch
          ),$sentence  ));
    }

  }

  return $elements;

}

public static function responseByJaro($user_input)
{



        $document=Chatbot::getCorpus();


        $sentences = Nlp::sent_tokenize($document);
        $stopwords = Nlp::stopwords();

        $corpus = array();
 
        foreach ($sentences as $key=> $sentence)
        {
          


          array_push($corpus,  Nlp::cleanStopwords($sentence,$stopwords) ); 


      }

 

      $user_input = Nlp::cleanStopwords(Nlp::clean($user_input),$stopwords);


      $vector= Math::sort(Chatbot::findResponse($corpus,$user_input));


  
      $index=$vector[0][0];

      $response = $sentences[$index] ;
 
        return $response ;


  


}


public static function responseByTerms($user_input)
{


  $document=Chatbot::getCorpus();


        $sentences = Nlp::sent_tokenize($document);
        $stopwords = Nlp::stopwords();

        $corpus = array();
 
        foreach ($sentences as $key=> $sentence)
        {
          


          array_push($corpus,  Nlp::cleanStopwords($sentence,$stopwords) ); 


      }

      $user_input = Nlp::cleanStopwords(Nlp::clean($user_input),$stopwords);

      $merge=array_merge($corpus,array($user_input));

      $terms = Nlp::getTerms($merge);



      $userTermsFrequecy = Nlp::termsFrequency($terms,$user_input);

      $matrixfrequency = Nlp::frequencyMatrix($terms,$corpus);

     $vectorSim=  math::sortDesc(Nlp::sim($matrixfrequency,$userTermsFrequecy,$sentences));



  //   return $vectorSim;
  
      $index=$vectorSim[0][0];

      $response = $sentences[$index] ;
 
        return $vectorSim ;


  
  


}

}
