<?php
/**
 * Model.
 * Es crida als models Connectar i Prestecs per poder treballar amb aquests.
 *
 * @author Roger Forner Fabre
 */
require_once("../models/Connectar.php");
require_once("../models/Prestecs.php");

/**
 * Es crea un objecte $prestecs, el qual es construeix partint de la Classe Prestecs(),
 * per poder treballar amb els elements que componguin aquesta classe. Els elements
 * poden ser paràmetres (determinats en el constructor) o mètodes (accions).
 *
 * A aquest objecte li passem els valors que obtenim a través del mètode POST del
 * formulari, els quals seran passats al mètode eliminarPrestec() de la classe
 * Prestecs().
 *
 * @author Roger Forner Fabre
 * @var prestecs Objecte de la classe Prestecs().
 */
$prestecs = new Prestecs($_POST['id']);
$prestecs->eliminarPrestec();

/**
 * Un cop eliminat el préstec, es fa una redirecció a l'index.php.
 *
 * @author Roger Forner Fabre
 */
header("Location: ../index.php");
?>
