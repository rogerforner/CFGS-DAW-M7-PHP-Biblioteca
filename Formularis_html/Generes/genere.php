<?php

class generes{
public $id;
public $genere;
public $descripcio;


public function __construct(){
     $args = func_get_args();
     $num = func_num_args();
     $f='__construct'. $num;
     if (method_exists($this,$f)) {
       call_user_func_array(array($this,$f),$args);
     }

}
public function __construct1($id){
	
	$this->id=$id;
}
public function __construct2($genere,$descripcio){
	$this->genere=$genere;
	$this->descripcio=$descripcio;

}

public function getgenere(){
	return $this->genere;
}
public function getdesc(){
	return $this->descripcio;
}

public function introduirdades(){
include_once('../dades.php');
$cadena= "insert into Generes(nom,descripcio)values('$this->genere','$this->descripcio')";
$result = $conexion->query($cadena);
if ($result!=TRUE){
	echo"very vad las cahat";
}

$conexion->close();
}



public function eliminardades(){
include_once('../dades.php');
$cadena= "delete from biblioteca.Generes where ID_Genere=$this->id";
$result = $conexion->query($cadena);
if ($result!=TRUE){
	echo"very vad las cahat";
}

$conexion->close();
}


}

?>
