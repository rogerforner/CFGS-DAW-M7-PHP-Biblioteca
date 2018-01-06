<!DOCTYPE html>
<?php
include_once('../dades.php');
$cadena= "select * from Generes";
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
    <style media="screen">
      body{
        background-image: url("../fondoweb.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
      }
    </style>
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
            <li><a href="../index.html">Home</a></li>
            <li><a href="Index_autors.php">Autors</a></li>
            <li><a href="Index_Llibres.php">Llibres</a></li>
            <li class="active"><a href="index_genere.php">Generes</a></li>
            <li><a href="Index_usuaris.php">Usuaris</a></li>
            <li><a href="Index_prestecs.php">Prestecs</a></li>
            <li><a href="index_stock.php">Stock</a></li>
            <li><a href="contactar.html">Contactar</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<br/>
		<br/>
		<div class="container">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addautor">
			  Crear Genere
			</button>
			<br/>
			<br/>
			<!-- Modal -->
			<div class="modal fade" id="addautor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Gènere</h4>
			      </div>
			      <div class="modal-body">
			        <form action="Generes/altagenere.php" method="post">
			          <div class="form-row">
			            <!-- Genere -->
			            <div class="col">
			              <div class="form-group">
			                <label for="autorNom">Gènere</label>
			                <input type="text" name="genere" class="form-control" aria-describedby="GenereAjuda" required>
			                <small class="form-text text-muted">El nom del gènere</small>
			              </div>
			            </div>
			            <!-- Descripcio -->
			            <div class="col">
			              <div class="form-group">
			                <label for="autorCognom">Descripció</label>
			                <input type="text" name="desc" class="form-control"  aria-describedby="descripcioAjuda" required>
			                <small class="form-text text-muted">La descripció del gènere</small>
			              </div>
			            </div>
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

      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <br/>

			<div class="row">
				<div class="col-md-12">
					<section>
					  <table class="table table-striped table-bordered">
					    <tr class="success">
								<th style="text-align:center">check</th>
					      <th style="text-align:center">Genere</th>
					      <th style="text-align:center">Cognom</th>
                <th style="text-align:center" class="col-md-3"></th>
					    </tr>
                <tbody id="myTable">
					    <?php
					    while ($registregenere=$result->fetch_assoc()) {
					      echo '<tr class="warning">
						    <td style="text-align:center">
						    <input type="checkbox" name="vehicle" value="'.$registregenere['ID_Genere'].'"></td>
					      <td style="text-align:center">'.$registregenere['Nom'].'</td>
					      <td style="text-align:center">'.$registregenere['Descripcio'].'</td>
						    <td style="text-align:center">
                  <div class="col-md-3">
		         			    <form action="Generes/eliminargenere.php" method="post">
				                  <button type="submit" name="id" class="btn btn-danger" value="'.$registregenere['ID_Genere'].'">eliminar</button>
	  					        </form>
                  </div>
                  <div class="col-md-5">
                    <form action="Generes/editargenere.php" method="post">
                      <button type="submit" name="id" class="btn btn-primary" value="'.$registregenere['ID_Genere'].'">editar</button>
                    </form>
                  </div>
                </td>
					      </tr >';
					    }
					    ?>
            </tbody>
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
