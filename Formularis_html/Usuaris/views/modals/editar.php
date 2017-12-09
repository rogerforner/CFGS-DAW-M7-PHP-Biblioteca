<!-- Modal AFEGIR Usuari-->
<div class="modal fade" id="editarUsuariModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Hedaer -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
          <i class="fa fa-pencil" aria-hidden="true"></i> Editar Usuari
        </h4>
      </div><!-- /.modal-header -->
      <!-- Body -->
      <form id="afegirUsuariForm" action="controllers/editar.php" method="post">
        <div class="modal-body">
          <?php include_once("editar-formulari.php"); ?>
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
