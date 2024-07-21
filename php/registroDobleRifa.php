<?php

require "../config/conexion.php";
require "function.php";

date_default_timezone_set('America/Caracas');
$valido['success']=array('success', false, 'mensaje'=>"", 'ticket' => "");
    $horaServer =  date('h:i:s A');
    $horaDeCierre = "11:00:00 PM";

    // if ($horaServer >= $horaDeCierre) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Cierre realizado.";
    // }else
    if ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellido']);
    if ($nombre == '') {
        $nombre = "No obtenidos.";
    }
    $cedula = limpiarDatos($_POST['cedula']);
    if ($cedula == "") {
        $cedula = 'No obtenida.';
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

    if ($numero > 99) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 00 al 99.";
    }
    $vendedor = limpiarDatos($_POST['cedulaVendedor']);
    if ($vendedor == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Informacion no valida.";
    }
    $fecha = limpiarDatos($_POST['fecha']);
    if ($fecha == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Fecha no enviada.";
    }
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa']);
    if ($tipo_de_rifa != 2) {
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
    $valor = 2;

    $datos = "SELECT MAX(id_doble_oportunidad) AS id_doble_oportunidad FROM registro_numero_doble_oportunidad WHERE fecha = '$fecha'";
    $resultado=mysqli_query($mysqli,$datos);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $valor1 = $row['id_doble_oportunidad'];
            $contadordb = 0;
            for ($i=0; $i <= $valor1 ; $i++) { 
                if ($valor1 == 0) {
                    $contadordb = 1;
                }else {
                    $contadordb++;
                }
            }
            $irroyal =  date("Y", strtotime($fecha)) ."-"."RR". "-". $contadordb ;
    }

    $sqlNumeroBloqueado = "SELECT numero, fecha, tipo_de_rifa FROM numero_bloqueado WHERE numero = '$numero' AND fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $num = $resultadoBloqueado->num_rows;

    if ($num >0) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }else {
        // Validacion de cantidad de veces que se a vendido el numero ingresado

    $sqlValidationNumero = "SELECT COUNT(*) numero FROM registro_numero_doble_oportunidad WHERE numero = '$numero' AND fecha = '$fecha'";
    $resultadoValidationNumero = $mysqli->query($sqlValidationNumero);

    $row = mysqli_fetch_assoc($resultadoValidationNumero);
    $valorNumero = $row['numero'];

    if ($valorNumero == 4) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no habilitado.";
    }else {
        switch ($metodoDePago) {
            case 1:
                $sql = "INSERT INTO registro_numero_doble_oportunidad (id_doble_oportunidad, irroyal, numero, vendedor, fecha, nombre, cedula, valor, tipo_de_rifa,  metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irroyal', '$numero', '$vendedor', '$fecha', '$nombre', '$cedula', '$valor', '$tipo_de_rifa', '$metodoDePago','$montoBolivares','$cantidaPago')";
                break;
            
            default:
                $sql = "INSERT INTO registro_numero_doble_oportunidad (id_doble_oportunidad, irroyal, numero, vendedor, fecha, nombre, cedula, valor, tipo_de_rifa,  metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irroyal', '$numero', '$vendedor', '$fecha', '$nombre', '$cedula', '$valor', '$tipo_de_rifa', '$metodoDePago', '$cantidaPago', '$montoBolivares')";
                break;
        }
        
        $resultadoRegistro = $mysqli->query($sql);

        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Registro Realizado.";
            $valido['ticket'] = $irroyal;
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "Fallo al realizar el registro.";
        }
        
    }
    }
    
}
echo json_encode($valido);




?>