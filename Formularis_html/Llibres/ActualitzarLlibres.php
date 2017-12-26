<?php
include_once('Class_llibres.php');


//
// $autors = new Llibres();
// $id=$_POST["eid"];
// $titol=$_POST["etitol"];
// $any_edicio=$_POST["eany_edicio"];
// lloc_publicacio=$_POST["elloc_publicacio"];
// editorial=$_POST["eeditorial"];
// $nom=$_POST["eany_edicio"];
// $cognom=$_POST["eisbn"];
// $nacionalitat=$_POST["equantitat_exemplars"];
// $resultatt=$autors-> Actualitzardades($id,$nom,$cognom,$nacionalitat);
// header('Location:../Index_autors.php?id='.$_POST["id_autor"]);
//
//
//
//
//
//






$Llibres = new Llibres($_POST["eid"],$_POST["etitol"],$_POST["enedicio"],$_POST["elloc_publicacio"],$_POST["eeditorial"],$_POST["eany_edicio"],$_POST["eisbn"],$_POST["equantitat_exemplars"]);
$resultatt=$Llibres-> Actualitzardades();
header('Location:../Index_Llibres.php?id='.$_POST["id"]);
?>
