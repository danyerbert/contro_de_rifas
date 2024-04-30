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
$sqlReporte = "SELECT m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, v.nombre FROM registro_numero_millonaria AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor";
$resultado = $mysqli->query($sqlReporte);


// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista de numero rifa millonaria");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('A')->setWidth(40);
$hoja_excel->setCellValue('A1', 'LISTA DE NUMEROS RIFA MILLONARIA');
$hoja_excel->getColumnDimension('B')->setWidth(40);
$hoja_excel->setCellValue('B2', 'Numero');
$hoja_excel->getColumnDimension('C')->setWidth(20);
$hoja_excel->setCellValue('C2', 'Vendedor');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['numero_one'] . '-' . $row['numero_dos'] . '-' . $row['numero_tres'] . '-' . $row['numero_cuatro'] . '-' . $row['numero_cinco']);
    $hoja_excel->setCellValue('C'.$fila, $row['nombre']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerorifamillonaria_'.$fecha.'.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>