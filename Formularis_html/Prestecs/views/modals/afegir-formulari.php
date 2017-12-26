<!-- DNI -->
<div class="form-group">
  <label for="prestecDNI">DNI</label>
  <input type="number" name="dni" min="10000000" max="90000000" class="form-control" id="prestecDNI" aria-describedby="dniAjuda" required>
  <small id="dniAjuda" class="form-text text-muted">El DNI de l'prestec (sense lletra).</small>
</div>

<!-- Nom i Cognom -->
<div class="form-row">
  <!-- Nom -->
  <div class="col">
    <div class="form-group">
      <label for="prestecNom">Nom</label>
      <input type="text" name="nom" class="form-control" id="prestecNom" aria-describedby="nomAjuda" required>
      <small id="nomAjuda" class="form-text text-muted">El nom de l'prestec.</small>
    </div>
  </div>
  <!-- Cognom -->
  <div class="col">
    <div class="form-group">
      <label for="prestecCognom">Cognom</label>
      <input type="text" name="cognom" class="form-control" id="prestecCognom" aria-describedby="cognomAjuda" required>
      <small id="cognomAjuda" class="form-text text-muted">El cognom de l'prestec.</small>
    </div>
  </div>
</div>

<!-- Adreça -->
<div class="form-group">
  <label for="prestecAdreca">Adreça</label>
  <input type="text" name="adreca" class="form-control" id="prestecAdreca" aria-describedby="adrecaAjuda" required>
  <small id="adrecaAjuda" class="form-text text-muted">L'adreça de l'prestec.</small>
</div>

<!-- Població, Província i Nacionalitat -->
<div class="form-row">
  <!-- Població -->
  <div class="col">
    <div class="form-group">
      <label for="prestecPoblacio">Població</label>
      <input type="text" name="poblacio" class="form-control" id="prestecPoblacio" aria-describedby="poblacioAjuda" required>
      <small id="poblacioAjuda" class="form-text text-muted">La població on resideix l'prestec.</small>
    </div>
  </div>
  <!-- Província -->
  <div class="col">
    <div class="form-group">
      <label for="prestecProvincia">Província</label>
      <input type="text" name="provincia" class="form-control" id="prestecProvincia" aria-describedby="provinciaAjuda" required>
      <small id="provinciaAjuda" class="form-text text-muted">Província on resideix l'prestec.</small>
    </div>
  </div>
  <!-- Nacionalitat -->
  <div class="col">
    <div class="form-group">
      <label for="prestecNacionalitat">Nacionalitat</label>
      <input type="text" name="nacionalitat" class="form-control" id="prestecNacionalitat" aria-describedby="nacionalitatAjuda" required>
      <small id="nacionalitatAjuda" class="form-text text-muted">La nacionalitat de l'prestec.</small>
    </div>
  </div>
</div>

<!-- Adreça electrònica -->
<div class="form-group">
  <label for="prestecEmail">Adreça electrònica</label>
  <input type="email" name="email" class="form-control" id="prestecEmail" aria-describedby="emailAjuda" required>
  <small id="emailAjuda" class="form-text text-muted">Adreça electrònica de l'prestec.</small>
</div>

<!-- Telèfon -->
<div class="form-group">
  <label for="prestecTel">Telèfon</label>
  <input type="number" name="telefon" min="100000000" max="900000000" class="form-control" id="prestecTel" aria-describedby="telAjuda" required>
  <small id="telAjuda" class="form-text text-muted">Telèfon de l'prestec.</small>
</div>

<!-- Data naixement -->
<div class="form-group">
  <label for="prestecNaixement">Naixement</label>
  <input type="date" name="naixement" class="form-control" id="prestecNaixement" aria-describedby="naixementAjuda" required>
  <small id="naixementAjuda" class="form-text text-muted">Data de naixement de l'prestec.</small>
</div>
