<?php
	include 'plantilla.php';
	require 'db.php';
	
	$query = "select *from persona";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,6,'Cedula',1,0,'C',1);
	$pdf->Cell(50,6,'Apellido',1,0,'C',1);
	$pdf->Cell(50,6,'Nombre',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(50,6,utf8_decode($row['CEDULA']),1,0,'C');
		$pdf->Cell(50,6,$row['APELLIDO'],1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['NOMBRE']),1,1,'C');
	}
	$pdf->Output();
?>