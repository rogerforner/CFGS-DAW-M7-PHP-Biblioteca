<?php // Controlador usuaris-index.php
/**
 * Model.
 * Es crida als models Connectar i Usuaris per poder treballar amb aquests.
 *
 * @author Roger Forner Fabre
 */
require_once("models/Connectar.php");
require_once("models/Usuaris.php");

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
?>

<div class="table-responsive">
  <table id="myTable" class="table table-condensed table-hover">
    <tr>
      <th>#</th>
      <th>DNI</th>
      <th>Nom</th>
      <th>Cognom</th>
      <th>Adreça</th>
      <th>Població</th>
      <th>Província</th>
      <th>Nacionalitat</th>
      <th>Adreça electrònica</th>
      <th>Telèfon</th>
      <th>Data naixement</th>
      <th width="100%">Acció</th>
    </tr>
    <?php foreach ($dades as $dada): ?>
      <tr>
        <td><?= $dada["ID_Usuari"]; ?></td>
        <td><?= $dada["DNI"]; ?></td>
        <td><?= $dada["Nom"]; ?></td>
        <td><?= $dada["Cognom"]; ?></td>
        <td><?= $dada["Adreca"]; ?></td>
        <td><?= $dada["Poblacio"]; ?></td>
        <td><?= $dada["Provincia"]; ?></td>
        <td><?= $dada["Nacionalitat"]; ?></td>
        <td><?= $dada["Adreca_electronica"]; ?></td>
        <td><?= $dada["Telefon"]; ?></td>
        <td><?= $dada["Data_naixement"]; ?></td>
        <td width="100%">
          <div class="btn-group" role="group" aria-label="...">
            <!-- Editar -->
            <button type="button" class="btn btn-primary" title="Editar" data-toggle="modal" data-target="#editarUsuari<?= $dada["ID_Usuari"]; ?>Modal">
              <i class="fa fa-pencil" aria-hidden="true"></i>
            </button>
            <!-- Eliminar -->
            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarUsuari<?= $dada["ID_Usuari"]; ?>Modal">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <!-- Accions Editar-Eliminar MODALS -->
  <!-- Editar -->
  <form action="#" method="post">
    <?php include_once("modals/editar.php"); ?>
  </form>
  <!-- Eliminar -->
  <?php include_once("modals/eliminar.php"); ?>
</div>
