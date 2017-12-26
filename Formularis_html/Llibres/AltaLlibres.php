<?php
include_once('Class_llibres.php');
$Llibres = new Llibres($_POST["titol"],$_POST["nedicio"],$_POST["lloc_publicacio"],$_POST["editorial"],$_POST["any_edicio"],$_POST["isbn"],$_POST["quantitat_exemplars"]);
$resultat=$Llibres-> introduirdades();
return $resultat;
?>
