<?php
	require "../../config/conexion.php";
	require "plantillaTicketTriple500.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$irtq = $_GET['irt500'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irtq, m.numero, m.monto_total, m.nombre_comprador, m.fecha,  m.metodo_pago, m.cantidad_pago, v.nombre, p.metodo FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE irtq = '$irtq' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);
$row = mysqli_fetch_assoc($resultado);

	$pdf = new PDF("L", "mm", array(180,180));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Numero", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 15,$row['numero'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Monto", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 15,$row['monto_total'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Jugador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60, 15,$row['nombre_comprador'], 1, 1, "C");
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






