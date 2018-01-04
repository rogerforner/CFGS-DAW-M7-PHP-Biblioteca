<?php
include_once('genere.php');

$gen = new generes($_POST["genere"],$_POST["desc"]);


$gen->introduirdades();
header("Location:../index_genere.php")
?>
