<?php
  /*Afegim els fitxers de plantilla del pdf i de conexio a la base de dades*/
	include_once('../pdf/plantilla.php');
	require_once('../dades.php');

  /*Realitzem la consulta per a l'informe*/
	$cadena = "SELECT DNI,Nom,Cognom,Provincia,Telefon FROM Usuaris Order by Nom";
	$result = $conexion->query($cadena);

  /*Creem el pdf i li afegim una nova pagina*/
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

  /*Afegim les columnes de la capcalera*/
	$pdf->SetFillColor(232,232,232); //Color del fondo de les columnes
	$pdf->SetFont('Arial','B',12);//Tipus de lletra
	$pdf->Cell(30,6,'DNI',1,0,'C',1);
	$pdf->Cell(40,6,'Nom',1,0,'C',1);
	$pdf->Cell(50,6,'Cognom',1,0,'C',1);
  $pdf->Cell(30,6,'Provincia',1,0,'C',1);
  $pdf->Cell(30,6,'Telefon',1,1,'C',1);

  /*Afegim les dades agafades de la base de dades*/
	$pdf->SetFont('Arial','',10);
	while($row = mysqli_fetch_assoc($result)){
		$pdf->Cell(30,6,utf8_decode($row['DNI']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['Nom']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($row['Cognom']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['Provincia']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['Telefon']),1,1,'C');
	}

  $pdf->Output();//Mostrem el resultat

?>
