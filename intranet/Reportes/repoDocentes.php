<?php
	include 'plantilla3.php';
	require 'db.php';
	
	$query = "SELECT ASIGNATURA_PERIODO.COD_ASIGNATURA ,ASIGNATURA.NOMBRE AS ASIGNATURA, AULA.NOMBRE AS AULA,  PARALELO.NOMBRE AS PARALELO, PERSONA.NOMBRE AS NOM_PROF, PERSONA.APELLIDO AS APE_PROF FROM ASIGNATURA_PERIODO INNER JOIN ASIGNATURA ON ASIGNATURA_PERIODO.COD_ASIGNATURA=ASIGNATURA.COD_ASIGNATURA INNER JOIN PERIODO_LECTIVO ON ASIGNATURA_PERIODO.COD_PERIODO_LECTIVO=PERIODO_LECTIVO.COD_PERIODO_LECTIVO INNER JOIN PARALELO ON PARALELO.COD_PARALELO=ASIGNATURA_PERIODO.COD_PARALELO INNER JOIN  AULA ON ASIGNATURA_PERIODO.COD_AULA=AULA.COD_AULA INNER JOIN PERSONA ON PERSONA.COD_PERSONA=ASIGNATURA_PERIODO.COD_DOCENTE";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(30,6,'COD_ASIG',1,0,'C',1);
	$pdf->Cell(30,6,'ASIGNATURA',1,0,'C',1);
	$pdf->Cell(25,6,'AULA',1,0,'C',1);
	$pdf->Cell(30,6,'PARALELO',1,0,'C',1);
	$pdf->Cell(40,6,'NOM_PROF',1,0,'C',1);
	$pdf->Cell(40,6,'APE_PROF',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,utf8_decode($row['COD_ASIGNATURA']),1,0,'C');
		$pdf->Cell(30,6,$row['ASIGNATURA'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['AULA']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['PARALELO']),1,0,'C');
		$pdf->Cell(40,6,$row['NOM_PROF'],1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['APE_PROF']),1,1,'C');
	}
	$pdf->Output();
?>