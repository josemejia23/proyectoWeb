<?php
	include 'plantilla2.php';
	require 'db.php';
	
	$query1 = "SELECT * FROM AULA";
	$resultado = $mysqli->query($query1);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'COD_AULA',1,0,'C',1);
	$pdf->Cell(50,6,'COD_EDIFICIO',1,0,'C',1);
	$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(30,6,'CAPACIDAD',1,0,'C',1);
	$pdf->Cell(20,6,'TIPO',1,0,'C',1);
	$pdf->Cell(20,6,'PISO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,utf8_decode($row['COD_AULA']),1,0,'C');
		$pdf->Cell(50,6,$row['COD_EDIFICIO'],1,0,'C');
		$pdf->Cell(30,6,$row['NOMBRE'],1,0,'C');
		$pdf->Cell(30,6,$row['CAPACIDAD'],1,0,'C');
		$pdf->Cell(20,6,$row['TIPO'],1,0,'C');
		$pdf->Cell(20,6,$row['PISO'],1,1,'C');


	}
	$pdf->Output();
?>