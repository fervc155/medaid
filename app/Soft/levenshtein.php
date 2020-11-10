<?php

namespace App\Soft;

use App\Speciality;
use App\User;
use App\Soft\JaroWinkler;
use Illuminate\Database\Eloquent\Collection;


class Levenshtein  
{
	public static function searchIn($models, $s)
	{

		if(strlen($s)<1)
		{
			return $models;
		}

		$s = strtolower($s);


		$collection=[];

		if (get_class($models->first())=='App\User') 
		{
			$collection = Collection::make(new User);
		}

		else  if (get_class($models->first())=='App\Speciality') 
		{
			$collection = Collection::make(new Speciality);
		}

		else 
			return $models;


   //     $corpus = math::sort(levenshtein::dataset($models, $busqueda));
     $corpus = math::sort(levenshtein::dataset($models, $s));


    


        foreach ($corpus as $array) 

        {
           $collection->push($models->find($array[0]));
        }
 
 

		return $collection;

	}

	public static function corpus($models, $s)
	{

		$s = strtolower($s);



		$tablaDeMatch= array();
		$tabladetabla= array();

		foreach ($models as $model ) 
		{
			$tablaDeMatch= array();

			$stringName = strtolower($model->name);

			$explodeSearch = explode(' ',$s);
			$countMatch=0;

			
			foreach (explode(' ',$stringName) as $subName) 
			{


				$distancias = array();
				foreach ($explodeSearch as $key=> $subSearch) 
		//	for($i =0 ;$i< count($subName); $i++)
				{
					$lev=levenshtein($subName,$subSearch);
					$jaro =JaroWinkler::JaroWinkler($subName,$subSearch);

					array_push($distancias,array($jaro,strlen($subName),strlen($subSearch)));
					if($jaro> 0.70)
					{  

						$countMatch++;

						unset($explodeSearch[$key]);
						
						break;


					}
				}


				

				array_push($tablaDeMatch,array($distancias,$countMatch,$subName));
			}

			array_push($tabladetabla,array($tablaDeMatch,$stringName,$countMatch));

		}


		return $tabladetabla;

	}

	public static function exactitud($models, $s)
	{

		$s = strtolower($s);

		

		$tablaDeMatch= array();
		$tabladetabla= array();

		foreach ($models as $model ) 
		{
			$tablaDeMatch= array();

			$stringName = strtolower($model->name);

			$explodeSearch = explode(' ',$s);
			$countMatch=0;

			foreach (explode(' ',$stringName) as $subName) 
			{


				$distancias = 0;
				$distanciasLev = 99;
				foreach ($explodeSearch as $key=> $subSearch) 
				{
					$lev=levenshtein($subName,$subSearch);
					
					$jaro =JaroWinkler::JaroWinkler($subName,$subSearch);
					
					if($jaro>= 0.70 && $lev<= max(strlen($subName),strlen($subSearch))/2)
					{  
						$distancias= ($jaro>$distancias)? $jaro : $distancias ;
						$distanciasLev= ($lev<$distanciasLev)? $lev : $distanciasLev ;
						

						$countMatch++;
						unset($explodeSearch[$key]);

						break;
						

					}
				}

				array_push($tablaDeMatch,array($distancias,$subName));
			}

			array_push($tabladetabla,array($tablaDeMatch,$stringName,$countMatch));

		}


		return $tabladetabla;

	}


	public static function dataset($models, $s)
	{

		$s = strtolower($s);

		

		 
		$element= array();

		foreach ($models as $model ) 
		{
			
			$stringName = strtolower($model->name);
			$explodeString = explode(' ',$stringName);

			$explodeSearch = explode(' ',$s);

			$countSearch = count($explodeSearch);
			$countName = count($explodeString);

			
			$countMatch=0;
			$indiceJaro=0;
			$indiceLev=0;

			foreach ( $explodeString as $subName) 
			{


				$distancias = 0;
				$distanciasLev = 99;
				foreach ($explodeSearch as $key=> $subSearch) 
				{
					$lev=levenshtein($subName,$subSearch);
					
					$jaro =JaroWinkler::JaroWinkler($subName,$subSearch);
					$distanciasLev= ($lev<$distanciasLev)? $lev : $distanciasLev ;
					
					if($jaro>= 0.70 && $lev<= max(strlen($subName),strlen($subSearch))/2)
					{  
						$distancias= ($jaro>$distancias)? $jaro : $distancias ;

						
						$countMatch++;
						unset($explodeSearch[$key]);

						break;
						

					}

				}

				$indiceJaro+=$distancias;
				$indiceLev+=$distanciasLev;

				
			}

			if($countMatch>0)
			{


				array_push($element,

					array(
						$model->id,
						Math::distance3D(
							1,0,$countSearch,
							$indiceJaro/max($countSearch,$countName),$indiceLev/max($countSearch,$countName),   $countMatch
						)  ));
			}

		}


		return $element;

	}

	public static function indice()
	{

		$busqueda = "mis brok pancha";
//$busqueda = "miss brooklin pacocha";
//$busqueda = "brooklin pacocha miss";

		$maxMath = count(explode(' ',$busqueda));




		$corpus = levenshtein::exactitud(User::all(), $busqueda);


		echo $busqueda;
		echo "<br>";
		echo "max match: $maxMath";
		echo "<br>";

		echo "Cantidad nombres: ".count($corpus);

		echo "<br>";


		foreach ($corpus as $tabla) {
			if($tabla[2]>0)
			{
				echo "<table  ><thead><tr><th>Tabla de match</th><th>nombre</th><th>numero matches</th></tr></thead> ";





				echo "<tr> ";
				echo "<td> ";



				echo "<table><thead><tr><th>tabla</th><th>contador match</th><th>Nombre</th></tr></thead> ";


				foreach ($tabla[0] as $nombre) {


					echo "<tr> ";
					echo "<td> ";



					echo $nombre[0];   

					

					echo "</td> ";

					echo "<td> ";
					echo $nombre[1];

					echo "</td> ";
					

					echo "</tr> ";





				}

				$cantidad=0;

				foreach ($tabla[0] as $nombre) {

					



					$cantidad+= $nombre[0];   

					
					




				}



				echo "<tr> ";
				echo "<td> ";

				
				echo $cantidad / count($tabla[0]);

				echo "</td> ";
				

				echo "</tr> ";




				echo "</table>";



				echo "</td> ";
				echo "<td> ";
				echo $tabla[1];

				echo "</td> ";
				echo "<td> ";


				echo "</td> ";
				echo "<td> ";
				echo $tabla[2];

				echo "</td> ";
				echo "<td> ";

				echo "</table>";
			}
		}

	}



	public static function table()
	{

		echo "Tabla de exactitud <br>";
		$busqueda = "mis brok pancha";
		$maxMath = count(explode(' ',$busqueda));




		$corpus = levenshtein::corpus(User::all(), $busqueda);


		echo $busqueda;
		echo "<br>";
		echo "max match: $maxMath";
		echo "<br>";

		echo "Cantidad nombres: ".count($corpus);

		echo "<br>";


		foreach ($corpus as $tabla) {
			if($tabla[2]>0)
			{
				echo "<table ><thead><tr><th>Tabla de match</th><th>nombre</th><th>numero matches</th></tr></thead> ";





				echo "<tr> ";
				echo "<td> ";



				echo "<table><thead><tr><th>tabla</th><th>contador match</th><th>Nombre</th></tr></thead> ";


				foreach ($tabla[0] as $nombre) {


					echo "<tr> ";
					echo "<td> ";




					foreach ($nombre[0] as $distancia) 
					{





						echo $distancia[0] ." ";//." - ".$distancia[1]. " - ".$distancia[2];

						//echo "<br>";

					}

					echo "</td> ";

					echo "<td> ";
					echo $nombre[1];

					echo "</td> ";

					echo "<td> ";
					echo $nombre[2];

					echo "</td> ";

					echo "</tr> ";





				}

				echo "</table>";



				echo "</td> ";
				echo "<td> ";
				echo $tabla[1];

				echo "</td> ";
				echo "<td> ";


				echo "</td> ";
				echo "<td> ";
				echo $tabla[2];

				echo "</td> ";
				echo "<td> ";

				echo "</table>";
			}
		}
	}



}
