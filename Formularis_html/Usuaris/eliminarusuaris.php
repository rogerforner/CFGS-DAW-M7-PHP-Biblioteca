<?php
include_once('usuaris.php');

$usuaris = new usuaris(
  $_POST["id"]
);

$usuaris-> eliminardades();

header("Location:../Index_usuaris.php");
?>
