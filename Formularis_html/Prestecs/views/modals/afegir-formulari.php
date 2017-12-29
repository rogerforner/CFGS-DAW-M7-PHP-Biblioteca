<?php // Controlador usuaris-index.php
/**
 * Model.
 * Es crida als models Connectar i Usuaris per poder treballar amb aquests.
 *
 * @author Roger Forner Fabre
 */
require_once("models/Connectar.php");
require_once("models/Usuaris.php");
require_once("models/Exemplars.php");

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
 * + Farem el mateix per llistar els exemplars.
 *
 * @author Roger Forner Fabre
 * @var usuaris Objecte de la classe Usuaris().
 * @var dadesUsuaris Conté un Array amb les dades dels usuaris.
 * @var exemplars Objecte de la classe Exemplars().
 * @var dadesExemplars Conté un Array amb les dades dels exemplars.
 */
$usuaris        = new Usuaris();
$dadesUsuaris   = $usuaris->llistarUsuaris();
$exemplars      = new Exemplars();
$dadesExemplars = $exemplars->llistarExemplars();

$dataActual        = date('Y-m-j');
$dataTornarPrestec = strtotime('+1 week', strtotime($dataActual));
$dataTornarPrestec = date('Y-m-j', $dataTornarPrestec);
?>
<!-- Data de Sortida -->
<div class="form-group">
  <input type="hidden" name="dataSortida" value="<?= $dataActual; ?>" class="form-control" id="prestecDataSortida" required>
</div>
<!-- Data de Màxima Devolució -->
<div class="form-group">
  <input type="hidden" name="dataMaxDevolucio" value="<?= $dataTornarPrestec; ?>" class="form-control" id="prestecDataMaxDevolucio" required>
</div>

<!-- Usuari i Exemplar -->
<div class="form-row">
  <!-- Usuari -->
  <div class="col">
    <div class="form-group">
      <label for="prestecUsuari">Usuari</label>
      <select name="usuari" class="form-control" id="prestecUsuari" aria-describedby="usuariAjuda" required>
        <?php foreach ($dadesUsuaris as $dada): ?>
        <option value="<?= $dada["ID_Usuari"]; ?>"><?= $dada["Nom"]; ?> <?= $dada["Cognom"]; ?></option>
        <?php endforeach; ?>
      </select>
      <small id="usuariAjuda" class="form-text text-muted">Usuari al qual se li fa el préstec.</small>
    </div>
  </div>
  <!-- Exemplar -->
  <div class="col">
    <div class="form-group">
      <label for="prestecExemplar">Exemplar</label>
      <select name="exemplar" class="form-control" id="prestecExemplar" aria-describedby="exemplarAjuda" required>
        <?php foreach ($dadesExemplars as $dada): ?>
        <option value="<?= $dada["ID_Exemplar"]; ?>"><?= $dada["Titol"]; ?></option>
        <?php endforeach; ?>
      </select>
      <small id="exemplarAjuda" class="form-text text-muted">L'exemplar que es presta.</small>
    </div>
  </div>
</div>
