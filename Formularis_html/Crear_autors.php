<!DOCTYPE html>
<?php
include_once('../dades.php');
$cadena= "select * from Autors";
$result = $conexion->query($cadena);
$conexion->close();
?>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <title>Starter Template for Bootstrap</title>
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
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Autors</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<br/>
		<br/>
		<div class="container">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addautor">
			  Crear Autor
			</button>
			<br/>
			<br/>
			<!-- Modal -->
			<div class="modal fade" id="addautor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
			      </div>
			      <div class="modal-body">
			        <form action="../altaautors.php" method="post">
			          <div class="form-row">
			            <!-- Nom -->
			            <div class="col">
			              <div class="form-group">
			                <label for="autorNom">Nom</label>
			                <input type="text" name="nom" class="form-control" id="autorNom" aria-describedby="nomAjuda" required>
			                <small id="nomAjuda" class="form-text text-muted">El nom de l'autor.</small>
			              </div>
			            </div>
			            <!-- Cognom -->
			            <div class="col">
			              <div class="form-group">
			                <label for="autorCognom">Cognom</label>
			                <input type="text" name="cognom" class="form-control" id="autorCognom" aria-describedby="cognomAjuda" required>
			                <small id="cognomAjuda" class="form-text text-muted">El cognom de l'autor.</small>
			              </div>
			            </div>
			          </div>

			          <!-- Nacionalitat -->
			          <div class="form-group">
			            <label for="autorNacionalitat">Nacionalitat</label>
			            <input type="text" name="nacionalitat" class="form-control" id="autorNacionalitat" aria-describedby="nacionalitatAjuda" required>
			            <small id="nacionalitatAjuda" class="form-text text-muted">La nacionalitat de l'autor.</small>
			          </div>

			          <!-- Submit -->
			          <button type="submit" class="btn btn-primary">Afegir</button>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			      </div>
			    </div>
			  </div>
			</div>
			<!-- End Modal -->

			<div class="row">
				<div class="col-md-4">
					<section>
					  <table class="table table-striped table-bordered">
					    <tr class="success">
								<th style="text-align:center">check</th>
					      <th style="text-align:center">Nom</th>
					      <th style="text-align:center">Cognom</th>
					      <th style="text-align:center">Nacionalitat</th>
					    </tr>
					    <?php
					    while ($registroautors=$result->fetch_assoc()) {
					      echo '<tr class="warning">
											<td style="text-align:center"><input type="checkbox" name="vehicle" value="'.$registroautors['ID_Autor'].'"></td>
					            <td style="text-align:center">'.$registroautors['Nom'].'</td>
					            <td style="text-align:center">'.$registroautors['Cognom'].'</td>
					            <td style="text-align:center">'.$registroautors['Nacionalitat'].'</td>
											<td style="text-align:center">
											 	<form action="../eliminarautors.php" method="post">
													<button type="submit" name="id" class="btn btn-danger" value="'.$registroautors['ID_Autor'].'">eliminar</button>
												</form>
											</td>
					            </tr >';
					    }
					    ?>
					  </table>
					</section>

				</div>

			</div>
		</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="Starter%20Template%20for%20Bootstrap_files/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Starter%20Template%20for%20Bootstrap_files/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body></html>
