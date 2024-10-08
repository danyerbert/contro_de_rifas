<?php
require "../../vendor/autoload.php";
require "../../config/conexion.php";
require "../../php/function.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
// Tomar la hora y fecha exacta
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
$rol = limpiarDatos($_GET['r']);
if (!preg_match("/\b/", $rol)) {
    echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Rol no valido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                }).then(() => {
                    location.assign('../../404.php');
                });
        });
            </script>";
} else {
    switch ($rol) {
        case 1:
            $ruta = "../../administrador.php";
            break;
        case 2:
            $ruta = "../../vendedor.php";
            break;
        case 3:
            $ruta = "../../supervisor.php";
            break;
        default:
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Rol no valido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                }).then(() => {
                    location.assign('../../404.php');
                });
        });
            </script>";
            break;
    }
}
$fechaDesde = limpiarDatos($_GET['fd']);
if ($fechaDesde === "") {
    echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Rol no valido.',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 35000
                }).then(() => {
                    location.assign('".$ruta."');
                });
        });
            </script>";
}elseif ($fechaDesde == "0000-00-00") {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Rol no valido.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 35000
        }).then(() => {
            location.assign('".$ruta."');
        });
});
    </script>";
}
$fechaHasta = limpiarDatos($_GET['fh']);
if ($fechaHasta === "") {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Rol no valido.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 35000
        }).then(() => {
            location.assign('".$ruta."');
        });
});
    </script>";
}elseif ($fechaHasta == "0000-00-00") {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script language='JavaScript'>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Rol no valido.',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            timer: 35000
        }).then(() => {
            location.assign('".$ruta."');
        });
});
    </script>";
}
// Realizamos la consulta para traernos nos datos de la tabla 
$sqlReporte = "SELECT m.irta, m.numero, m.cedula_comprador,m.fecha, m.numero_triple, m.identificador, v.nombre FROM triple_acomulado AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha BETWEEN '$fechaDesde' AND '$fechaHasta'";
$resultado = $mysqli->query($sqlReporte);
// Instanciamos la libreria para generar el reporte.
$excel = new Spreadsheet;
$hoja_excel = $excel->getActiveSheet();
$hoja_excel->setTitle("Lista de numero acumulado");
// Especificamos las columnas donde ira el encabezado
$hoja_excel->getColumnDimension('A')->setWidth(40);
$hoja_excel->setCellValue('A1', 'LISTA DE NUMEROS DE ACUMULADO');
$hoja_excel->getColumnDimension('B')->setWidth(40);
$hoja_excel->setCellValue('B2', 'Identificador');
$hoja_excel->getColumnDimension('C')->setWidth(40);
$hoja_excel->setCellValue('C2', 'Numero');
$hoja_excel->getColumnDimension('D')->setWidth(20);
$hoja_excel->setCellValue('D2', 'Cedula del comprador');
$hoja_excel->getColumnDimension('E')->setWidth(20);
$hoja_excel->setCellValue('E2', 'Vendedor');
$hoja_excel->getColumnDimension('F')->setWidth(20);
$hoja_excel->setCellValue('F2', 'Fecha');
$hoja_excel->getColumnDimension('G')->setWidth(20);
$hoja_excel->setCellValue('G2', 'Numero de Triple 500');
$hoja_excel->getColumnDimension('H')->setWidth(20);
$hoja_excel->setCellValue('H2', 'ID de Triple 500');


$fila = 4;

// Generamos de forma consecutiva y mostramos el registro de la DB
while ($row = $resultado->fetch_assoc()) {
    $hoja_excel->setCellValue('B'.$fila, $row['irta']);
    $hoja_excel->setCellValue('C'.$fila, $row['numero']);
    $hoja_excel->setCellValue('D'.$fila, $row['cedula_comprador']);
    $hoja_excel->setCellValue('E'.$fila, $row['nombre']);
    $hoja_excel->setCellValue('F'.$fila, $row['fecha']);
    $hoja_excel->setCellValue('G'.$fila, $row['numero_triple']);
    $hoja_excel->setCellValue('H'.$fila, $row['identificador']);
    $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadenumerosAcumulado_'.$fecha.'.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;