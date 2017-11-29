<?php
include_once('classes/autors.php');
$autors = new autors($_POST["id"]);

$autors-> eliminardades();
?>
