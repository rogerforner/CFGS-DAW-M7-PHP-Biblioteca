<?php
include_once('Usuaris.php');
//print_r($_POST["id"]);

$usuaris = new Usuaris(
  $_POST["id"]
);

$dadesUsuari = $usuaris->obtenirdades();
print_r($dadesUsuari);

header("Location:../Index_usuaris.php");
?>
