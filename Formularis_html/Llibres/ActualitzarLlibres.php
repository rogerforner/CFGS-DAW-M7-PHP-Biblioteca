<?php
  //Controlador per actualitzar les dades de un Llibre
  include_once('Class_llibres.php');
  $Llibres = new Llibres($_POST["eid"],$_POST["etitol"],$_POST["enedicio"],$_POST["elloc_publicacio"],$_POST["eeditorial"],$_POST["eany_edicio"],$_POST["eisbn"],$_POST["equantitat_exemplars"]);
  $resultatt=$Llibres-> Actualitzardades();
  header('Location:../Index_Llibres.php?id='.$_POST["id"]);
?>
