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
 * @var dataMaxDev Conté com a valor la data de màxima devolució. Emprada per
 * poder mostrar un missatge que avisa si està o no fora del plaç d'entrega.
 */
$prestecs = new Prestecs();
$dades   = $prestecs->llistarPrestecs();
?>
<!-- Modal EDITAR Prestec-->
<?php foreach ($dades as $dada): ?>
  <div class="modal fade" id="editarPrestec<?= $dada["ID_Prestec"]; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Hedaer -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="fa fa-reply" aria-hidden="true"></i> Préstec de <?= $dada["Usuari_nom"]; ?> <?= $dada["Usuari_cognom"]; ?>
          </h4>
        </div><!-- /.modal-header -->
        <!-- Body -->
        <form id="editarPrestecForm" action="controllers/editar.php" method="post">
          <div class="modal-body">
            <!-- Formulari en el que només passem la ID. -->
            <?php include("editar-formulari.php"); ?>

            <!-- Informació sobre el llibre prestat. -->
            <ul>
              <li><strong>Llibre</strong> <em><?= $dada["Llibre_titol"]; ?></em></li>
              <li><strong>Prestat el</strong> <?= $dada["Data_sortida"]; ?></li>
              <li><strong>A tornar el</strong> <?= $dada["Data_maxima_devolucio"]; ?></li>
            </ul>

            <!-- Missatge sobre l'estat del préstec. -->
            <?php
            $dataMaxDev = $dada["Data_maxima_devolucio"];

            if ($dataMaxDev > $dataMaxDev): ?>
              <p class="text-danger">Fora del plaç d'entrega.</p>
            <?php else: ?>
              <p class="text-success">Dintre del plaç d'entrega.</p>
            <?php endif; ?>

          </div><!-- /.modal-body -->
          <!-- Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
            <button type="submit" class="btn btn-primary">Tornat</button>
          </div><!-- /.modal-footer -->
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>
