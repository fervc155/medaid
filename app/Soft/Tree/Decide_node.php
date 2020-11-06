<?php

namespace App\Soft\Tree;

use App\Soft\Tree\Evaluate;

class Decide_node {
 
	public $evaluate;
	public $correct_branch;
	public $incorrect_branch;
	
    public function __construct(Evaluate $evaluate, $correct_branch,$incorrect_branch)
    {

    	$this->evaluate = $evaluate;
    	$this->correct_branch =$correct_branch;
    	$this->incorrect_branch= $incorrect_branch;


    }

 
}


