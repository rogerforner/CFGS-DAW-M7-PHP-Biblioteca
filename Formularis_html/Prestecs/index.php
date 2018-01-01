<?php include_once("views/head.php"); ?>
<?php include_once("views/navbar.php"); ?>

<div class="container">
  <!-- Afegir -->
  <div class="row">
    <div class="col-md-12">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#afegirPrestecModal">
			  <i class="fa fa-plus" aria-hidden="true"></i> Afegir Prestec
			</button>
    </div><!-- /.col -->
    <div class="col-md-12">
      <?php include_once("views/modals/afegir.php"); ?>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Buscar prestecs -->
  <h2>Préstecs</h2>
  <div class="row">
    <div class="col-md-12">
      <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Llista d'prestecs -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once("views/llistat-prestecs.php"); ?>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Buscar prestecs 2 -->
  <h2>Préstecs tornats</h2>
  <div class="row">
    <div class="col-md-12">
      <input class="form-control" id="myInput2" type="text" placeholder="Buscar préstecs tornats...">
    </div><!-- /.col -->
  </div><!-- /.row -->

  <!-- Llista d'prestecs 2 (tornats) -->
  <div class="row">
    <div class="col-md-12">
      <?php include_once("views/llistat-prestecs-tornats.php"); ?>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container -->

<?php include_once("views/footer.php"); ?>
