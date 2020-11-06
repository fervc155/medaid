<?php

namespace App\Soft\Tree;

class Classifier {
 

	public $prediction;
	
	public function __construct($rowsCount)
	{

		$this->prediction = $rowsCount;
	}


 
}


