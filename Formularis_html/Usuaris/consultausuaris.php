<!DOCTYPE html>
<?php
include_once('dades.php');

$cadena= "SELECT * FROM Usuaris";
$result = $conexion->query($cadena);

if (!empty($result)){
	echo"OK";

}else{

	echo"Error: ".$cadena." | ".$conexion->error;
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
          <th>DNI</th>
          <th>Nom</th>
          <th>Cognom</th>
					<th>Adreça</th>
          <th>Població</th>
          <th>Província</th>
					<th>Nacionalitat</th>
          <th>Adreça electrònica</th>
          <th>Telèfon</th>
					<th>Data de naixement</th>
        </tr>
        <?php while ($registreUsuaris = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $registreUsuaris['DNI']; ?></td>
            <td><?= $registreUsuaris['Nom']; ?></td>
            <td><?= $registreUsuaris['Cognom']; ?></td>
						<td><?= $registreUsuaris['Adreca']; ?></td>
						<td><?= $registreUsuaris['Poblacio']; ?></td>
						<td><?= $registreUsuaris['Provincia']; ?></td>
						<td><?= $registreUsuaris['Nacionalitat']; ?></td>
						<td><?= $registreUsuaris['Adreca_electronica']; ?></td>
						<td><?= $registreUsuaris['Telefon']; ?></td>
						<td><?= $registreUsuaris['Data_naixement']; ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    </section>

  </body>
</html>
