<?php

  include_once('stock.php'); //Afegim el fitxer stock.php

  $exemplar= new stock($_POST['idstock'],$_POST['idest']); //Creem un nou stock amb els parametres pasats del model

  $exemplar->editardades(); //Cridem la funcio editardades de l'objecte stock creat anteriorment

  header("Location:../index_stock.php"); //Tornem a la pagina d'inici
?>
