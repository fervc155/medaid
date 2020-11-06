<?php

namespace App\Soft;

use App\Speciality;
use App\User;
use App\soft\Nlp;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;


class Chatbot  
{



  public $dataset;
  public $words;
  public $tags;

  public $tree;

  public $question;

  public $stopwords;


  public function __construct()
  {

  $datasetPath =storage_path().'/app/soft/dataset.txt';
  $tagsPath =storage_path().'/app/soft/tags.txt';
  $wordsPath =storage_path().'/app/soft/words.txt';
  $this->stopwords = Nlp::stopwords();
  $this->question =[];


  if( file_exists($datasetPath) &&  file_exists($tagsPath) &&  file_exists($wordsPath) )
  {
    $this->dataset = json_decode(file_get_contents($datasetPath));
    $this->tags = json_decode(file_get_contents($tagsPath));
    $this->words = json_decode(file_get_contents($wordsPath));

  }
  else
  {



      $data=Chatbot::getJson();
       # todas las palabras en patrones
      $words=[] ;

       //las clases
      $tags=[];
     //array de patrones separadas en palabras
      $auxX=[];

      //clases segun el orden de auxX
      $auxY=[];


      foreach ($data['content'] as $content)
      {
        foreach ($content['preguntas'] as $pregunta)
        {
          $arrayPalabras = [];

          foreach ( Nlp::word_tokenize($pregunta) as $key=> $p)
          {
               $pAux =Nlp::stemm($p);

            if(!in_array($pAux,$words))
            {

              
                 array_push($words,$pAux);
              $arrayPalabras[]=$pAux;


            
            }
   

             
        


          }

           

          if(count($arrayPalabras)>0)
          {
            array_push($auxX,$arrayPalabras);
  

          $tag= $content['tag'];
          array_push($auxY,$tag);

          }
          if (!in_array($tag, $tags))
          {

            array_push($tags,$tag);

          } 

        }
      }


      $dataset = [];

      $classes =$auxY;

  #llena un array de 0 segun la cantidad de tags
    //$salidaVacia = array_fill(0,count($tags),0);




      foreach($auxX as $key => $sentence)
      {
        $frequency = [];

        foreach($words as $word)
        {
         if(in_array($word,$sentence))
          array_push($frequency,1);
        else
          array_push($frequency,0);


      }
      array_push($frequency,$auxY[$key]);


  
      array_push($dataset,$frequency);



    }
 
    $words[]='clasificacion';



   $error = array_fill(0,count($dataset[0]),0);

   $error[count($error)-1]='error';

   $dataset[]=$error;

    Storage::disk('local')->put('soft/words.txt',  json_encode($words));
    Storage::disk('local')->put('soft/dataset.txt',  json_encode($dataset));
    Storage::disk('local')->put('soft/tags.txt',  json_encode($tags));

    $this->tags =$tags;
    $this->dataset =$dataset;
    $this->words = $words;

  }


  $this->tree = new Tree($this->dataset,$this->words);


  }

   

public  function getResponseOfJson($tag)
{
    $json = Chatbot::getJson();

    $answers = [];

    foreach ($json['content'] as $array)
    {
      if($array['tag']==$tag)
      {
        $answers= $array['respuestas'];
        break;
      }
    }

    return $answers[array_rand($answers)];


}
public static function getJson()
{

  return array('content'=> array(
    array(
      'tag'=>'saludo',
      'preguntas'=> array('Hola','Buenos dias','Buen dia','Que tal','Buenas tardes'),
      'respuestas'=> array('Hola como estas','Buenos dias','Buen dia','Que tal')

    ),
    array(
      'tag'=>'salud',
      'preguntas'=> array('Como estas','Como te encuentras','Que ha pasado'),
      'respuestas'=> array('Muy bien','Excelente','Perfecto','Que tal', 'Bien y tu')

    ),

    array(
      'tag'=>'respuesta_salud',
      'preguntas'=> array('Muy bien y tu','Excelente','Bien',"Muy bien"),
      'respuestas'=> array('Me alegro de escuchar eso')

    ),
        array(
      'tag'=>'login_paciente',
      'preguntas'=> array('Como inicio sesion','soy paciente como inicio sesion','No se como iniciar sesion'),
      'respuestas'=> array('Para ingresar como paciente debes acceder normalmente despues de haberte registrado en la seccion registro')

    ),
    array(
      'tag'=>'despedida',
      'preguntas'=> array('Adios','bye','hasta luego','Nos vemos', 'Que te valla bien'),
      'respuestas'=> array('Adios','bye','hasta luego','Nos vemos', 'Que te valla bien'),

    ),

    array(
      'tag'=>'soy_un_bot',
      'preguntas'=> array('Eres un bot', 'Eres un chatbot','Funcionas con inteligencia artifical', 'usas machine learning'),
      'respuestas'=> array('Asi es, soy un chatbot programado con machine learning para asesorarte en nuestro sistema'),

    ),
        array(
      'tag'=>'error',
      'preguntas'=> array(''),
      'respuestas'=> array('Lo siento no entendi, puedes reformular la pregunta porfavor'),

    ),
  )

);

}


public function listen($user_input)
{



  $input = Nlp::cleanStopwords($user_input,$this->stopwords);
  $input = Nlp::word_tokenize($input);


  $sentence = array_fill(0, count($this->words),0);

  foreach ($this->words as $key=> $word) {
    
    foreach($input as $myword)
    {
      if($myword==$word)
      {
        $sentence[$key] = 1;
        break;

      }
    }
  }




 $i =count($sentence);
 $sentence[$i-1]="¿?";


 
 $this->question = $sentence;
    
 

  }


  public function print_tree()
  {

    return $this->tree->print_tree();
  }

  public function response()
  {


    if(count($this->question)<1)
      return "No he recibido una pregunta";




   $tag=  key($this->tree->predict($this->question));


   return $this->getResponseOfJson($tag);

  }

}