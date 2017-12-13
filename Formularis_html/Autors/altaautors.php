<?php
include_once('autors.php');
$autors = new autors($_POST["nom"],$_POST["cognom"],$_POST["nacionalitat"]);
$resultat=$autors-> introduirdades();
return $resultat;
?>
