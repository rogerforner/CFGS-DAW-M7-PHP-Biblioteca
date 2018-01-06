<?php
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
<!-- Modal EDITAR Usuari-->
<?php foreach ($dades as $dada): ?>
  <div class="modal fade" id="editarUsuari<?= $dada["ID_Usuari"]; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Hedaer -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="fa fa-pencil" aria-hidden="true"></i> Editar <?= $dada["Nom"]; ?> <?= $dada["Cognom"]; ?>
          </h4>
        </div><!-- /.modal-header -->
        <!-- Body -->
        <form id="editarUsuariForm" action="controllers/editar.php" method="post">
          <div class="modal-body">
            <?php include("editar-formulari.php"); ?>
          </div><!-- /.modal-body -->
          <!-- Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
            <button type="submit" class="btn btn-primary">Actualitzar</button>
          </div><!-- /.modal-footer -->
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>
