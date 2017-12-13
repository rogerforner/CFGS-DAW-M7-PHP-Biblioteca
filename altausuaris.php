<?php
include_once('classes/usuaris.php');

$usuaris = new usuaris(
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

$usuaris->introduirdades();
?>
