<?php
	include 'plantilla.php';
	require 'db.php';
	
	$query = "select *from persona";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('','B',12);
	$pdf->Cell(50,6,'',1,0,'C',1);
	$pdf->Cell(50,6,'',1,0,'C',1);
	$pdf->Cell(50,6,'',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Output();
?>