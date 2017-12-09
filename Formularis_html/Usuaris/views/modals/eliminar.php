<!-- Modal AFEGIR Usuari-->
<div class="modal fade" id="eliminarUsuariModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
      <form id="afegirUsuariForm" class="" action="index.html" method="post">
        <div class="modal-body">
          <p>Està segur d'eliminar l'usuari?</p>
          <div class="alert alert-warning" role="alert">
            Aquesta acció és irreversible i, per tant, ja no el podrà tornar a recuperar.
          </div>
        </div><!-- /.modal-body -->
        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div><!-- /.modal-footer -->
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
