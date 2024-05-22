<?php
require "../config/conexion.php";
require "function.php";

$valido['success']=array('success', false, 'mensaje'=>"");


date_default_timezone_set('America/Caracas');
$horaServer =  date('h:i:s A');
$horaDeCierre = "11:00:00 PM";




    if ($horaServer >= $horaDeCierre) {
        $valido['success'] = false;
        $valido['mensaje'] = "Cierre realizado.";
    }elseif ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellido']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        $nombre = "No obtenidos";
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
    $signo = limpiarDatos($_POST['zodiaco']);
    if ($signo == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione un signo zodiacal.";
    }

    if ($numero > 99) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 00 al 99.";
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
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa']);
    if ($tipo_de_rifa != 1) {
        # code...
        $valido['success'] = false;
        $valido['mensaje'] = "Rifa no coincide.";
    }
    // Validacion de cantidad de veces que se a vendido el numero ingresado

    $valor = 3;
    $sqlNumeroBloqueado = "SELECT numero, fecha FROM numero_bloqueado WHERE numero = '$numero' AND fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $num = $resultadoBloqueado->num_rows;

    if ($num >0) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }else {
        // Validacion de numero bloqueado.
        $sqlValidationNumero = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE numero = '$numero' AND fecha = '$fecha'";
        $resultadoValidationNumero = $mysqli->query($sqlValidationNumero);
        $row = mysqli_fetch_assoc($resultadoValidationNumero);
        $valorNumero = $row['numero'];

        // Validacion de limite de venta.
        $sqlLimiteVenta = "SELECT cantidad_venta FROM cantidad_venta WHERE tipo_de_rifa = 1 AND fecha = '$fecha'";
        $resultadoLimite = $mysqli->query($sqlLimiteVenta);
        $rowLimite = mysqli_fetch_assoc($resultadoLimite);
        $dbcantidad = $rowLimite['cantidad_venta'];

        if ($rowLimite == '') {
            $limite_venta = 3;
        }else {
            $limite_venta = $rowLimite['cantidad_venta'];
        }

        if ($valorNumero == $limite_venta) {
            $valido['success'] = false;
            $valido['mensaje'] = "Numero no habilitado.";
        }else {
            
            $sql = "INSERT INTO registro_moto_numero (id_moto, numero, signo, vendedor, fecha, nombre, cedula, valor, tipo_de_rifa) VALUES (NULL, '$numero','$signo', '$vendedor', '$fecha', '$nombre', '$cedula', '$valor','$tipo_de_rifa')";
            $resultadoRegistro = $mysqli->query($sql);
    
            if ($resultadoRegistro === true) {
                $valido['success'] = true;
                $valido['mensaje'] = "Registro Realizado.";
            }else {
                $valido['success'] = false;
                $valido['mensaje'] = "No se realizo el registro";
            }
            
        }
    }

   
}
echo json_encode($valido);
?>