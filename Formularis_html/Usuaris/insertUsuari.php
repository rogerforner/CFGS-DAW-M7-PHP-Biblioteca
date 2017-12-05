<?php
include_once('Usuaris.php');

$usuaris = new Usuaris(
  $_POST["dni"],
  $_POST["nom"],
  $_POST["cognom"],
  $_POST["adreca"],
  $_POST["poblacio"],
  $_POST["provincia"],
  $_POST["nacionalitat"],
  $_POST["email"],
  $_POST["telefon"],
  $_POST["naixement"]
);

$usuaris->insertUsuari();

header("Location:../Index_usuaris.php");
?>
