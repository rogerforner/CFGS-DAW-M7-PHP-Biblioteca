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
 * @var cPrestecs Comptador per als préstecs.
 * @var cPrestecsTornats Comptador per als préstecs tornats.
 */
$prestecs         = new Prestecs();
$dades            = $prestecs->llistarPrestecsTornats();
$prestecsComptar  = new Prestecs();
$cPrestecs        = 0;
?>

<div class="table-responsive">
  <table id="myTable2" class="table table-condensed table-hover">
    <tr>
      <th>#</th>
      <th>Usuari</th>
      <th>Exemplar</th>
      <th>Prestat el</th>
      <th>Tornat</th>
    </tr>
    <?php
    foreach ($dades as $dada):
    $prestecsTotal = $prestecsComptar->comptarPrestecs($dada["Usuari"]);
    $cPrestecs++; ?>
      <tr>
        <td><?= $cPrestecs; ?></td>
        <td><?= $dada["Usuari_nom"]; ?> <?= $dada["Usuari_cognom"]; ?></td>
        <td><?= $dada["Llibre_titol"]; ?></td>
        <td><?= $dada["Data_sortida"]; ?></td>
        <td><?= $dada["Data_real_devolucio"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <!-- Accions Editar-Eliminar MODALS -->
  <!-- Editar -->
  <?php include_once("modals/editar.php"); ?>
  <!-- Eliminar -->
  <?php include_once("modals/eliminar.php"); ?>
</div>
