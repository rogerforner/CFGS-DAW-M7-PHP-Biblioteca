<?php
include_once('Class_llibres.php');
echo "hola";
$Llibres = new Llibres($_POST["id"]);
$Llibres-> eliminardades();
header("Location:../Index_Llibres.php");

?>
