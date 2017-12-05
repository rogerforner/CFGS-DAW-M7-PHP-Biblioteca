<?php
include_once('Usuaris.php');
print_r($_POST["id"]);

// $usuaris = new Usuaris(
//   $_POST["id"]
// );
//
// $usuaris->selectUsuari();

header("Location:../Index_usuaris.php");
?>
