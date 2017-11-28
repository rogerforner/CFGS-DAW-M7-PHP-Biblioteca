<?php

class generes{

public $genere;
public $descripcio;

public function __construct($genere,$descripcio){
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
include_once('dades.php');
$cadena= "insert into Generes(nom,descripcio)values('$this->genere','$this->descripcio')";
$result = $conexion->query($cadena);
if ($result===TRUE){
	echo"very gooood";
}else{
	echo"very vad las cahat";
}

$conexion->close(); 
}
}

?>
