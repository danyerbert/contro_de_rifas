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
$sqlReporte = "SELECT m.numero, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultado = $mysqli->query($sqlReporte);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];
$MontoTotal = $Cantidad * 2;

// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista de numero rifa moto");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('A')->setWidth(40);
$hoja_excel->setCellValue('A1', 'LISTA DE NUMEROS RIFA DE MOTO');
$hoja_excel->getColumnDimension('B')->setWidth(20);
$hoja_excel->setCellValue('B2', 'Numero');
$hoja_excel->getColumnDimension('C')->setWidth(30);
$hoja_excel->setCellValue('C2', 'Signo');
$hoja_excel->getColumnDimension('D')->setWidth(20);
$hoja_excel->setCellValue('D2', 'Vendedor');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['numero']);
    $hoja_excel->setCellValue('C'.$fila, $row['zodiaco']);
    $hoja_excel->setCellValue('D'.$fila, $row['nombre']);
    $fila++;
}
$hoja_excel->setCellValue('A'.$fila, 'Monto total de numeros: ');
$hoja_excel->setCellValue('B'.$fila, $Cantidad);
$hoja_excel->setCellValue('C'.$fila, 'Monto total: ');
$hoja_excel->setCellValue('D'.$fila, $MontoTotal . '$');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifamoto_'.$fecha.'_.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>