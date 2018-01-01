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
 * formulari, els quals seran passats al mètode validarPrestec() de la classe
 * Prestecs().
 *
 * Amb el mètode validarPrestec() es valida el préstec que es genera, de tal manera
 * que si l'usuari sobre el qual se li aplica té un préstec a tornar fora de plaç
 * no permetrá la inserció d'aquest a la DB. També s'evitarà quan aquest usuari
 * tingui un màxim de 3 préstecs.
 *
 * Per poder informar sobre el resultat de la validació, en el cas de que aquesta
 * sigui impossible de dur-se a terme, es passarà per la URL el paràmetre ?info=.
 * - info=1 voldrà dir que l'usuari ja disposa de 3 préstecs.
 * - info=2 voldrà dir que l'usuari té un préstec, mínim, fora del plaç d'entrega.
 *
 * @author Roger Forner Fabre
 * @var prestecs Objecte de la classe Prestecs().
 * @var info Paràmetre passat per la URL per informar quan un usuari no pot
 * disposar de més préstecs.
 */
$prestecs = new Prestecs(
  $_POST['dataSortida'],
  $_POST['dataMaxDevolucio'],
  $_POST['exemplar'],
  $_POST['usuari']
);
$prestecs->validarPrestec();

// Passarem la resposta obtinguda com a paràmetre a través de la URL.
$info = '?info='.$prestecs->validarPrestec();

/**
 * Un cop inserit el préstec, es fa una redirecció a l'index.php.
 *
 * @author Roger Forner Fabre
 */
header("Location: ../index.php".$info."");
?>
