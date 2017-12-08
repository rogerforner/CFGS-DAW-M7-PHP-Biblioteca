<?php include_once("partials/head.php"); ?>
<?php include_once("partials/navbar.php"); ?>

<div class="container">
  <!-- Afegir -->
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#afegirUsuariModal">
			  <i class="fa fa-plus" aria-hidden="true"></i> Afegir Usuari
			</button>
    </div><!-- /.col -->
    <div class="col-md-12">
      <?php include_once("partials/modals/afegir.php"); ?>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Buscar usuaris -->
  <div class="row">
    <div class="col-md-12">
      <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Llista d'usuaris -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once("partials/llistat-usuaris.php"); ?>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

<?php include_once("partials/footer.php"); ?>
