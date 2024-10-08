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
$sqlReporte = "SELECT m.numero, m.nombre_comprador, m.cedula, m.cantidad_pago, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE fecha = '$fecha'";
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
$hoja_excel->getColumnDimension('E')->setWidth(40);
$hoja_excel->setCellValue('E2', 'nombre del comprador');
$hoja_excel->getColumnDimension('F')->setWidth(30);
$hoja_excel->setCellValue('F2', 'Metodo de pago');
$hoja_excel->getColumnDimension('G')->setWidth(30);
$hoja_excel->setCellValue('G2', 'Cantidad pagada');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['numero']);
    $hoja_excel->setCellValue('C'.$fila, $row['zodiaco']);
    $hoja_excel->setCellValue('D'.$fila, $row['nombre']);
    $hoja_excel->setCellValue('E'.$fila, $row['nombre_comprador']);
    $hoja_excel->setCellValue('F'.$fila, $row['metodo']);
    $hoja_excel->setCellValue('G'.$fila, $row['cantidad_pago']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifamoto_'.$fecha.'_.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>