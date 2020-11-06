<?php


namespace App\Soft;
use App\Soft\Tree\Data;
use App\Soft\Tree\Evaluate;
class Tree {
 
 	public $data;
	public $tree;
	 
	
	public function __construct($dataset,$words)
	{
		 
 
 		$this->data = new Data($dataset,$words);
       
         $this->tree = $this->data->make_tree($this->data->data_training);


	}


	public function  predict($row)
	{
		  $classify = $this->data->classify($row,$this->tree);

		  return $classify;
	}


    public function print_predict($row)
    {
        return $this->data->print_classify($this->data->classify($row,$this->tree));
    } 
 

 	public function print_tree( )
 	{
 		 

 		 
		return json_encode($this->data->print_tree($this->tree));
 	}
 
}


