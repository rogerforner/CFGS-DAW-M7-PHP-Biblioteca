<?php
include_once('stock.php');

$exemplar = new stock($_POST["id"]);

$exemplar-> eliminardades();
header("Location:../index_stock.php");
?>
