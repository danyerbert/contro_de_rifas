<?php
require "../../php/function.php";  
	require "../../config/conexion.php";
	require "planillaTicketAcumulado.php";
    date_default_timezone_set('America/Caracas');
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
    $pdf = new PDF("L", "mm", array(200,420));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont("Arial", "B", 14);
	$pdf->Cell(40, 7,"Identificador", 1, 0, "C");
    $pdf->Cell(30, 7,utf8_decode("Número"), 1, 0, "C");
    $pdf->Cell(60, 7,"Cedula de Jugador", 1, 0, "C");
    $pdf->Cell(60, 7,"Numero de triple 500", 1, 0, "C");
    $pdf->Cell(60, 7,"Vendedor", 1, 0, "C");
    $pdf->Cell(40, 7,"Fecha", 1, 0, "C");
    $pdf->Cell(50, 7,"Numero Triple 500", 1, 0, "C");
    $pdf->Cell(50, 7,"Id de Triple 500", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(40, 7,$row['irta'], 1, 0, "C");
        $pdf->Cell(30, 7,$row['numero'], 1, 0, "C");
        $pdf->Cell(60, 7,utf8_decode($row['cedula_comprador']), 1, 0, "C");
        $pdf->Cell(60, 7,$row['numero_triple'], 1, 0, "C");
        $pdf->Cell(60, 7,$row['nombre'], 1, 0, "C");
        $pdf->Cell(40, 7,$row['fecha'], 1, 0, "C");
        $pdf->Cell(50, 7,$row['numero_triple'], 1, 0, "C");
        $pdf->Cell(50, 7,$row['identificador'], 1, 1, "C");

    }
    $pdf-> Output();