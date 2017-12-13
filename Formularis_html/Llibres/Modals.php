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
                <label for="Llibretitol">Titol</label>
                <input type="text" name="titol" id="ltitol"class="form-control" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">Titol llibre</small>
              </div>
            </div>
            <!-- Cognom -->
            <div class="col">
              <div class="form-group">
                <label for="lnedicio">Numero edició</label>
                <input type="text" name="nedicio" id="lnedicio" class="form-control" aria-describedby="nomAjuda" required>
                <small class="form-text text-muted">numero edició</small>
              </div>
            </div>
          </div>
          <!-- Nacionalitat -->
          <div class="form-group">
            <label for="lpublicacio">Lloc publicació</label>
            <input type="text" name="lloc_publicacio" id="llloc_publicacio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Lloc publicació</small>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="leditorial">editorial</label>
              <input type="text" name="editorial" id="leditorial"class="form-control" aria-describedby="nomAjuda" required>
              <small class="form-text text-muted">Editorial</small>
            </div>
          </div>
          <!-- Cognom -->
          <div class="col">
            <div class="form-group">
              <label for="lany_edicio">any_edicio</label>
              <input type="text" name="any_edicio" id="lany_edicio" class="form-control" aria-describedby="nomAjuda" required>
              <small class="form-text text-muted">Any edició format xxxx-xx-xx</small>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="lISBN">ISBN</label>
              <input type="text" name="isbn" id="lISBN" class="form-control" aria-describedby="nomAjuda" required>
              <small class="form-text text-muted">ISBN</small>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="lquantitat_exemplars">quantitat_exemplars</label>
              <input type="text" name="quantitat_exemplars" id="lquantitat_exemplars" class="form-control" aria-describedby="nomAjuda" required>
              <small class="form-text text-muted">Quantitat exemplars</small>
            </div>
          </div>
          <button type="submit" id="enviarautor" class="btn btn-primary">Afegir</button>
          <span id="mensajes"></span>
        </form>
        <div class="modal-footer">
          <button type="button"  class="btn btn-default" id="close" data-dismiss="modal">Close</button>

        </div>
        </div>

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
