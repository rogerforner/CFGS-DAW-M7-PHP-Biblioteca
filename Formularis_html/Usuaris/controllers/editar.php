<?php // Controlador usuaris-index.php
/**
 * Model.
 * Es crida als models Connectar i Usuaris per poder treballar amb aquests.
 *
 * @author Roger Forner Fabre
 */
require_once("../models/Connectar.php");
require_once("../models/Usuaris.php");

/**
 * Es crea un objecte $usuaris, el qual es construeix partint de la Classe Usuaris(),
 * per poder treballar amb els elements que componguin aquesta classe. Els elements
 * poden ser paràmetres (determinats en el constructor) o mètodes (accions).
 *
 * @author Roger Forner Fabre
 * @var usuaris Objecte de la classe Usuaris().
 */
$usuaris = new Usuaris(
  $_POST['id'],
  $_POST['dni'],
  $_POST['nom'],
  $_POST['cognom'],
  $_POST['adreca'],
  $_POST['poblacio'],
  $_POST['provincia'],
  $_POST['nacionalitat'],
  $_POST['email'],
  $_POST['telefon'],
  $_POST['naixement']
);
$usuaris->editarUsuari();

/**
 * Un cop eliminat l'usuari, es fa una redirecció a l'index.php.
 *
 * @author Roger Forner Fabre
 */
header("Location: ../index.php");
?>
