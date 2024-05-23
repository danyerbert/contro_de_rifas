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
$sqlReporte = "SELECT m.numero_primero, m.numero_segundo, m.zodiacal_primero, m.zodiacal_segundo, v.nombre FROM registro_moto_triples AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero_primero FROM registro_moto_triples WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$CantidadPrimero = $rowCantidad['numero_primero'];
$MontoTotal = $CantidadPrimero * 1;

// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista de numero rifa moto");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('A')->setWidth(60);
$hoja_excel->setCellValue('A1', 'LISTA DE NUMEROS RIFA DE MOTO TRIPLES');
$hoja_excel->getColumnDimension('B')->setWidth(20);
$hoja_excel->setCellValue('B2', 'Numero 1');
$hoja_excel->getColumnDimension('C')->setWidth(30);
$hoja_excel->setCellValue('C2', 'Signo 1');
$hoja_excel->getColumnDimension('D')->setWidth(20);
$hoja_excel->setCellValue('D2', 'Numero 2');
$hoja_excel->getColumnDimension('E')->setWidth(30);
$hoja_excel->setCellValue('E2', 'Signo 2');
$hoja_excel->getColumnDimension('F')->setWidth(20);
$hoja_excel->setCellValue('F2', 'Vendedor');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['numero_primero']);
    $hoja_excel->setCellValue('C'.$fila, $row['zodiacal_primero']);
    $hoja_excel->setCellValue('D'.$fila, $row['numero_segundo']);
    $hoja_excel->setCellValue('E'.$fila, $row['zodiacal_segundo']);
    $hoja_excel->setCellValue('F'.$fila, $row['nombre']);
    $fila++;
}
$hoja_excel->setCellValue('A'.$fila, 'Monto total de numeros: ');
$hoja_excel->setCellValue('B'.$fila, $CantidadPrimero);
$hoja_excel->setCellValue('C'.$fila, 'Monto total: ');
$hoja_excel->setCellValue('D'.$fila, $MontoTotal . '$');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifamototriples_'.$fecha.'_.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>