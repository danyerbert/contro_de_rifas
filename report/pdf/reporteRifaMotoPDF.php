<?php
require "../../php/function.php";
require "../../config/conexion.php";
require "plantillaMoto.php";
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
    $pdf = new PDF("L", "mm", array(250,400));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(30, 5,"Numero", 1, 0, "C");
    $pdf->Cell(50, 5,"Signo", 1, 0, "C");
    $pdf->Cell(60, 5,"Vendedor", 1, 0, "C");
    $pdf->Cell(60, 5,"Nombre Del Comprador", 1, 0, "C");
    $pdf->Cell(60, 5,"Metodo de pago", 1, 0, "C");
    $pdf->Cell(40, 5,"Cantidad Pagada", 1, 0, "C");
    $pdf->Cell(40, 5,"Referencia", 1, 1, "C");
    $pdf->SetFont("Arial", "", 12);
    while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(30, 5,$row['numero'], 1, 0, "C");
    $pdf->Cell(50, 5,$row['zodiaco'], 1, 0, "C");
    $pdf->Cell(60, 5,utf8_decode($row['nombre']), 1, 0, "C");
    $pdf->Cell(60, 5,utf8_decode($row['nombre_comprador']), 1, 0, "C");
    $pdf->Cell(60, 5,$row['metodo'], 1, 0, "C");
    $pdf->Cell(40, 5,$row['cantidad_pago'], 1, 0, "C");
    $pdf->Cell(40, 5,$row['referencia_pm'], 1, 1, "C");
    }
    $pdf-> Output();
?>