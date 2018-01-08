<?php

/*
Aquesta classe conte variables privades sobre llibres i les tres funcions
principals a l'hora de tractar amb llibres com ara:
-Introduir Llibres
-Eliminar Llibres
-Editar Llibres
*/
class LlibreGenere{
	//Variable privades de la classe Llibres
	private $ID_Relaciolg;
	private $Llibres;
	private $Genere;
  private $isbn;

	//Constructor de la classe Llibres
	public function __construct()
 	{
		$args = func_get_args();
   	$num = func_num_args();
   	$f='__construct'. $num;
   	if (method_exists($this,$f)) {
    call_user_func_array(array($this,$f),$args);
  	}
 	}
	public function __construct2($genere,$isbn)
 	{
  	$this->genere=$genere;
    $this->isbn=$isbn;
 	}

//Setters & getters
	public function getid(){
		return $this->ID_Relaciolg;
	}
	public function getllibre(){
		return $this->Llibres;
	}
	public function getgenere(){
		return $this->Genere;
	}


	//Funcio per introduir un nou llibre a la BD
	public function introduirdades(){
    $d=str_split($this->Genere);

		$cadena1="select ID_Llibres from Llibres where ISBN=$this->isbn";
    include_once('../dades.php');
		$result=$conexion->query($cadena1);
    if ($result===TRUE){
     echo"very gooood";
    }else{
      echo $conexion->error;
    }
      // for($i=0;$i<$d.length;$i++){
  		//  	$cadena= "insert into Relacio_llibres_generes(Llibres,Genere)Values(
  		// 	'$result',
  		// 	'$b[$i]',
  		// 	)";
      //   $result1=$conexion2->query($cadena);
      //
      //
      // }
      $conexion->close();
	}

}
?>
