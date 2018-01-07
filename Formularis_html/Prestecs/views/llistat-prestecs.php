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
 * @var prestecsComptar Objecte de la classe Prestecs().
 * @var cPrestecs Comptador per als préstecs.
 * @var prestecsTotal Total de préstecs que té un usuari.
 * @var dataActual Emprada per saber si s'ha superat la data de devolució.
 */
$prestecs        = new Prestecs();
$dades           = $prestecs->llistarPrestecs();
$prestecsComptar = new Prestecs();
$cPrestecs       = 0;
$dataActual      = date('Y-m-j');
?>
<?php if (isset($_GET['info'])): ?>
  <?php if ($_GET["info"] == "1"): ?>
    <!-- 3 préstecs. -->
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Compte!</strong> L'usuari al qual li vols fer un préstec no en pot rebre més. Aquest ja en té 3.
    </div>
  <?php endif; ?>
  <?php if ($_GET["info"] == "2"): ?>
    <!-- Mínim 1 préstec fora del plaç d'entrega. -->
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Compte!</strong> L'usuari al qual li vols fer un préstec en té, mínim, un fora del plaç d'entrega.
    </div>
  <?php endif; ?>
  <?php if ($_GET["info"] == "3"): ?>
    <!-- Sense exemplars. -->
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Compte!</strong> No pots efectuar el préstec d'un exemplar esgotat.
    </div>
  <?php endif; ?>
<?php endif; ?>

<div class="table-responsive">
  <table id="myTable" class="table table-condensed table-hover">
    <tr class="myTable">
      <th>#</th>
      <th>Préstecs</th>
      <th>Usuari</th>
      <th>Exemplar</th>
      <th>Prestat el</th>
      <th>A tornar</th>
      <th>Acció</th>
    </tr>
    <?php
    foreach ($dades as $dada):
    $prestecsTotal = $prestecsComptar->comptarPrestecs($dada["Usuari"]);
    $cPrestecs++; ?>
      <tr>
        <td><?= $cPrestecs; ?></td>
        <td>
          <?php print_r($prestecsTotal[0]['Total']); ?>
          <?= ($prestecsTotal[0]['Total'] > 1 ? 'préstecs' : 'préstec'); ?>
        </td>
        <td><?= $dada["Usuari_nom"]; ?> <?= $dada["Usuari_cognom"]; ?></td>
        <td><?= $dada["Llibre_titol"]; ?></td>
        <td><?= $dada["Data_sortida"]; ?></td>
        <td <?= ($dada["Data_maxima_devolucio"] < $dataActual ? 'class="text-danger"' : ''); ?>><?= $dada["Data_maxima_devolucio"]; ?></td>
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
