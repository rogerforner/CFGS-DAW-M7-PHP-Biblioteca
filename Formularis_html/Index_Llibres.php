<?php
  include_once('dades.php');
  $cadena= "select * from Llibres";
  $result = $conexion->query($cadena);
  $cadena2= "select * from Generes";
  $result2 = $conexion->query($cadena2);

  $conexion->close();

  // $cadena2= "select * from Genere";
  // $conexio2=new mysqli();
  // @$conexio2->connect($server,$usuari,$passwd,$database);
  // $result2 = $conexio2->query($cadena2);
  // $conexio2->close();
  include_once('Llibres/Modals.php');

?>
<html lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <title>Biblioteca</title>
    <!-- Bootstrap CSS -->
    <link href="Starter%20Template%20for%20Bootstrap_files/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- CSS personalitzats & JavaScript -->
    <link href="Starter%20Template%20for%20Bootstrap_files/starter-template.css" rel="stylesheet">
    <script src="Starter%20Template%20for%20Bootstrap_files/ie-emulation-modes-warning.js"></script>
  </head>
  <style media="screen">
    body{
      background-image: url("../fondoweb.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
    }
  </style>
  <body>
    <!-- Menu  -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div id="navbar" class="collapse navbar-collapse">

          <!-- <img alt="Brand" src="../libros.gif" style="width:4%"></img>
          <a class="navbar-brand" href="#">Biblioteca</a> -->
          <ul class="nav navbar-nav">
            <a class="navbar-brand" href="#" style="color:white">Biblioteca</a>
            <li><a href="../index.html">Home</a></li>
            <li><a href="Index_autors.php">Autors</a></li>
            <li class="active"><a href="Index_Llibres.php">Llibres</a></li>
            <li><a href="index_genere.php">Generes</a></li>
            <li><a href="Index_usuaris.php">Usuaris</a></li>
            <li><a href="Index_prestecs.php">Prestecs</a></li>
            <li><a href="index_stock.php">Stock</a></li>
            <li><a href="contactar.html">Contactar</a></li>
          </ul>
        </div>
      </div>
    </nav>
		<br/>
		<br/>
    <br/>
    <!-- altra part del body -->
		<div class="container">
			<!-- Boto per crear autor -->
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addautor">Crear Llibre</button>
      <br/>
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
					      <th style="text-align:center">Titol</th>
					      <th style="text-align:center">Nº edicio</th>
					      <th style="text-align:center">Lloc publicacio</th>
                <th style="text-align:center">Editorial</th>
					      <th style="text-align:center">Any edicio</th>
					      <th style="text-align:center">ISBN</th>
                <th style="text-align:center">Nº exemplars</th>
                <th style="text-align:center" class="col-md-3"></th>
					    </tr>
              <tbody id="myTable">
                <img src="" alt="">
					    <?php
                $dato= array();
  					    while ($registroautors=$result->fetch_assoc()) {
                  $id=$registroautors['ID_Llibres'];
                  $titol=$registroautors['Titol'];
                  $n_edicio=$registroautors['Numero_edicio'];
                  $l_publicacio=$registroautors['Lloc_publicacio'];
                  $editorial=$registroautors['Editorial'];
                  $a_edicio=$registroautors['Any_edicio'];
                  $isbn=$registroautors['ISBN'];
                  $n_exemplars=$registroautors['Quantitat_exemplars'];
                  $dato = array($id,$titol,$n_edicio,$l_publicacio,$editorial,$a_edicio,$isbn,$n_exemplars);
                  $valor=$dato[0]."*".$dato[1]."*".$dato[2]."*".$dato[3]."*".$dato[4]."*".$dato[5]."*".$dato[6]."*".$dato[7];
  					      echo '<tr class="warning">
  											<td style="text-align:center"><input type="checkbox" name="vehicle" value="'.$registroautors['ID_Llibres'].'"></td>
  					            <td style="text-align:center">'.$registroautors['Titol'].'</td>
  					            <td style="text-align:center">'.$registroautors['Numero_edicio'].'</td>
  					            <td style="text-align:center">'.$registroautors['Lloc_publicacio'].'</td>
                        <td style="text-align:center">'.$registroautors['Editorial'].'</td>
                        <td style="text-align:center">'.$registroautors['Any_edicio'].'</td>
                        <td style="text-align:center">'.$registroautors['ISBN'].'</td>
                        <td style="text-align:center">'.$registroautors['Quantitat_exemplars'].'</td>
  											<td>
                          <div class="col-md-4" type="text-align:left">
    											 	<form action="Llibres/EliminarLlibres.php" method="post">
    													<button type="submit" name="id" class="btn btn-danger" value="'.$registroautors['ID_Llibres'].'"><img src="Autors/img/delete.png" style=height:35px  alt="" ></button>
    												</form>
                          </div>
                          <div class="col-md-5">
    													<button type="submit" onclick=\'mostrar("'.$valor.'")\'  name="ID_Llibres" class="btn btn-danger" data-toggle="modal" data-target="#editarautor" value="'.$registroautors['ID_Llibres'].'"><img src="Autors/img/edit.png" style=height:35px  alt="" ></button>
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
    <script src="Starter%20Template%20for%20Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<!-- Seccio de Scripts/Ajax -->

<script language= JavaScript type=text/JavaScript>
  //Script per al buscador de la taula
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

  //Script per mostrar les dades en el formulari de edicio
  function mostrar(valor){
    var d=valor.split("*");
    $("#edit_id").val(d[0]);
    $("#edit_titol").val(d[1]);
    $("#edit_nedicio").val(d[2]);
    $("#edit_lloc_publicacio").val(d[3]);
    $("#edit_editorial").val(d[4]);
    $("#edit_any_edicio").val(d[5]);
    $("#edit_ISBN").val(d[6]);
    $("#edit_quantitat_exemplars").val(d[7]);
  }
  //Script per crear i validar un LLibre
  $(function enviarautor() {


    $('#enviarautor').on('click', function(e){
      e.preventDefault();
      // alert(f[dades].length);
      var titol = $('#ltitol').val();
      var nedicio = $('#lnedicio').val();
      var lloc_publicacio = $('#llloc_publicacio').val();
      var editorial = $('#leditorial').val();
      var any_edicio = $('#lany_edicio').val();
      var isbn = $('#lISBN').val();
      var quantitat_exemplars = $('#lquantitat_exemplars').val();
      var genere = $('#idgenere').val();
      if(titol=="" || nedicio=="" || lloc_publicacio==""|| any_edicio==""|| isbn==""|| quantitat_exemplars==""){
        $('#mensajes').html('Completa els camps');
      }else{
        $.ajax({
          type: "POST",
          url: "Llibres/AltaLlibres.php",
          data: ('titol='+titol+'&nedicio='+nedicio+'&lloc_publicacio='+lloc_publicacio+'&editorial='+editorial+'&any_edicio='+any_edicio+'&isbn='+isbn+'&quantitat_exemplars='+quantitat_exemplars+'&genere='+genere),
          success: function(resposta){
            if(resposta==1){
              $('#mensajes').html('Llibre registrat correctament');
            }else{
              $('#mensajes').html('El Llibre ja existeix');
            }
          }
        })
      }
    })
  })
  //Scipt per redirigir a ala pagina principal en el moment de premer el boto tancar el formulari de crear
  $(function b(){
    $('#close').on('click', function(e){
      e.preventDefault();
        document.location.href='./Index_Llibres.php';
    })
  })
</script>
