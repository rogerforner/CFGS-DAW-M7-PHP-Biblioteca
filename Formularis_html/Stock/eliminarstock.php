<?php

  include_once('stock.php'); //Afegim el fitxer stock.php

  $exemplar = new stock($_POST["id"]); //Creem un nou stock amb els parametres pasats del model

  $exemplar-> eliminardades(); //Cridem la funcio eliminardades de l'objecte stock creat anteriorment

  header("Location:../index_stock.php"); //Tornem a la pagina d'inici
?>
