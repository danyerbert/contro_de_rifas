<?php
	require "../../config/conexion.php";
	require "plantillaMoto.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.numero, m.nombre_comprador, m.cedula, m.cantidad_pago, p.metodo, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
INNER JOIN vendedores AS v ON v.cedula = m.vendedor
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];
$MontoTotal = $Cantidad * 2;

	$pdf = new PDF("L", "mm", array(250,350));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(30, 5,"Numero", 1, 0, "C");
	$pdf->Cell(50, 5,"Signo", 1, 0, "C");
	$pdf->Cell(60, 5,"Vendedor", 1, 0, "C");
	$pdf->Cell(60, 5,"Nombre Del Comprador", 1, 0, "C");
	$pdf->Cell(60, 5,"Metodo de pago", 1, 0, "C");
	$pdf->Cell(60, 5,"Cantidad Pagada", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(30, 5,$row['numero'], 1, 0, "C");
	$pdf->Cell(50, 5,$row['zodiaco'], 1, 0, "C");
	$pdf->Cell(60, 5,$row['nombre'], 1, 1, "C");
	$pdf->Cell(60, 5,$row['nombre_comprador'], 1, 1, "C");
	$pdf->Cell(60, 5,$row['metodo'], 1, 1, "C");
	$pdf->Cell(60, 5,$row['cantidad_pago'], 1, 1, "C");
	
	}
    $pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(70, 5, "Total numeros vendidos: " . $Cantidad, 1 , 0 , "C");
	$pdf->Cell(70, 5, "Monto total vendido: " . $MontoTotal . "$", 1 , 1 , "C");


	$pdf-> Output();






