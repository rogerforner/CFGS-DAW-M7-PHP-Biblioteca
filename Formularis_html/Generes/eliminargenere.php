<?php
include_once('genere.php');

$genere = new generes($_POST["id"]);

$genere-> eliminardades();
header("Location:../index_genere.php")
?>
