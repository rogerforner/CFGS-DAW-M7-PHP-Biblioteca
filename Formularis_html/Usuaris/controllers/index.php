<?php // Controlador usuaris-index.php
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
 * Tot seguit es crea una variable $dades en la que es guardarà el valor retornat
 * pel mètode llistarUsuaris() de la classe Usuaris().
 *
 * El mètode llistarUsuaris() retorna tots els usuaris de la base de dades amb
 * les seves dades corresponents.
 *
 * @author Roger Forner Fabre
 * @var usuaris Objecte de la classe Usuaris().
 * @var dades Conté un Array amb les dades dels usuaris.
 */
$usuaris = new Usuaris();
$dades   = $usuaris->llistarUsuaris();

/**
 * Es crida a la vista incloent el fitxer usuaris.php i no pas fent una redirecció.
 * Això és així per poder passar les variables a la vista.
 *
 * @author Roger Forner Fabre
 */
require_once("views/usuaris.php");
?>
