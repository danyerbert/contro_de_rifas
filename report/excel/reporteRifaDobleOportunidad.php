<?php

require "../../vendor/autoload.php";
require "../../config/conexion.php";

// Tomar la hora y fecha exacta
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");

// Incluimos la liberia a ejecutar

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.numero, v.nombre FROM registro_numero_doble_oportunidad AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);


// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_doble_oportunidad";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];

$MontoTotal = $Cantidad * 2;

// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista de numero Doble Oportunidad");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('B')->setWidth(20);
$hoja_excel->setCellValue('A2', 'Numero');
$hoja_excel->getColumnDimension('C')->setWidth(30);
$hoja_excel->setCellValue('B2', 'Signo');
$hoja_excel->getColumnDimension('D')->setWidth(10);
$hoja_excel->setCellValue('C2', 'Vendedor');
$hoja_excel->getColumnDimension('E')->setWidth(40);


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('A'.$fila, $row['numero']);
    $hoja_excel->setCellValue('B'.$fila, $row['nombre']);
    $hoja_excel->setCellValue('A'.$fila, 'Monto total de numeros: ');
    $hoja_excel->setCellValue('B'.$fila, $Cantidad);
    $hoja_excel->setCellValue('A'.$fila, 'Monto total: ');
    $hoja_excel->setCellValue('B'.$fila, $MontoTotal);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifamoto".$fecha.".xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>