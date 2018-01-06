<?php

  include_once('stock.php'); //Afegim el fitxer stock.php

  $exemplar = new stock($_POST["idllib"],$_POST["est"],$_POST["quant"]); //Creem un nou stock amb els parametres pasats del model

  $exemplar->introduirdades(); //Cridem la funcio introduirdades de l'objecte stock creat anteriorment

  header("Location:../index_stock.php"); //Tornem a la pagina d'inici
?>
