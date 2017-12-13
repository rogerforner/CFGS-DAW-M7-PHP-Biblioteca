<!DOCTYPE html>
<?php
include_once('../dades.php');
include_once('Llibres/Modals.php');

$cadena= "select * from Llibres";
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

$(function a() {
  $('#enviarautor').on('click', function(e){
    e.preventDefault();

    var titol = $('#ltitol').val();
    var nedicio = $('#lnedicio').val();
    var lloc_publicacio = $('#llloc_publicacio').val();
    var editorial = $('#leditorial').val();
    var any_edicio = $('#lany_edicio').val();
    var isbn = $('#lISBN').val();
    var quantitat_exemplars = $('#lquantitat_exemplars').val();
    if(titol=="" || nedicio=="" || lloc_publicacio==""|| any_edicio==""|| isbn==""|| quantitat_exemplars==""){
      $('#mensajes').html('Completa els camps');

    }else{
    $.ajax({

      type: "POST",
      url: "Llibres/AltaLlibres.php",
      data: ('titol='+titol+'&nedicio='+nedicio+'&lloc_publicacio='+lloc_publicacio+'&editorial='+editorial+'&any_edicio='+any_edicio+'&isbn='+isbn+'&quantitat_exemplars='+quantitat_exemplars),
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
