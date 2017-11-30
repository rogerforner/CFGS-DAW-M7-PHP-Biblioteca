<!DOCTYPE html>
<?php
include_once('dades.php');
//$cadena= "insert into Autors(nom,cognom,nacionalitat)Values('hola','hola','hola')";

$cadena= "select * from Autors";
$result = $conexion->query($cadena);
if (!empty($result)){
	echo"very gooood";
}else{
	echo"very vad las cahat".$cadena."aaa".$conexion->error;
}

$conexion->close();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <section>
      <table class="table">
        <tr>
          <th>nom</th>
          <th>cognom</th>
          <th>nacionalitat</th>
        </tr>
        <?php
        while ($registroautors=$result->fetch_assoc()) {
          echo '<tr>
                <td>'.$registroautors['Nom'].'</td>
                <td>'.$registroautors['Cognom'].'</td>
                <td>'.$registroautors['Nacionalitat'].'</td>
                </tr>';
        }
        ?>
      </table>
    </section>

  </body>
</html>
