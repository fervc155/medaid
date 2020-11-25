<?php

namespace App\Soft\Tree;

use App\Soft\Tree\Classifier;
use App\Soft\Tree\Decide_node;
use App\Soft\Tree\Evaluate;

class Data {

	public $data_training;
	public $words;


	public  function __construct($dataset,$words)
	{

		$this->data_training=
// 		[
//     [1, 1, 0, 1, 'Infección de garganta'],
//     [0, 0, 1, 0, 'Alergia'],
//     [0, 0, 1, 1, 'Resfriado'],
//     [0, 0, 1, 0, 'Alergia'],
//     [1, 1, 1, 1, 'Infección de garganta'],
//     [0, 0, 1, 0, 'Resfriado'],
//     [1, 0, 1, 1, 'Resfriado'],
//     [1, 1, 0, 1, 'Infección de garganta'],
//     [0, 0, 1, 1, 'Resfriado'],
// ];
		$dataset;

 
		$this->words =
		// ["Fiebre", "Dolor de garganta", "Congestión", "Dolor de cabeza", "Diagnóstico"];
		 $words;
 

	}

	//dataset and number of column what you want
	public function unique_values($y)
	{
		$set= array();

		foreach($this->data_training as $row)
		{
			if(!in_array($row[$y],$set))
				array_push($set,$row[$y]);
		}

		return $set;
	}

	public function count_rows($rows  )
	{
      $count = array();

      foreach($rows as $row)
      {
       
      	$content = end($row) ;

     

      	if(!isset($count[$content]))
      	{

      		$count[$content]=1;
 
      	}
      	else
      	{
      		$count[$content]++;
      	}

      }


      return $count;
 
	}


	public function  part($rows,Evaluate $evaluate)
	{


    $rowsMatch=[];

     $rowsError = [];


     foreach ($rows as $row) 
     {
     	if($evaluate->compare($row))
     	{
     		$rowsMatch[]=$row;
     	}
     	else
     	{
     	     $rowsError[]=$row;
	
     	}
     }
    
       
    return array('match'=>$rowsMatch,'error'=>$rowsError);
	}


	public function incertitude($rows)
	{
		$counts  = $this->count_rows($rows);

		$impure =1;

		foreach($counts as $key => $count)
		{
			$prob_data = $counts[$key] / count($rows);

			$impure -= pow($prob_data,2);
		}

		return $impure;
	}


	public function tracking($left, $right, $actual_incertitude)
	{
		$p = count($left) / (count($left) + count($right));
	
		return $actual_incertitude - $p * $this->incertitude($left) - (1 -$p) * $this->incertitude($right);
	}


	public function best_route($rows)
	{
	 		
		$best_tracking =0;
		$best_evaluate = null;
		$actual_incertitude = $this->incertitude($rows);
		$nCols = count($rows[0])-1;


		for($i=0; $i< $nCols; $i++)
		{
			$values = array();

			foreach ($rows as $key => $row) 
			{
				if(!in_array($row[$i],$values))
					array_push($values,$row[$i]);

			}


		 

			foreach ($values as $key => $value) 
			{



				 $evaluate = new Evaluate($i,$value,$this->words);
				 $request = $this->part($rows,$evaluate);



			 
				 if(count($request['match'])==0  || count($request['error'])==0)
				 {
				 	continue;
				 }
				 else
				 {


					 $info = $this->tracking($request['match'],$request['error'],$actual_incertitude);


					 if ($info >= $best_tracking)
					 {
					 	$best_tracking=$info;
					 	$best_evaluate=$evaluate;
					 }
				 }

			}


		}
			return array('best_tracking'=>$best_tracking,'best_evaluate'=>$best_evaluate);

	}



	public function make_tree($rows)
	{

		$request = $this->best_route($rows);

		$info = $request['best_tracking'];
		$evaluate =$request['best_evaluate'];

		if ($info ==0)
			return new Classifier($this->count_rows($rows));

		$request = $this->part($rows,$evaluate);

		$correct_branch = $this->make_tree($request['match']);
$incorrect_branch = $this->make_tree($request['error']);
    
 
    return new Decide_node($evaluate, $correct_branch, $incorrect_branch);
	}


	public function print_tree($node,$space="")
	{


		if(strpos(get_class($node), "Classifier"))
		{
			echo $space . "Predict".json_encode($node->prediction)    ."<br>";
			return;
		}
  

    echo  $space . $node->evaluate->check() . "<br>";

    echo $space . "--> True: <br>";


   $this->print_tree($node->correct_branch,$space." ");


   echo $space. "--> False: <br>";

    $this->print_tree($node->incorrect_branch, $space . "&nbsp;");
	}


	public function classify($row,$node)
	{
		if(strpos(get_class($node), "Classifier"))
		{
			 
			return $node->prediction;
		}


		if($node->evaluate->compare($row))
		{
			return $this->classify($row,$node->correct_branch);
		}
		else
		{


		return $this->classify($row,$node->incorrect_branch);
		}
	}


	public function print_classify($count)
	{
		$total = 0;


		foreach($count as $key => $value )
		{
			$total+=$value;
		}

 		 

		$probabilities =[];

		foreach ($count as $data => $value) 
		{
 
			$probabilities[$data]= ($count[$data] * 100) / $total  . "%"; 
		}

		return $probabilities;


	}

 
 
}


