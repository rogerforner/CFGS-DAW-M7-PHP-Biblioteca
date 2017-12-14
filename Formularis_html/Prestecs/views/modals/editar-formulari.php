<!-- ID -->
<div class="form-group">
  <input type="hidden" name="id" value="<?= $dada["ID_Prestec"]; ?>" class="form-control" id="prestecID" required>
</div>
<!-- DNI -->
<div class="form-group">
  <label for="prestecDNI">DNI</label>
  <input type="number" name="dni" value="<?= $dada["DNI"]; ?>" min="10000000" max="90000000" class="form-control" id="prestecDNI" aria-describedby="dniAjuda" required>
  <small id="dniAjuda" class="form-text text-muted">El DNI de l'prestec (sense lletra).</small>
</div>

<!-- Nom i Cognom -->
<div class="form-row">
  <!-- Nom -->
  <div class="col">
    <div class="form-group">
      <label for="prestecNom">Nom</label>
      <input type="text" name="nom" value="<?= $dada["Nom"]; ?>" class="form-control" id="prestecNom" aria-describedby="nomAjuda" required>
      <small id="nomAjuda" class="form-text text-muted">El nom de l'prestec.</small>
    </div>
  </div>
  <!-- Cognom -->
  <div class="col">
    <div class="form-group">
      <label for="prestecCognom">Cognom</label>
      <input type="text" name="cognom" value="<?= $dada["Cognom"]; ?>" class="form-control" id="prestecCognom" aria-describedby="cognomAjuda" required>
      <small id="cognomAjuda" class="form-text text-muted">El cognom de l'prestec.</small>
    </div>
  </div>
</div>

<!-- Adreça -->
<div class="form-group">
  <label for="prestecAdreca">Adreça</label>
  <input type="text" name="adreca" value="<?= $dada["Adreca"]; ?>" class="form-control" id="prestecAdreca" aria-describedby="adrecaAjuda" required>
  <small id="adrecaAjuda" class="form-text text-muted">L'adreça de l'prestec.</small>
</div>

<!-- Població, Província i Nacionalitat -->
<div class="form-row">
  <!-- Població -->
  <div class="col">
    <div class="form-group">
      <label for="prestecPoblacio">Població</label>
      <input type="text" name="poblacio" value="<?= $dada["Poblacio"]; ?>" class="form-control" id="prestecPoblacio" aria-describedby="poblacioAjuda" required>
      <small id="poblacioAjuda" class="form-text text-muted">La població on resideix l'prestec.</small>
    </div>
  </div>
  <!-- Província -->
  <div class="col">
    <div class="form-group">
      <label for="prestecProvincia">Província</label>
      <input type="text" name="provincia" value="<?= $dada["Provincia"]; ?>" class="form-control" id="prestecProvincia" aria-describedby="provinciaAjuda" required>
      <small id="provinciaAjuda" class="form-text text-muted">Província on resideix l'prestec.</small>
    </div>
  </div>
  <!-- Nacionalitat -->
  <div class="col">
    <div class="form-group">
      <label for="prestecNacionalitat">Nacionalitat</label>
      <input type="text" name="nacionalitat" value="<?= $dada["Nacionalitat"]; ?>" class="form-control" id="prestecNacionalitat" aria-describedby="nacionalitatAjuda" required>
      <small id="nacionalitatAjuda" class="form-text text-muted">La nacionalitat de l'prestec.</small>
    </div>
  </div>
</div>

<!-- Adreça electrònica -->
<div class="form-group">
  <label for="prestecEmail">Adreça electrònica</label>
  <input type="email" name="email" value="<?= $dada["Adreca_electronica"]; ?>" class="form-control" id="prestecEmail" aria-describedby="emailAjuda" required>
  <small id="emailAjuda" class="form-text text-muted">Adreça electrònica de l'prestec.</small>
</div>

<!-- Telèfon -->
<div class="form-group">
  <label for="prestecTel">Telèfon</label>
  <input type="number" name="telefon" value="<?= $dada["Telefon"]; ?>" min="100000000" max="900000000" class="form-control" id="prestecTel" aria-describedby="telAjuda" required>
  <small id="telAjuda" class="form-text text-muted">Telèfon de l'prestec.</small>
</div>

<!-- Data naixement -->
<div class="form-group">
  <label for="prestecNaixement">Naixement</label>
  <input type="date" name="naixement" value="<?= $dada["Data_naixement"]; ?>" class="form-control" id="prestecNaixement" aria-describedby="naixementAjuda" required>
  <small id="naixementAjuda" class="form-text text-muted">Data de naixement de l'prestec.</small>
</div>
