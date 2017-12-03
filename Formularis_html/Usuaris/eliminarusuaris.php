<?php
include_once('Usuaris.php');

$usuaris = new usuaris(
  $_POST["id"]
);

$usuaris->eliminardades();

header("Location:../Index_usuaris.php");
?>
