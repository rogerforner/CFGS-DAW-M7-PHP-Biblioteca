<?php

class autors{

public $nom;
public $cognom;
public $nacionalitat;

public function __construct($nom,$cognom,$nacionalitat){
	$this->nom=$nom;
	$this->cognom=$cognom;
  $this->nacionalitat=$nacionalitat;
}


public function getnom(){
	return $this->nom;
}
public function getcognom(){
	return $this->cognom;
}
public function getnacionalitat(){
	return $this->nacionalitat;
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
