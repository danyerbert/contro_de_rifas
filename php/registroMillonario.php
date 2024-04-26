<?php

require "../config/conexion.php";
require "function.php";

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $nombre = limpiarDatos($_POST['nombre']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
       $nombre = "No obtenido";
    }
    $cedula = limpiarDatos($_POST['cedula']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $cedula = "No obtenido";
    }

    $numeroOne = limpiarDatos($_POST['numeroOne']);
    if (!preg_match("/[0-9]{3}/", $numeroOne)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El formato del numero uno no es correcto.";
    }
    $numeroDos = limpiarDatos($_POST['numeroDos']);
    if (!preg_match("/[0-9]{3}/", $numeroDos)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El formato del numero dos no es correcto.";
    }
    $numeroTres = limpiarDatos($_POST['numeroTres']);
    if (!preg_match("/[0-9]{3}/", $numeroTres)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El formato del numero tres no es correcto.";
    }
    $numeroCuatro = limpiarDatos($_POST['numeroCuatro']);
    if (!preg_match("/[0-9]{3}/", $numeroCuatro)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El formato del numero cuatro no es correcto.";
    }
    $numeroCinco = limpiarDatos($_POST['numeroCinco']);
    if (!preg_match("/[0-9]{3}/", $numeroCinco)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El formato del numero cinco no es correcto.";
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
    if ($tipo_de_rifa != 3) {
        $valido['success'] = false;
        $valido['mensaje'] = "Rifa no coincide.";
    }
    // Va
    $valor = 2;

    $sqlNumeroBloqueado = "SELECT numero, fecha FROM numero_bloqueado WHERE numero = '$numeroOne' AND fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $rowBloqueado = mysqli_fetch_assoc($resultadoBloqueado);
    $NumeroBloqueado = $rowBloqueado['numero'];

    if ($numeroOne == $NumeroBloqueado) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }elseif (
        $numeroDos == $NumeroBloqueado
    ) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }elseif (
        $numeroTres == $NumeroBloqueado
    ) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }elseif (
        $numeroCuatro == $NumeroBloqueado
    ) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }elseif (
        $numeroCinco == $NumeroBloqueado
    ) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }else {
        $sql = "INSERT INTO registro_numero_millonaria (id_millonaria, numero_one, numero_dos, numero_tres, numero_cuatro, numero_cinco, vendedor, valor, fecha, nombre, cedula) VALUES (NULL, '$numeroOne','$numeroDos','$numeroTres','$numeroCuatro','$numeroCinco','$vendedor','$valor','$fecha','$nombre','$cedula')";
        $resultadoRegistro = $mysqli->query($sql);
    
        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Se registro correctamente.";
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "No se realizo el registro.";
        }
    }


  
}

echo json_encode($valido);

?>