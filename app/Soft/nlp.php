<?php

namespace App\Soft;
use App\Soft\Stemm;

class Nlp {

	public static function clean($string)
	{
		$withoutSpecial= preg_replace('/[^a-zA-Z0-9á-ź\.\,\n\:\;\ ]/','',$string);


		return strtolower(trim($withoutSpecial));


	}

		public static function cleanLine($string)
	{
		return trim(strtolower(preg_replace('/[^a-zA-Z0-9á-ź\ ]/','',$string)));
	}
 

	public static function cleanWord($string)
	{
		return strtolower(preg_replace('/[^a-zA-Z0-9á-ź]/','',$string));
	}
 

	public static function stemm($string)
	{
		return Stemm::stemm($string);
	}

	public static function word_tokenize($sentence)
	{
		$array = [];



		foreach (explode(' ',$sentence) as $key => $word) {

				$cleanWord =Nlp::cleanWord($word);

				if(strlen($cleanWord)>0)
					$array[] =$cleanWord;
			
		}

		return $array;
	}


	public static function cleanStopwords($sentence,$stopwords)
	{
		$array =  Nlp::word_tokenize(trim($sentence));

		$newSentence = array();

		foreach ($array as $key2=> $word)
				array_push($newSentence, Nlp::stemm($word));




		$newSentence= implode(' ', $newSentence);
 		return $newSentence;
	}

	public static function getTerms($array)
	{

		$terms =[];
		foreach ($array as $sentence) 
		{
			foreach (explode(' ',$sentence) as $word) 
			{
				
				if(!in_array($word,$terms))
				{
					if(strlen($word)>0)
					array_push($terms, $word);
				}					
			}
		}

		return $terms;
	}

	public static function termsFrequency($terms,$string)
	{
		$arrayFrequency= array_fill(0,count($terms),0);

		foreach (explode(' ',$string) as $word) 
		{
			foreach ($terms as $key=> $term) 
			{
				if($term==$word)
				{
 
					$arrayFrequency[$key] += 1;
					break;
				}
				 
			}
		}

		return $arrayFrequency;

	}

	public static function frequencyMatrix($terms,$corpus)
	{
		$matrix= array();


		foreach ($corpus as $line) {
			
			$frequencyLine = Nlp::termsFrequency($terms,$line);

			array_push($matrix,$frequencyLine);

		}

		return $matrix;

	}

	public static function stopwords()
	{
		$txt = file( storage_path()."/app/soft/stopwords.txt");


		foreach ($txt as $key => $line)
		{

			$clean = strtolower(Nlp::cleanWord($line));

			$txt[$key]=$clean;

		}
		return $txt;

	}


	public static function sim($matrix,$arrayX,$corpus)
	{

		$arraySim = [];
		foreach ($matrix as $key=> $arrayY) 
		{
			array_push($arraySim,array($key, math::sim($arrayX,$arrayY),$corpus[$key] ));
		}

		return $arraySim;
	}



	public static function sent_tokenize($text)
	{
		$sentences= array();
		$line = '';


		;
		for($i=0;$i<strlen($text);$i++)
		{

			if($text[$i]==".")
			{

				$line.=$text[$i];

				$line = Nlp::cleanLine($line);
				array_push( $sentences,$line);
				$line='';

			}
			else
			{

				$line.=$text[$i];
			}

		}

		return $sentences;
	}



}