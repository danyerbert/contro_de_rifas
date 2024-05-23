<?php
	require "../../config/conexion.php";
	require "plantillaMotoTriple.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.numero_primero, m.numero_segundo, m.zodiacal_primero, m.zodiacal_segundo, v.nombre FROM registro_moto_triples AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero_primero FROM registro_moto_triples WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$CantidadPrimero = $rowCantidad['numero_primero'];
$MontoTotal = $CantidadPrimero * 1;

	$pdf = new PDF("L", "mm", "letter");
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(30, 5,"Numero 1", 1, 0, "C");
	$pdf->Cell(50, 5,"Signo 1", 1, 0, "C");
	$pdf->Cell(30, 5,"Numero 2", 1, 0, "C");
	$pdf->Cell(50, 5,"Signo 2", 1, 0, "C");
	$pdf->Cell(60, 5,"Vendedor", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(30, 5,$row['numero_primero'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['zodiacal_primero'], 1, 0, "C");
	$pdf->Cell(30, 5,$row['numero_segundo'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['zodiacal_segundo'], 1, 0, "C");
	$pdf->Cell(60, 5,$row['nombre'], 1, 1, "C");
	
	}
    $pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(70, 5, "Total numeros vendidos: " . $CantidadPrimero, 1 , 0 , "C");
	$pdf->Cell(70, 5, "Monto total vendido: " . $MontoTotal . "$", 1 , 1 , "C");


	$pdf-> Output();






