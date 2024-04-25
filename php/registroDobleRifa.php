<?php

require "../config/conexion.php";
require "function.php";

$valido['success']=array('success', false, 'mensaje'=>"");


if ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellido']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El nombre no cumple con el formato.";
    }
    $cedula = limpiarDatos($_POST['cedula']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $valido['success'] = false;
        $valido['mensaje'] = "La cedula no cumple con el formato solicitado.";
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
    $valor = 2;


    $sqlNumeroBloqueado = "SELECT numero, fecha, tipo_de_rifa FROM numero_bloqueado WHERE numero = '$numero' AND fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $rowBloqueado = mysqli_fetch_assoc($resultadoBloqueado);
    $NumeroBloqueado = $rowBloqueado['numero'];
    
    if ($numero == $NumeroBloqueado) {
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
        
        $sql = "INSERT INTO registro_numero_doble_oportunidad (id_doble_oportunidad, numero, vendedor, fecha, nombre, cedula, valor, tipo_de_rifa) VALUES (NULL, '$numero', '$vendedor', '$fecha', '$nombre', '$cedula', '$valor', '$tipo_de_rifa')";
        $resultadoRegistro = $mysqli->query($sql);

        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Registro Realizado.";
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "Fallo al realizar el registro.";
        }
        
    }
    }
    
}
echo json_encode($valido);




?>