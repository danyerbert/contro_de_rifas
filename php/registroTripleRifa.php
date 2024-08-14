<?php

require "../config/conexion.php";
require "function.php";

date_default_timezone_set('America/Caracas');
$horaServer =  date('h:i:s A');

$valido['success']=array('success', false, 'mensaje'=>"", 'ticket' => "");
    $horaServer =  date('h:i:s A');
    $horaDeCierre = "01:00:00 PM";

    if ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellido']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        $nombre = "No obtenido.";
    }
    $cedula = limpiarDatos($_POST['cedula']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $cedula = "No obtenida.";
    }
    $numero = limpiarDatos($_POST['numero']);
    if (!preg_match("/\b/", $numero)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar solo numeros.";
        if (!preg_match("/[0-9]{2}/", $numero)) {
            $valido['success'] = false;
            $valido['mensaje'] = "Debe ingresar solo 2 digitos.";
        }
    }
    $cantidad = limpiarDatos($_POST['cantidad']);
    if ($cantidad == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar una cantidad.";
    }
    if ($numero > 999) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 00 al 99.";
    }

    $loteria = $_POST['loteria'];
    if ($loteria == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione una loteria.";
    }

    $vendedor = limpiarDatos($_POST['vendedor']);
    if ($vendedor == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Informacion no valida.";
    }

    $fecha = limpiarDatos($_POST['fecha']);
    if ($fecha == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Fecha no enviada.";
    }
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa_triple']);
    if ($tipo_de_rifa != 1) {
        # code...
        $valido['success'] = false;
        $valido['mensaje'] = "Rifa no coincide.";
    }
    $metodoDePago = limpiarDatos($_POST['metodoDePago']);
    if (!preg_match("/\b/" , $metodoDePago)) {
        $valido['success'] = false;
        $valido['mensaje'] = "No selecciono el metodo de pago.";
    }
    $cantidaPago = limpiarDatos($_POST['referencia']);
    if ($cantidaPago === '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar una cantidad.";
    }
    $montoBolivares = limpiarDatos($_POST['montoBolivares']);
    if ($montoBolivares === '') {
        $montoBolivares = "N/A";
    } 
    $monto_total = $cantidad * 500;

    $datos = "SELECT MAX(id_triple) AS id_triple FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
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
    // BUSCAR NUMERO BLOQUEADO
    $sqlNumeroBloqueado = "SELECT numero, fecha FROM numero_bloqueado WHERE numero = '$numero' AND fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $num = $resultadoBloqueado->num_rows;
    if ($num >0) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }else {
        $sqlValidationNumero = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE numero = '$numero' AND fecha = '$fecha'";
    $resultadoValidationNumero = $mysqli->query($sqlValidationNumero);

    $row = mysqli_fetch_assoc($resultadoValidationNumero);
    $valorNumero = $row['numero'];

    if ($valorNumero == 8) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no habilitado.";
    }else {
        switch ($metodoDePago) {
            case 1:
                $sql = "INSERT INTO registro_numero_triple_500 (id_triple, irtq, numero, cantidad, monto_total,vendedor, loteria_one, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irtq', '$numero','$cantidad', '$monto_total', '$vendedor', '$loteria', '$fecha', '$nombre', '$cedula' , '$tipo_de_rifa', '$metodoDePago', '$montoBolivares','$cantidaPago')";
                break;
            
            default:
                $sql = "INSERT INTO registro_numero_triple_500 (id_triple, irtq, numero, cantidad, monto_total,vendedor, loteria_one, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irtq', '$numero','$cantidad', '$monto_total', '$vendedor', '$loteria', '$fecha', '$nombre', '$cedula' , '$tipo_de_rifa', '$metodoDePago', '$cantidaPago', '$montoBolivares')";
                break;
        }
        $resultadoRegistro = $mysqli->query($sql);

        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Registro Realizado.";
            $valido['ticket'] = $irtq;
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "No se realizo el registro";
        }
        
    }
    }
}
echo json_encode($valido);
?>