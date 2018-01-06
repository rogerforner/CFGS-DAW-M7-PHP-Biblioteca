<?php

  include_once('genere.php'); //Afegim el fitxer genere.php

  $gen = new generes($_POST["genere"],$_POST["desc"]); //Creem un nou genere amb els parametres pasats del model

  $gen->introduirdades(); //Cridem la funcio introduirdades de l'objecte genere creat anteriorment

  header("Location:../index_genere.php"); //Tornem a la pagina d'inici
?>
