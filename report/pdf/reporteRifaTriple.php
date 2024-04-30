<?php
	require "../../config/conexion.php";
	require "plantillaTriple.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.numero, m.monto_total, v.nombre FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];

	$pdf = new PDF("L", "mm", "letter");
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(30, 5,"Numero", 1, 0, "C");
	$pdf->Cell(50, 5,"Monto", 1, 0, "C");
	$pdf->Cell(60, 5,"Vendedor", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(30, 5,$row['numero'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['monto_total'], 1, 0, "C");
	$pdf->Cell(60, 5,$row['nombre'], 1, 1, "C");
	
	}
    $pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(70, 5, "Total numeros vendidos: " . $Cantidad, 1 , 1 , "C");


	$pdf-> Output();






