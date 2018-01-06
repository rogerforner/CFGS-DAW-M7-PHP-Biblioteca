<?php
include_once('Class_autors.php');
$autors = new autors($_POST["nom"],$_POST["cognom"],$_POST["nacionalitat"]);
$resultat=$autors-> introduirdades();
return $resultat;
?>
