<?php
$server = 'localhost';
$usuari = 'jordi';
$passwd = 'jordi';
$database= 'biblioteca';


$conexion = new mysqli();
@$conexion->connect($server, $usuari, $passwd, $database);

if (!$conexion->connect_error){
	echo "Connexió correcta";
}else{
	echo "Connexió incorrecta";
}
?>
