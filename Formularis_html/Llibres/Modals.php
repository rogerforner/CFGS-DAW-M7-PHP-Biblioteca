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
        <form name="formulari" id="formulari" action="" method="post">
          <!-- Titol -->
          <div class="form-group">
            <label for="Llibretitol">Titol</label>
            <input type="text" name="titol" id="ltitol"class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Titol llibre</small>
          </div>
          <!-- Numero edicio -->
          <div class="form-group">
            <label for="lnedicio">Numero edició</label>
            <input type="text" name="nedicio" id="lnedicio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">numero edició</small>
          </div>

          <!-- Lloc publicacio -->
          <div class="form-group">
            <label for="lpublicacio">Lloc publicació</label>
            <input type="text" name="lloc_publicacio" id="llloc_publicacio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Lloc publicació</small>
          </div>
          <!-- Editorial -->
          <div class="form-group">
            <label for="leditorial">editorial</label>
            <input type="text" name="editorial" id="leditorial"class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Editorial</small>
          </div>
          <!-- Any edicio -->
          <div class="form-group">
            <label for="lany_edicio">any_edicio</label>
            <input type="text" name="any_edicio" id="lany_edicio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Any edició format xxxx-xx-xx</small>
          </div>
          <!-- ISBN -->
          <div class="form-group">
            <label for="lISBN">ISBN</label>
            <input type="text" name="isbn" id="lISBN" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">ISBN</small>
          </div>
          <!-- Quantitat exemplars -->
          <div class="form-group">
            <label for="lquantitat_exemplars">quantitat_exemplars</label>
            <input type="text" name="quantitat_exemplars" id="lquantitat_exemplars" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Quantitat exemplars</small>
          </div>
          <div class="form-group">
            <label for="lquantitat_exemplars">Introdueix el numero de genere separat per ","</label><br/>

            <?php
            $dato1= array();
            $contador=0;
            $valor="";
            while ($dades2=$result2->fetch_assoc()) {
              $valor=$dades2['ID_Genere'];
              $dato1 = array($valor);

                echo '
                  <label id="idgenere[]" value="'.$dades2['ID_Genere'].'">'.$dades2['ID_Genere'].' '.$dades2['Nom'].',
                  </label>
                  ';

              }
            ?>
            <input type="text" name="quantitat_exemplars" id="idgenere" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">exemple: 1,3,5</small>
          </div>
          <button type="submit" id="enviarautor" onclick="enviarautor()" class="btn btn-primary">Afegir</button>
          <span id="mensajes"></span>
        </form>
        <div class="modal-footer">
          <button type="button"  class="btn btn-default" id="close" data-dismiss="modal">Close</button>
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
        <h4 class="modal-title" id="myModalLabel">Actualitzar</h4>
      </div>
      <div class="modal-body">
        <form action="Llibres/ActualitzarLlibres.php" method="post">
          <!-- ID -->
          <div class="form-group">
            <label for="Llibretitol">ID</label>
            <input type="text" name="eid" id="edit_id"class="form-control" aria-describedby="nomAjuda" readonly="readonly">
            <small class="form-text text-muted">ID</small>
          </div>
          <!-- Titol -->
          <div class="form-group">
            <label for="Llibretitol">Titol</label>
            <input type="text" name="etitol" id="edit_titol"class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Titol llibre</small>
          </div>
          <!-- Numero edicio -->
          <div class="form-group">
            <label for="lnedicio">Numero edició</label>
            <input type="text" name="enedicio" id="edit_nedicio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">numero edició</small>
          </div>
          <!-- Lloc publicacio -->
          <div class="form-group">
            <label for="lpublicacio">Lloc publicació</label>
            <input type="text" name="elloc_publicacio" id="edit_lloc_publicacio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Lloc publicació</small>
          </div>
          <!-- Editorial -->
          <div class="form-group">
            <label for="leditorial">editorial</label>
            <input type="text" name="eeditorial" id="edit_editorial"class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Editorial</small>
          </div>
          <!-- Any edicio -->
          <div class="form-group">
            <label for="lany_edicio">any_edicio</label>
            <input type="text" name="eany_edicio" id="edit_any_edicio" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Any edició format xxxx-xx-xx</small>
          </div>
          <!-- ISBN -->
          <div class="form-group">
            <label for="lISBN">ISBN</label>
            <input type="text" name="eisbn" id="edit_ISBN" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">ISBN</small>
          </div>
          <!-- Quantitat exemplars -->
          <div class="form-group">
            <label for="lquantitat_exemplars">quantitat_exemplars</label>
            <input type="text" name="equantitat_exemplars" id="edit_quantitat_exemplars" class="form-control" aria-describedby="nomAjuda" required>
            <small class="form-text text-muted">Quantitat exemplars</small>
          </div>
          <button type="submit" id="enviarautor" class="btn btn-primary">Afegir</button>
          <span id="mensajes"></span>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
