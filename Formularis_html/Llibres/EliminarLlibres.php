<?php
  //Constructor per eliminar dades de un Llibre
  include_once('Class_llibres.php');
  $Llibres = new Llibres($_POST["id"]);
  $Llibres-> eliminardades();
  header("Location:../Index_Llibres.php");
?>
