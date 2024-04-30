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
$sqlReporte = "SELECT m.numero, m.monto_total, v.nombre FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];

// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista Triple 500");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('A')->setWidth(40);
$hoja_excel->setCellValue('A1', 'LISTA DE NUMEROS TRIPLE 500');
$hoja_excel->getColumnDimension('B')->setWidth(20);
$hoja_excel->setCellValue('B2', 'Numero');
$hoja_excel->getColumnDimension('C')->setWidth(30);
$hoja_excel->setCellValue('C2', 'Monto a pagar');
$hoja_excel->getColumnDimension('D')->setWidth(20);
$hoja_excel->setCellValue('D2', 'Vendedor');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['numero']);
    $hoja_excel->setCellValue('C'.$fila, $row['monto_total']);
    $hoja_excel->setCellValue('D'.$fila, $row['nombre']);
    $fila++;
}
$hoja_excel->setCellValue('A'.$fila, 'Monto total de numeros: ');
$hoja_excel->setCellValue('B'.$fila, $Cantidad);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifatriple500_'.$fecha.'.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>