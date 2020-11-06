<?php

namespace App\Soft\Tree;



class Evaluate
{

	public $column;
	public $value;
	public $tags;
	public function __construct($column,$value,$tags)
	{
 $this->column = $column;
        $this->value = $value;
        $this->tags=$tags;
	}


 	public function compare($example)
 	{
 		$val = $example[$this->column];

 		if(is_numeric($val))
 		{
 			return $val >= $this->value;
 		}
 		else
 		{
 			return $val == $this->value;
 		}
 	}

   
 	public function check()
 	{
 		$condition = "==";

 		if(is_numeric($this->value))
 			$condition = ">=";
 		return "Is ".$this->tags[$this->column]. " ".$condition. " ".$this->value;
 	}
   

    }