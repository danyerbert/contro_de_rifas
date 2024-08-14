<?php
require "../config/conexion.php";
require "function.php";

date_default_timezone_set('America/Caracas');
$fecha =  date('h:i:s A');
if ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellidoTriple']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        $nombre = "No obtenido.";
    }
    $cedula = limpiarDatos($_POST['cedulaTriple']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $cedula = "No obtenida.";
    }
    $vendedor = limpiarDatos($_POST['vendedorTriple']);
    if ($vendedor == '') {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Información del vendedor no enviada.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }
    $fecha = limpiarDatos($_POST['fechaTriple']);
    if ($fecha == "0000-00-00" || $fecha == "") {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Fecha no valida.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa_triple']);
    if ($tipo_de_rifa != 4) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en rifa.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }
    $metodoDePago = limpiarDatos($_POST['metodoDePagoTriple']);
    if (!preg_match("/\b/", $metodoDePago)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en metodo de pago.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }elseif (!preg_match("/[0-9]{1,1}/", $metodoDePago)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en metodo de pago.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }
    switch ($metodoDePago) {
        case 1:
            $cantidaPago = limpiarDatos($_POST['ReferenciaPagoMovilTri']);        
            break;
        case 2:        
            $cantidaPago = limpiarDatos($_POST['cantidadDivisasTri']);        
            break;
        case 3:
            $cantidaPago = limpiarDatos($_POST['cantidadBolivaresTri']);        
            break;
    }
    $montoBolivares = limpiarDatos($_POST['montoBolivaresTri']); 
    if ($montoBolivares === '') {
        $montoBolivares = "N/A";
    }
    $datos = "SELECT MAX(id_triple) AS id_triple FROM registro_numero_triple_500";
    $resultado=mysqli_query($mysqli,$datos);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $valor1 = $row['id_triple'];
            $contadordb = 0;
            for ($i=0; $i <= $valor1 ; $i++) { 
                if ($valor1 == 0) {
                    $contadordb = 1;
                }else {
                    $contadordb++;
                }
            }
            $irtq =  date("Y", strtotime($fecha)) ."-"."TQ". "-". $contadordb ;
    }
    foreach( $_POST['numeroTriple'] as $indice => $numero ){
        if ($numero == false || $numero == 0) {
        }else {
            $cantidad = limpiarDatos($_POST['cantidad_apuesta'][$indice]);
            if (!preg_match("/\b/", $cantidad)) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en cantidad apostada.',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 35000
                    }).then(() => {
                        location.assign('../listadetriple.php');
                    });
            });
                </script>";
            }
            $monto_total = $cantidad * 500;
            $loteria = limpiarDatos($_POST['loteria'][$indice]);
            switch ($metodoDePago) {
                case 1:
                    $sql = "INSERT INTO registro_numero_triple_500 (id_triple, irtq, numero, cantidad, monto_total,vendedor, loteria_one, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irtq', '$numero','$cantidad', '$monto_total', '$vendedor', '$loteria', '$fecha', '$nombre', '$cedula' , '$tipo_de_rifa', '$metodoDePago', '$montoBolivares','$cantidaPago')";
                    break;
                
                default:
                    $sql = "INSERT INTO registro_numero_triple_500 (id_triple, irtq, numero, cantidad, monto_total,vendedor, loteria_one, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irtq', '$numero','$cantidad', '$monto_total', '$vendedor', '$loteria', '$fecha', '$nombre', '$cedula' , '$tipo_de_rifa', '$metodoDePago', '$cantidaPago', '$montoBolivares')";
                    break;
            }
            $resultadoRegistro = $mysqli->query($sql);

        }
        
    }
    $html = '<a href="report/pdf/ticketRifaTriple500.php?irt500="'.$irtq.'"class="btn btn-primary" target="_blank">Ticket</a>';
    $footer = '<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#AcumuladoTriple">Partica Acumulado.</a>';
    if ($resultadoRegistro === true) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Registro realizado con exito.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                html:'".$html."' ,
                footer:'".$footer."',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error el realizar el registro.',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 35000
            }).then(() => {
                location.assign('../listadetriple.php');
            });
    });
        </script>";
    }
}

include "";