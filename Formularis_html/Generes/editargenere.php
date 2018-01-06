<?php

  include_once('genere.php'); //Afegim el fitxer genere.php

  $genere= new generes($_POST['idgen'],$_POST['genere'],$_POST['desc']); //Creem un nou genere amb els parametres pasats del model

  $genere->editardades(); //Cridem la funcio editardades de l'objecte genere creat anteriorment

  header("Location:../index_genere.php"); //Tornem a la pagina d'inici

 ?>
