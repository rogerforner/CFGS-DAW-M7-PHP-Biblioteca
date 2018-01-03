<!-- ID -->
<div class="form-group">
  <input type="hidden" name="id" value="<?= $dada["ID_Usuari"]; ?>" class="form-control" id="usuariID" required>
</div>
<!-- DNI -->
<div class="form-group">
  <label for="usuariDNI">DNI</label>
  <input type="number" name="dni" value="<?= $dada["DNI"]; ?>" min="10000000" max="90000000" class="form-control" id="usuariDNI" aria-describedby="dniAjuda" required>
  <small id="dniAjuda" class="form-text text-muted">El DNI de l'usuari (sense lletra).</small>
</div>

<!-- Nom i Cognom -->
<div class="form-row">
  <!-- Nom -->
  <div class="col">
    <div class="form-group">
      <label for="usuariNom">Nom</label>
      <input type="text" name="nom" value="<?= $dada["Nom"]; ?>" class="form-control" id="usuariNom" aria-describedby="nomAjuda" required>
      <small id="nomAjuda" class="form-text text-muted">El nom de l'usuari.</small>
    </div>
  </div>
  <!-- Cognom -->
  <div class="col">
    <div class="form-group">
      <label for="usuariCognom">Cognom</label>
      <input type="text" name="cognom" value="<?= $dada["Cognom"]; ?>" class="form-control" id="usuariCognom" aria-describedby="cognomAjuda" required>
      <small id="cognomAjuda" class="form-text text-muted">El cognom de l'usuari.</small>
    </div>
  </div>
</div>

<!-- Adreça -->
<div class="form-group">
  <label for="usuariAdreca">Adreça</label>
  <input type="text" name="adreca" value="<?= $dada["Adreca"]; ?>" class="form-control" id="usuariAdreca" aria-describedby="adrecaAjuda" required>
  <small id="adrecaAjuda" class="form-text text-muted">L'adreça de l'usuari.</small>
</div>

<!-- Població, Província i Nacionalitat -->
<div class="form-row">
  <!-- Població -->
  <div class="col">
    <div class="form-group">
      <label for="usuariPoblacio">Població</label>
      <input type="text" name="poblacio" value="<?= $dada["Poblacio"]; ?>" class="form-control" id="usuariPoblacio" aria-describedby="poblacioAjuda" required>
      <small id="poblacioAjuda" class="form-text text-muted">La població on resideix l'usuari.</small>
    </div>
  </div>
  <!-- Província -->
  <div class="col">
    <div class="form-group">
      <label for="usuariProvincia">Província</label>
      <input type="text" name="provincia" value="<?= $dada["Provincia"]; ?>" class="form-control" id="usuariProvincia" aria-describedby="provinciaAjuda" required>
      <small id="provinciaAjuda" class="form-text text-muted">Província on resideix l'usuari.</small>
    </div>
  </div>
  <!-- Nacionalitat -->
  <div class="col">
    <div class="form-group">
      <label for="usuariNacionalitat">Nacionalitat</label>
      <input type="text" name="nacionalitat" value="<?= $dada["Nacionalitat"]; ?>" class="form-control" id="usuariNacionalitat" aria-describedby="nacionalitatAjuda" required>
      <small id="nacionalitatAjuda" class="form-text text-muted">La nacionalitat de l'usuari.</small>
    </div>
  </div>
</div>

<!-- Adreça electrònica -->
<div class="form-group">
  <label for="usuariEmail">Adreça electrònica</label>
  <input type="email" name="email" value="<?= $dada["Adreca_electronica"]; ?>" class="form-control" id="usuariEmail" aria-describedby="emailAjuda" required>
  <small id="emailAjuda" class="form-text text-muted">Adreça electrònica de l'usuari.</small>
</div>

<!-- Telèfon -->
<div class="form-group">
  <label for="usuariTel">Telèfon</label>
  <input type="number" name="telefon" value="<?= $dada["Telefon"]; ?>" min="100000000" max="999999999" class="form-control" id="usuariTel" aria-describedby="telAjuda" required>
  <small id="telAjuda" class="form-text text-muted">Telèfon de l'usuari.</small>
</div>

<!-- Data naixement -->
<div class="form-group">
  <label for="usuariNaixement">Naixement</label>
  <input type="date" name="naixement" value="<?= $dada["Data_naixement"]; ?>" class="form-control" id="usuariNaixement" aria-describedby="naixementAjuda" required>
  <small id="naixementAjuda" class="form-text text-muted">Data de naixement de l'usuari.</small>
</div>
