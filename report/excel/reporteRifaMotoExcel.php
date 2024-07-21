<?php
require "../../vendor/autoload.php";
require "../../config/conexion.php";
require "../../php/function.php";
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
$metodoPago = limpiarDatos($_GET['mdp']);
if (!preg_match("/\b/", $metodoPago)) {
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
}elseif (!preg_match("/[0-9]{1}/", $metodoPago)) {
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
switch ($metodoPago) {
    case 4:
            // CONSULTA PARA EXTRAER TODOS LOS DATOS
            $sqlRifaMoto = "SELECT m.numero, m.fecha, m.nombre_comprador, m.cedula, m.cantidad_pago, m.referencia_pm, p.metodo, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
            INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
            INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE fecha BETWEEN '$fechaDesde' AND '$fechaHasta'";
        break;
    
    default:
            // CONSULTA PARA EXTRAER TODOS LOS DATOS
            $sqlRifaMoto = "SELECT m.numero, m.fecha, m.nombre_comprador, m.cedula, m.cantidad_pago, m.referencia_pm, p.metodo, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
            INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
            INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE fecha BETWEEN '$fechaDesde' AND '$fechaHasta' AND metodo_pago = '$metodoPago'";
        break;
}
$resultado = $mysqli->query($sqlRifaMoto);
// Incluimos la liberia a ejecutar
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
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