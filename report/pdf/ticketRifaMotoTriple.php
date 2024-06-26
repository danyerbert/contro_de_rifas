<?php
	require "../../config/conexion.php";
	require "plantillaTicketMotoTriple.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$irmt = $_GET['irmt'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irmt, m.numero_primero, m.numero_segundo, m.zodiacal_primero, m.zodiacal_segundo, m.fecha, m.nombre_comprador, m.metodo_pago, m.cantidad_pago, v.nombre , p.metodo  FROM registro_moto_triples AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE irmt = '$irmt' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);
$row = mysqli_fetch_assoc($resultado);

	$pdf = new PDF("L", "mm", array(180,175));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
    $pdf->Cell(60, 10,"Identificador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 10,$row['irmt'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Numero 1", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 10,$row['numero_primero'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Signo 1", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 10,$row['zodiacal_primero'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Numero 2", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 10,$row['numero_segundo'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Signo 2", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 10,$row['zodiacal_segundo'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Jugador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 10,utf8_decode($row['nombre_comprador']), 1, 1, "C");
    switch ($row['metodo_pago']) {
        case '1':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 10,"Referencia", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 10,$row['cantidad_pago'], 1, 1, "C");
            break;
        case '2':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 10,"Cantidad Pagada", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 10,$row['cantidad_pago'], 1, 1, "C");
            break;
        case '3':
                $pdf->SetFont("Arial", "B", 14);
                $pdf->Cell(60, 10,"Cantidad Pagada", 1, 0, "C");
                $pdf->SetFont("Arial", "", 12);
	            $pdf->Cell(60, 10,$row['cantidad_pago'], 1, 1, "C");
            break;
    }
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 10,"Fecha", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 10,$row['fecha'], 1, 1, "C");
	$pdf-> Output();






