<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * Connexió a la base de dades.
 *
 * @author Roger Forner Fabre
 */
require_once("models/Connectar.php");

/**
 * Controlador.
 * Es crida el controlador usuaris-index.php. Ens serveix per mostrar la pàgina
 * principal en la que hi haurà la llista de tots els usuaris creats, així com
 * també els botons d'afegir, edició i eliminació.
 *
 * @author Roger Forner Fabre
 */
require_once("controllers/index.php");
?>
