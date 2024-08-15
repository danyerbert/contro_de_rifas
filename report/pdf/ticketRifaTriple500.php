<?php
	require "../../config/conexion.php";
	require "plantillaTicketTriple500.php";
 
    
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$irtq = $_GET['irt500'];
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT  m.numero, m.cantidad, m.irtq, m.fecha, m.loteria_one, m.nombre_comprador, m.cedula, m.referencia_pm, p.metodo, v.nombre FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE irtq = '$irtq' AND fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);



        $pdf = new PDF("L", "mm", array(250,315));
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetFont("Arial", "B", 12);
        $pdf->Cell(50, 5,"Identificador", 1, 0, "C");
        $pdf->Cell(30, 5,"Numero", 1, 0, "C");
        $pdf->Cell(40, 5,"Loteria", 1, 0, "C");
        $pdf->Cell(40, 5,"Comprador", 1, 0, "C");
        $pdf->Cell(30, 5,"Cantidad", 1, 0, "C");
        $pdf->Cell(40, 5,"Metodo de Pago", 1, 0, "C");
        $pdf->Cell(40, 5,"Referencia", 1, 0, "C");
        $pdf->Cell(30, 5,"Fecha", 1, 1, "C");
        $pdf->SetFont("Arial", "", 12);
        while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(50, 5,$row['irtq'], 1, 0, "C");
        $pdf->Cell(30, 5,$row['numero'], 1, 0, "C");
        $pdf->Cell(40, 5,$row['loteria_one'], 1, 0, "C");
        $pdf->Cell(40, 5,$row['nombre_comprador'], 1, 0, "C");
        $pdf->Cell(30, 5,$row['cantidad'], 1, 0, "C");
        $pdf->Cell(40, 5,$row['metodo'], 1, 0, "C");
        $pdf->Cell(40, 5,$row['referencia_pm'], 1, 0, "C");
        $pdf->Cell(30, 5,$row['fecha'], 1, 1, "C");

        }
        $pdf-> Output();