<?php
include_once('classes/autors.php');
$autors = new autors($_POST["nom"],$_POST["cognom"],$_POST["nacionalitat"]);

$autors-> introduirdades();
?>
