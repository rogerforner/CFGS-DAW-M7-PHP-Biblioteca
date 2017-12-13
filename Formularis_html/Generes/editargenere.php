<?php
include_once('genere.php');

$genere= new generes($_POST['id'],$_POST['nom'],$_POST['desc']);

$genere->editargenere();
header("Location:../index_genere.php");

 ?>
