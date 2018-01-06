<!DOCTYPE html>
<?php
include_once('dades.php');
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
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <a class="navbar-brand" href="#" style="color:white">Biblioteca</a>
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
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addgenere">
        Crear Genere
      </button>
      <br/>
      <br/>

      <!-- AFEGIR GENERE -->
      <div class="modal fade" id="addgenere" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                      <label>Gènere</label>
                      <input type="text" name="genere" class="form-control" id="Genereint" aria-describedby="GenereAjuda" required>
                      <small class="form-text text-muted">El nom del gènere</small>
                    </div>
                  </div>
                  <!-- Descripcio -->
                  <div class="col">
                    <div class="form-group">
                      <label>Descripció</label>
                      <input type="text" name="desc" class="form-control"  id="Descint" aria-describedby="descripcioAjuda" required>
                      <small class="form-text text-muted">La descripció del gènere</small>
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
                <th style="text-align:center">Genere</th>
                <th style="text-align:center">Descripcio</th>
                <th style="text-align:center" class="col-md-3"></th>
              </tr>
                <tbody id="myTable">
              <?php
              $id;
              $gen;
              $desc;
              while ($registregenere=$result->fetch_assoc()) {
                $id=$registregenere['ID_Genere'];
                $gen=$registregenere['Nom'];
                $desc=$registregenere['Descripcio'];
                echo '<tr class="warning">

                <td style="text-align:center" >
                <input type="checkbox" name="vehicle" value="'.$registregenere['ID_Genere'].'" style="visibility:hidden">
                '.$registregenere['Nom'].'</td>
                <td style="text-align:center">'.$registregenere['Descripcio'].'</td>
                <td style="text-align:center">
                  <div class="col-md-3">
                      <form action="Generes/eliminargenere.php" method="post">
                          <button type="submit" name="id" class="btn btn-danger" value="'.$registregenere['ID_Genere'].'">eliminar</button>
                      </form>
                  </div>
                  <div class="col-md-5">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editgenere" onclick="prova('.$id.',\''.$gen.'\',\''.$desc.'\')">editar</button>
                  </div>
                </td>
                </tr >';
              }
              ?>
              <!-- EDITAR GENERE -->
               <?php

              echo '<div class="modal fade" id="editgenere" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Gènere</h4>
                    </div>
                    <div class="modal-body">
                      <form action="Generes/editargenere.php" method="post">
                        <div class="form-row">

                          <!-- Genere -->
                          <div class="col">
                            <div class="form-group">
                            <input type="text" id="Eid" name="idgen" style="visibility:hidden">
                            </div>
                            <div class="form-group">
                              <label >  Gènere</label>
                              <input type="text" id="Egen" name="genere" class="form-control" aria-describedby="GenereAjuda" required>
                              <small class="form-text text-muted">El nom del gènere</small>
                            </div>
                          </div>
                          <!-- Descripcio -->
                          <div class="col">
                            <div class="form-group">
                            <label>Descripció </label>
                              <input type="text" id="Edesc" name="desc" class="form-control"  aria-describedby="descripcioAjuda" required>
                              <small class="form-text text-muted">La descripció del gènere</small>
                            </div>
                          </div>
                        </div>


                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                  </div>
                </div>
              </div>'
              ?>
              <!-- AFEGIR GENERE -->
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

    //Script per a poder utilitzar el cercador de la taula
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    /*Funcio per a donar valor als inputs dintre del model*/
    function prova(id,gen,desc){
      $("#Eid").val(id);
      $("#Egen").val(gen);
      $("#Edesc").val(desc);
    }

  //Script per a poder comprovar si les dades ja existeixen
    $(document).ready(function(){
      var consulta;

      //Fem el focus
      $("#Genereint").focus();
      //Comprovem si ha pulsat alguna tecla
      $("#Genereint").keyup(function(e){
        //Pbtenim tot el text del box
        consulta = $("#Genereint").val();

          //Fem la busqueda al arxiu php amb un retard de 1000 mili.seg
          $("#Comprovacio").delay(1000).queue(function(n) {
            $.ajax({
              type: "POST",
              url: "Generes/comprovargeneres.php",
              data: "b="+consulta,
              dataType: "html",
              /*Si hi ha un error saltara el alert*/
              error: function(){
                alert("error petición ajax");
              },
              success: function(data){
                $("#Comprovacio").html(data);
                n();
              }
            });
         });
       });
     });
    </script>
</body></html>
