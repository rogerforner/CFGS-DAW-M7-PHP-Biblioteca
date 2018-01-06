<?php
include_once('Class_autors.php');
$autors = new autors();
$id=$_POST["ID_Autor"];
$nom=$_POST["Nom"];
$cognom=$_POST["Cognom"];
$nacionalitat=$_POST["Nacionalitat"];
$resultatt=$autors-> Actualitzardades($id,$nom,$cognom,$nacionalitat);
header('Location:../Index_autors.php?id='.$_POST["id_autor"]);
?>
