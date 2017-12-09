<?php // Controlador insertarUsuari.php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * Model.
 * Es crida al model Usuaris per poder treballar amb aquest.
 *
 * @author Roger Forner Fabre
 */
require_once("../models/Usuaris.php");

/**
 * Es crea un objecte $usuaris, el qual es construeix partint de la Classe Usuaris(),
 * per poder treballar amb els elements que componguin aquesta classe. Els elements
 * poden ser paràmetres (determinats en el constructor) o mètodes (accions).
 *
 * A continuació es crida al mètode insertarUsuari() de l'objecte per efectuar
 * una inserció d'un usuari a la base de dades.
 *
 * Desprès es crea una variable $dades en la que es guardarà el valor retornat
 * pel mètode llistarUsuaris() de la classe Usuaris(). Aquest mètode retorna
 * tots els usuaris de la base de dades amb les seves dades corresponents.
 *
 * @author Roger Forner Fabre
 * @var usuaris Objecte de la classe Usuaris(), al qual li passem com a paràmetres
 * les dades obntingudes (submit) des del formulari (post).
 */
print_r($_POST);
// $usuaris = new Usuaris(
//   $_POST["dni"],
//   $_POST["nom"],
//   $_POST["cognom"],
//   $_POST["adreca"],
//   $_POST["poblacio"],
//   $_POST["provincia"],
//   $_POST["nacionalitat"],
//   $_POST["email"],
//   $_POST["telefon"],
//   $_POST["naixement"]
// );
// $usuaris->insertarUsuari();

/**
 * Un cop insertat l'usuari ens interessa redirigir a la vista index.php.
 *
 * @author Roger Forner Fabre
 */
header("Location: index.php");
?>
