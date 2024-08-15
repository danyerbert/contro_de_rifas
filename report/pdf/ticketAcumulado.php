<?php
	require "../../config/conexion.php";
	require "planillaTicketAcumulado.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");

$irmd = $_GET['irta'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irta, m.numero, m.cedula_comprador,m.fecha, m.numero_triple, v.nombre FROM triple_acomulado AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE irta = '$irmd' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);
$row = mysqli_fetch_assoc($resultado);

	$pdf = new PDF("L", "mm", array(180,180));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Identificador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['irta'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,utf8_decode("Número"), 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['numero'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Cedula de Jugador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,utf8_decode($row['cedula_comprador']), 1, 1, "C");
	$pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Numero de triple 500", 1, 0, "C");
	$pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['numero_triple'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Vendedor", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['nombre'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Fecha", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['fecha'], 1, 1, "C");
	
	$pdf-> Output();