<?php
include_once('Usuaris.php');
print_r($_POST["id"]);

$usuaris = new usuaris(
  $_POST["id"]
);

$usuaris->eliminardades();

header("Location:../Index_usuaris.php");
?>
