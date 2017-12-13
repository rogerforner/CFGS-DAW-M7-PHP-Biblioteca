<?php
include_once('Class_llibres.php');
$Class_llibres = new Class_llibres($_POST["titol"],$_POST["nedicio"],$_POST["lloc_publicacio"],$_POST["editorial"],$_POST["any_edicio"],$_POST["isbn"],$_POST["quantitat_exemplars"]);
$resultat=$Class_llibres-> introduirdades();
return $resultat;
?>
