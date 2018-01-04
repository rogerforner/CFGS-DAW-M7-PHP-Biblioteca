<?php

  include_once('stock.php');
  $exemplar = new stock($_POST["idllib"],$_POST["est"],$_POST["quant"]);

  $exemplar->introduirdades();


  header("Location:../index_stock.php");

?>
