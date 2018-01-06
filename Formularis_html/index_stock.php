<!DOCTYPE html>

<?php
include_once('../dades.php');
$cadena= "SELECT Exem.ID_Exemplar,Llib.Titol,Exem.estatus From Exemplars as Exem INNER JOIN Llibres as Llib on Exem.ID_Llibres=Llib.ID_Llibres ORDER BY Exem.ID_Llibres, Exem.estatus";
$result = $conexion->query($cadena);
$conexion->close();

$llibres = array();
$cadena="SELECT ID_Llibres, Titol From Llibres";
$conexion2 = new mysqli();
@$conexion2->connect($server, $usuari, $passwd, $database);
$result2 = $conexion2->query($cadena);
while($llista = $result2->fetch_assoc()) {
  $llibres[] = $llista;
}
$conexion2->close();
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
            <li ><a href="Index_autors.php">Autors</a></li>
            <li><a href="index_genere.php">Generes</a></li>
            <li class="active"><a href="#">Stock</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<br/>
		<br/>
		<div class="container">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addstock">
			  Afegir Stock
			</button>
			<br/>
			<br/>

      <!-- AFEGIR STOCK -->
			<div class="modal fade" id="addstock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Stock</h4>
			      </div>
			      <div class="modal-body">
			        <form action="Stock/altastock.php" method="post">
			          <div class="form-row">
			            <!-- Llibre -->
			            <div class="col">
			              <div class="form-group">
			                <label >Títol</label>
                      <?php

                      ?>
                      <select name="idllib" class="form-control" id="Stockint" aria-describedby="TitolAjuda" required>
                          <?php foreach ($llibres as $Llib): ?>
                          <option value="<?= $Llib["ID_Llibres"]; ?>"><?= $Llib["Titol"]; ?></option>
                          <?php endforeach; ?>
                      </select>
			               <!-- <input type="text" name="idllib" class="form-control" id="Stockint" aria-describedby="TitolAjuda" required>-->
                     <small class="form-text text-muted">Títol del llibre</small>
			              </div>
			            </div>
                  <!-- Disponiblitat -->
                 <div class="col">
                   <div class="form-group">
                     <label >Disponiblitat</label>
                     <select  class="form-control" id="Descint"  name="est" required>
                       <option value="1">Disponible</option>
                       <option value="2">Ocupat</option>
                     </select>
                     <small class="form-text text-muted">Estat del llibre</small>
                   </div>
                 </div>
			            <!-- Quantitat -->
			            <div class="col">
			              <div class="form-group">
			                <label >Quantitat</label>
        			        <input type="number" name="quant" class="form-control"  id="Descint" aria-describedby="descripcioAjuda" required>
			                <small class="form-text text-muted">Quantitat d'exemplars</small>
			              </div>
			            </div>
			          </div>


			          <!-- Submit -->
			          <button type="submit"  id="btnReg" class="btn btn-primary">Afegir</button>
                <small class="form-text text-muted" id="Comprovacio"></small>
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
                <th style="text-align:center">Nº Exemplar</th>
					      <th style="text-align:center">Llibre</th>
                <th style="text-align:center">Estat</th>
                <th style="text-align:center" class="col-md-3"></th>
					    </tr>
                <tbody id="myTable">
					    <?php
              $id;
              $estat;
					    while ($registrestock=$result->fetch_assoc()) {
                $id=$registrestock['ID_Exemplar'];
                $est=$registrestock['estatus'];

                if($registrestock['estatus']==1){
                  $estat="Disponible";
                }else{
                  $estat="Ocupat";
                }
					      echo '<tr class="warning">
                <td style="text-align:center">'.$registrestock['ID_Exemplar'].'</td>
					      <td style="text-align:center">'.$registrestock['Titol'].'</td>
					      <td style="text-align:center">'.$estat.'</td>
						    <td style="text-align:center">
                  <div class="col-md-3">
		         			    <form action="Stock/eliminarstock.php" method="post">
				                  <button type="submit" name="id" class="btn btn-danger" value="'.$registrestock['ID_Exemplar'].'">eliminar</button>
	  					        </form>
                  </div>
                  <div class="col-md-5">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editstock" onclick="edit('.$id.',\''.$registrestock['Titol'].'\',\''.$est.'\')">editar</button>
                  </div>
                </td>
					      </tr >';
					    }
					    ?>
              <!-- EDITAR STOCK -->
               <?php

              echo '<div class="modal fade" id="editstock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Stock</h4>
                    </div>
                    <div class="modal-body">
                      <form action="Stock/editarstock.php" method="post">
                        <div class="form-row">

                          <!-- Stock -->
                          <div class="col">
                            <input type="text" id="Eid" name="idstock" style="visibility:hidden">
                          <div class="form-group">
                              <label >Llibre</label>
                              <input type="text" id="Estock" name="llibre" class="form-control" aria-describedby="Llibreajuda" disabled>
                              <small class="form-text text-muted">El tìtol del llibre</small>
                            </div>
                          </div>
                          <!-- Estat -->
                          <div class="col">
                            <div class="form-group">
                            <label>Estat </label>

                            <select  class="form-control" id="Edesc"  name="idest" required>
                              <option value="1">Disponible</option>
                              <option value="2">Ocupat</option>
                            </select>
                            </div>
                          </div>
                        </div>


                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>'
              ?>
        			<!-- AFEGIR STOCK -->
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

    function edit(id,stock,desc){
      $("#Eid").val(id);
      $("#Estock").val(stock);
      $("#Edesc").val(desc);
    }

    </script>


</body></html>
