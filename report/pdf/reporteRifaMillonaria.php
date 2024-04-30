<?php
	require "../../config/conexion.php";
	require "plantillaMillonaria.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, v.nombre FROM registro_numero_millonaria AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

	$pdf = new PDF("L", "mm", "letter");
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 12);
	$pdf->Cell(120, 5,"Numero", 1, 0, "C");
	$pdf->Cell(60, 5,"Vendedor", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
	while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(120 , 5,$row['numero_one'] . '-' . $row['numero_dos'] . '-' . $row['numero_tres'] . '-' . $row['numero_cuatro'] . '-' . $row['numero_cinco'], 1, 0, "C");
	$pdf->Cell(60, 5,$row['nombre'], 1, 1, "C");
	
	}


	$pdf-> Output();






