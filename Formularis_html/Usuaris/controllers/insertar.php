<?php
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
 * A aquest objecte li passem els valors que obtenim a través del mètode POST del
 * formulari, els quals seran passats al mètode validarUsuari() de la classe
 * Usuaris().
 *
 * Amb el mètode validarUsuari() es valida l'usuari que es genera, de tal manera
 * que si l'usuari sobre el qual se li aplica té un email ja existent no es permetrá
 * la inserció d'aquest a la DB.
 *
 * Per poder informar sobre el resultat de la validació, en el cas de que aquesta
 * sigui impossible de dur-se a terme, es passarà per la URL el paràmetre ?info=.
 * - info=1 voldrà dir que l'email introduït ja existeix a la DB.
 *
 * @author Roger Forner Fabre
 * @var usuaris Objecte de la classe Usuaris().
 * @var info Paràmetre passat per la URL per informar quan un usuari no pot
 * disposar de més préstecs.
 */
$usuaris = new Usuaris(
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
$usuaris->validarUsuari();

// Passarem la resposta obtinguda com a paràmetre a través de la URL.
$info = '?info='.$usuaris->validarUsuari();

/**
 * Un cop inserit l'usuari, es fa una redirecció a l'index.php.
 *
 * @author Roger Forner Fabre
 */
header("Location: ../index.php".$info."");
?>
