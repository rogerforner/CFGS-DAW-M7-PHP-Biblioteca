<!DOCTYPE html>
<?php
include_once('../dades.php');
include_once('Autors/modals.php');

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
            <li><a href="index_genere.php">Generes</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		<br/>
		<br/>
		<div class="container">
			<!-- Boto per crear autor -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addautor">
			  Crear Autor
			</button>
			<br/>
			<br/>
      <!-- Buscador de la taula -->
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <br/>
			<div class="row">
				<div class="col-md-12">
					<section>
            <!-- Taula per mostra el contingut dels autors -->
					  <table class="table table-striped table-bordered">
					    <tr class="success">
								<th style="text-align:center">check</th>
					      <th style="text-align:center">Nom</th>
					      <th style="text-align:center">Cognom</th>
					      <th style="text-align:center">Nacionalitat</th>
                <th style="text-align:center" class="col-md-3"></th>
					    </tr>
              <tbody id="myTable">
                <img src="" alt="">
					    <?php
              $dato= array();
					    while ($registroautors=$result->fetch_assoc()) {
                $id=$registroautors['ID_Autor'];
                $nom=$registroautors['Nom'];
                $cog=$registroautors['Cognom'];
                $na=$registroautors['Nacionalitat'];
                $dato = array($id,$nom,$cog,$na);
                $valor=$dato[0]."*".$dato[1]."*".$dato[2]."*".$dato[3];
					      echo '<tr class="warning">
											<td style="text-align:center"><input type="checkbox" name="vehicle" value="'.$registroautors['ID_Autor'].'"></td>
					            <td style="text-align:center">'.$registroautors['Nom'].'</td>
					            <td style="text-align:center">'.$registroautors['Cognom'].'</td>
					            <td style="text-align:center">'.$registroautors['Nacionalitat'].'</td>
											<td>
                        <div class="col-md-4" type="text-align:left">
  											 	<form action="Autors/eliminarautors.php" method="post">
  													<button type="submit" name="id" class="btn btn-danger" value="'.$registroautors['ID_Autor'].'"><img src="Autors/img/delete.png" style=height:35px  alt="" ></button>
  												</form>
                        </div>
                        <div class="col-md-5">
  													<button type="submit" onclick=\'mostrar("'.$valor.'")\'  name="id_autor" class="btn btn-danger" data-toggle="modal" data-target="#editarautor" value="'.$registroautors['ID_Autor'].'"><img src="Autors/img/edit.png" style=height:35px  alt="" ></button>
                        </div>
											</td>
					            </tr>';
					    }
					    ?>
              </tbod>
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
</body>
</html>

<script language= JavaScript type=text/JavaScript>
function mostrar(valor,total1){
    // alert(total1);
  var d=valor.split("*");

  $("#aid").val(d[0]);
  $("#anom").val(d[1]);
  $("#acognom").val(d[2]);
  $("#anacionalitat").val(d[3]);
}

$(function a() {
  $('#enviarautor').on('click', function(e){
    e.preventDefault();

    var Nom = $('#nomAutor').val();
    var Cognom = $('#cognomAutor').val();
    var Nacionalitat = $('#nacionalitatAutor').val();
    if(Nom=="" || Cognom=="" || Nacionalitat==""){
      $('#mensajes').html('Completa els camps');

    }else{
    $.ajax({
      type: "POST",
      url: "Autors/altaautors.php",
      data: ('nom='+Nom+'&cognom='+Cognom+'&nacionalitat='+Nacionalitat),
      success: function(resposta){
        alert(resposta);
        if(resposta==1){
          $('#mensajes').html('Autor registrat correctament');

          // document.location.href='./Index_autors.php';
 

        }else{
          $('#mensajes').html('El Autor ja existeix');
        }
        // document.location.href='./Index_autors.php';
      }
    })}
  })

})
$(function b(){
  $('#close').on('click', function(e){
    e.preventDefault();

      // alert("adeu");
      document.location.href='./Index_autors.php';

  })
})

</script>
