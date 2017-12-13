<!-- Aquest fitxer conte els modals de crear i editar -->

<!-- Modal Crear-->
<div class="modal fade" id="addautor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-row">
            <!-- Nom -->
            <div class="col">
              <div class="form-group">
                <label for="autorNom">Nom</label>
                <input type="text" name="nom" id="nomAutor"class="form-control" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">El nom de l'autor.</small>
              </div>
            </div>
            <!-- Cognom -->
            <div class="col">
              <div class="form-group">
                <label for="autorCognom">Cognom</label>
                <input type="text" name="cognom" id="cognomAutor" class="form-control" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">El cognom de l'autor.</small>
              </div>
            </div>
          </div>
          <!-- Nacionalitat -->
          <div class="form-group">
            <label for="autorNacionalitat">Nacionalitat</label>
            <input type="text" name="nacionalitat" id="nacionalitatAutor" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">La nacionalitat de l'autor.</small>
          </div>
          <button type="submit" id="enviarautor" class="btn btn-primary">Afegir</button>
          <span id="mensajes"></span>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default" id="close" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="editarautor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update</h4>
      </div>
      <div class="modal-body">
        <form action="Autors/Actualitzardades.php" method="post">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <label for="autorNom">ID</label>
                <input type="text" name="ID_Autor" class="form-control" id="aid" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">El nom de l'autor.</small>
              </div>
            </div>
            <!-- Nom -->
            <div class="col">
              <div class="form-group">
                <label for="autorNom">Nom</label>
                <input type="text" name="Nom" class="form-control" id="anom" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">El nom de l'autor.</small>
              </div>
            </div>
            <!-- Cognom -->
            <div class="col">
              <div class="form-group">
                <label for="autorCognom">Cognom</label>
                <input type="text" id="acognom" name="Cognom" class="form-control" aria-describedby="cognomAjuda" required>
                <small class="form-text text-muted">El cognom de l'autor.</small>
              </div>
            </div>
          </div>

          <!-- Nacionalitat -->
          <div class="form-group">
            <label for="autorNacionalitat">Nacionalitat</label>
            <input type="text"  id="anacionalitat" name="Nacionalitat" class="form-control" aria-describedby="nacionalitatAjuda" required>
            <small class="form-text text-muted">La nacionalitat de l'autor.</small>
          </div>

          <!-- Submit -->
          <button type="submit" class="btn btn-primary" value="$registroautors['ID_Autor']">Afegir</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
