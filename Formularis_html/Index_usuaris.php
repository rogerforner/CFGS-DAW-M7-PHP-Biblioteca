<!DOCTYPE html>
<?php
include_once('../dades.php');
$cadena= "SELECT * FROM Usuaris";
$result = $conexion->query($cadena);
$conexion->close();
?>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <title>Biblioteca</title>
    <!-- Bootstrap core CSS -->
    <link href="Starter%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Starter%20Template%20for%20Bootstrap_files/starter-template.css" rel="stylesheet">
    <script src="Starter%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Biblioteca</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Usuaris</a></li>
            <li><a href="index_genere.php">Generes</a></li>
            <li class="active"><a href="#">Usuaris</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<br/>
		<br/>

		<div class="container">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addusuari">
			  Afegir Usuari
			</button>
			<br/>
			<br/>

			<!-- Modal -->
			<div class="modal fade" id="addusuari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Afegir Usuari</h4>
			      </div>
			      <div class="modal-body">
			        <form action="Usuaris/altausuaris.php" method="post">
                <!-- DNI -->
                <div class="form-group">
                  <label for="usuariDNI">DNI</label>
                  <input type="number" name="dni" min="10000000" max="90000000" class="form-control" id="usuariDNI" aria-describedby="dniAjuda" required>
                  <small id="dniAjuda" class="form-text text-muted">El DNI de l'usuari (sense lletra).</small>
                </div>

                <!-- Nom i Cognom -->
                <div class="form-row">
                  <!-- Nom -->
                  <div class="col">
                    <div class="form-group">
                      <label for="usuariNom">Nom</label>
                      <input type="text" name="nom" class="form-control" id="usuariNom" aria-describedby="nomAjuda" required>
                      <small id="nomAjuda" class="form-text text-muted">El nom de l'usuari.</small>
                    </div>
                  </div>
                  <!-- Cognom -->
                  <div class="col">
                    <div class="form-group">
                      <label for="usuariCognom">Cognom</label>
                      <input type="text" name="cognom" class="form-control" id="usuariCognom" aria-describedby="cognomAjuda" required>
                      <small id="cognomAjuda" class="form-text text-muted">El cognom de l'usuari.</small>
                    </div>
                  </div>
                </div>

                <!-- Adreça -->
                <div class="form-group">
                  <label for="usuariAdreca">Adreça</label>
                  <input type="text" name="adreca" class="form-control" id="usuariAdreca" aria-describedby="adrecaAjuda" required>
                  <small id="adrecaAjuda" class="form-text text-muted">L'adreça de l'usuari.</small>
                </div>

                <!-- Població, Província i Nacionalitat -->
                <div class="form-row">
                  <!-- Població -->
                  <div class="col">
                    <div class="form-group">
                      <label for="usuariPoblacio">Població</label>
                      <input type="text" name="poblacio" class="form-control" id="usuariPoblacio" aria-describedby="poblacioAjuda" required>
                      <small id="poblacioAjuda" class="form-text text-muted">La població on resideix l'usuari.</small>
                    </div>
                  </div>
                  <!-- Província -->
                  <div class="col">
                    <div class="form-group">
                      <label for="usuariProvincia">Província</label>
                      <input type="text" name="provincia" class="form-control" id="usuariProvincia" aria-describedby="provinciaAjuda" required>
                      <small id="provinciaAjuda" class="form-text text-muted">Província on resideix l'usuari.</small>
                    </div>
                  </div>
                  <!-- Nacionalitat -->
                  <div class="col">
                    <div class="form-group">
                      <label for="usuariNacionalitat">Nacionalitat</label>
                      <input type="text" name="nacionalitat" class="form-control" id="usuariNacionalitat" aria-describedby="nacionalitatAjuda" required>
                      <small id="nacionalitatAjuda" class="form-text text-muted">La nacionalitat de l'usuari.</small>
                    </div>
                  </div>
                </div>

                <!-- Adreça electrònica -->
                <div class="form-group">
                  <label for="usuariEmail">Adreça electrònica</label>
                  <input type="email" name="email" class="form-control" id="usuariEmail" aria-describedby="emailAjuda" required>
                  <small id="emailAjuda" class="form-text text-muted">Adreça electrònica de l'usuari.</small>
                </div>

                <!-- Telèfon -->
                <div class="form-group">
                  <label for="usuariTel">Telèfon</label>
                  <input type="number" name="telefon" min="100000000" max="900000000" class="form-control" id="usuariTel" aria-describedby="telAjuda" required>
                  <small id="telAjuda" class="form-text text-muted">Telèfon de l'usuari.</small>
                </div>

                <!-- Data naixement -->
                <div class="form-group">
                  <label for="usuariNaixement">Naixement</label>
                  <input type="date" name="naixement" class="form-control" id="usuariNaixement" aria-describedby="naixementAjuda" required>
                  <small id="naixementAjuda" class="form-text text-muted">Data de naixement de l'usuari.</small>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">Afegir</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Modal -->

      <!-- SearchBox -->
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <br/>

			<div class="row">
				<div class="col-md-12">
					<section>
					  <table class="table table-striped table-bordered">
					    <tr class="success">
                <th style="text-align:center">check</th>
								<th style="text-align:center">DNI</th>
					      <th style="text-align:center">Nom</th>
					      <th style="text-align:center">Cognom</th>
					      <th style="text-align:center">Adreça</th>
                <th style="text-align:center">Població</th>
					      <th style="text-align:center">Província</th>
                <th style="text-align:center">Nacionalitat</th>
					      <th style="text-align:center">Adreça electrònica</th>
                <th style="text-align:center">Telèfon</th>
					      <th style="text-align:center">Data de naixement</th>
                <th style="text-align:center" class="col-md-3"></th>
					    </tr>
              <tbody id="myTable">
					    <?php while ($registreUsuaris = $result->fetch_assoc()): ?>
					      <tr class="warning">
                  <td style="text-align:center"><input type="checkbox" name="vehicle" value="'.$registreUsuaris['ID_Usuari'].'"></td>
                  <td style="text-align:center"><?= $registreUsuaris['DNI']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Nom']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Cognom']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Adreca']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Poblacio']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Provincia']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Nacionalitat']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Adreca_electronica']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Telefon']; ?></td>
                  <td style="text-align:center"><?= $registreUsuaris['Data_naixement']; ?></td>
                  <td style="text-align:center">
                  <div class="col-md-3">
                  <form action="Usuaris/eliminarusuaris.php" method="post">
                    <button type="submit" name="id" class="btn btn-danger" value="<?= $registreUsuaris['ID_Usuari']; ?>">eliminar</button>
                  </form>
                  </div>
                  <div class="col-md-5">
                  <form action="../editarusuaris.php" method="post">
                    <button type="submit" name="id" class="btn btn-danger" value="<?= $registreUsuaris['ID_Usuari']; ?>">editar</button>
                  </form>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td style="text-align:center">
                    <form action="../eliminarusuaris.php" method="post">
                      <button type="submit" name="id" class="btn btn-danger" value="<?= $registreUsuaris['ID_Usuari']; ?>">eliminar</button>
                    </form>
                  </td>
                </tr>
					    <?php endwhile; ?>
              </tbody>
					  </table>
					</section>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Starter%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Starter%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
    <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

</body></html>
