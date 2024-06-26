<?php
	require "../../config/conexion.php";
	require "plantillaTicketMoto.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");

$irmd = $_GET['irmd'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irm, m.numero, m.fecha, m.nombre_comprador, m.cedula, m.metodo_pago, m.cantidad_pago, p.metodo, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
INNER JOIN vendedores AS v ON v.cedula = m.vendedor
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE irm = '$irmd' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);
$row = mysqli_fetch_assoc($resultado);

	$pdf = new PDF("L", "mm", array(180,180));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Identificador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['irm'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,utf8_decode("Número"), 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['numero'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Signo", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['zodiaco'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Jugador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,utf8_decode($row['nombre_comprador']), 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Metodo de pago", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['metodo'], 1, 1, "C");
    switch ($row['metodo_pago']) {
        case '1':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 15,"Referencia", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 15,$row['cantidad_pago'], 1, 1, "C");
            break;
        case '2':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 15,"Cantidad Pagada", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 15,$row['cantidad_pago'], 1, 1, "C");
            break;
        case '3':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 15,"Cantidad Pagada", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 15,$row['cantidad_pago'], 1, 1, "C");
            break;
    }
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Fecha", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['fecha'], 1, 1, "C");
	$pdf-> Output();






