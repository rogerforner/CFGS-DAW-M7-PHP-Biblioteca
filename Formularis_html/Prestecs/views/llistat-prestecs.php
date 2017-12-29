<?php // Controlador prestecs-index.php
/**
 * Model.
 * Es crida als models Connectar i Prestecs per poder treballar amb aquests.
 *
 * @author Roger Forner Fabre
 */
require_once("models/Connectar.php");
require_once("models/Prestecs.php");

/**
 * Es crea un objecte $prestecs, el qual es construeix partint de la Classe Prestecs(),
 * per poder treballar amb els elements que componguin aquesta classe. Els elements
 * poden ser paràmetres (determinats en el constructor) o mètodes (accions).
 *
 * Tot seguit es crea una variable $dades en la que es guardarà el valor retornat
 * pel mètode llistarPrestecs() de la classe Prestecs().
 *
 * El mètode llistarPrestecs() retorna tots els prestecs de la base de dades amb
 * les seves dades corresponents.
 *
 * @author Roger Forner Fabre
 * @var prestecs Objecte de la classe Prestecs().
 * @var dades Conté un Array amb les dades dels prestecs.
 */
$prestecs = new Prestecs();
$dades    = $prestecs->llistarPrestecs();
?>

<div class="table-responsive">
  <table id="myTable" class="table table-condensed table-hover">
    <tr>
      <th>#</th>
      <th>Préstecs</th>
      <th>Usuari</th>
      <th>Exemplar</th>
      <th>Prestat el</th>
      <th>A tornar</th>
      <th>Acció</th>
    </tr>
    <?php foreach ($dades as $dada): ?>
      <tr>
        <td><?= $dada["ID_Prestec"]; ?></td>
        <td>0 préstecs</td>
        <td><?= $dada["Usuari"]; ?></td>
        <td><?= $dada["Exemplar"]; ?></td>
        <td><?= $dada["Data_sortida"]; ?></td>
        <td><?= $dada["Data_maxima_devolucio"]; ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="...">
            <!-- Editar -->
            <button type="button" class="btn btn-primary" title="Tornat" data-toggle="modal" data-target="#editarPrestec<?= $dada["ID_Prestec"]; ?>Modal">
              <i class="fa fa-reply" aria-hidden="true"></i>
            </button>
            <!-- Eliminar -->
            <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="modal" data-target="#eliminarPrestec<?= $dada["ID_Prestec"]; ?>Modal">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <!-- Accions Editar-Eliminar MODALS -->
  <!-- Editar -->
  <?php include_once("modals/editar.php"); ?>
  <!-- Eliminar -->
  <?php include_once("modals/eliminar.php"); ?>
</div>
