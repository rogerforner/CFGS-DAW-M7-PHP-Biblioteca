<?php

  include_once('genere.php'); //Afegim el fitxer genere.php

  $genere = new generes($_POST["id"]); //Creem un nou genere amb el parametre pasat per la taula

  $genere-> eliminardades(); //Cridem la funcio eliminardades de l'objecte genere creat anteriorment

  header("Location:../index_genere.php"); //Tornem a la pagina d'inici
?>
