<?php
$server   = 'localhost';
$usuari   = 'grup1';
$passwd   = 'grup1';
$database = 'biblioteca';


$conexion = new mysqli();
@$conexion->connect($server, $usuari, $passwd, $database);

if (!$conexion->connect_error){
	echo "Connexió correcta";
}else{
	echo "Connexió incorrecta";
}
?>
