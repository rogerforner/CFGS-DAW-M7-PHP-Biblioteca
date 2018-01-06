<?php
include_once('stock.php');
$exemplar= new stock($_POST['idstock'],$_POST['idest']);

$exemplar->editardades();
header("Location:../index_stock.php");

 ?>
