<?php
	require "../../config/conexion.php";
	require "plantillaTicketMillonaria.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$irmm = $_GET['irmm'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irmm, m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, m.fecha, m.nombre_comprador, m.metodo_pago, m.cantidad_pago, v.nombre FROM registro_numero_millonaria AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE irmm = '$irmm' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);
$row = mysqli_fetch_assoc($resultado);

	$pdf = new PDF("L", "mm", array(180,180));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
    $pdf->Cell(60, 15,"Identificador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['irmm'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Numero", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(60 , 15,$row['numero_one'] . '-' . $row['numero_dos'] . '-' . $row['numero_tres'] . '-' . $row['numero_cuatro'] . '-' . $row['numero_cinco'], 1, 1, "C");
    $pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(60, 15,"Jugador", 1, 0, "C");
    $pdf->SetFont("Arial", "", 12);
	$pdf->Cell(60, 15,$row['nombre_comprador'], 1, 1, "C");
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






