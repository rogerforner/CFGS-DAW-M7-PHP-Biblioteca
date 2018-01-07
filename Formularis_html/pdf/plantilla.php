<?php

	require_once('lib/fpdf/fpdf.php');

	class PDF extends FPDF{

    /*Funcio per al header*/
		function Header(){
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Informe de Usuaris',0,0,'C');
			$this->Ln(20);
		}

    /*Funcio per al footer*/
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
	}
?>
