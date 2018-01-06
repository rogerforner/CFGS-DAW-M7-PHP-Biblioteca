<?php

  include_once('genere.php'); //Afegim el fitxer genere.php

  $genere= new generes($_POST['b'],""); //Creem un nou genere amb el parametre pasats del ajax i unes cometes simples per a utilitzar un constructor adient

  $genere->comprovar(); //Cridem la funcio comprovar de l'objecte genere creat anteriorment

 ?>
