<?php
include_once('classes/genere.php');
$gen = new generes($_POST["genere"],$_POST["desc"]);


$gen->introduirdades();
?>


