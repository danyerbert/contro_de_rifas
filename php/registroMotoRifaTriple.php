<?php
require "../config/conexion.php";
require "function.php";

$valido['success']=array('success', false, 'mensaje'=>"");


date_default_timezone_set('America/Caracas');

    $horaServer =  date('h:i:s A');
    $horaDeCierre = "08:00:00 PM";

    if ($horaServer >= $horaDeCierre) {
        $valido['success'] = false;
        $valido['mensaje'] = "Cierre realizado.";
    }elseif ($_POST) {
    $nombre = limpiarDatos($_POST['nombreApellido']);
    if (!preg_match("/^[a-zA-Z\s]{3,80}/", $nombre)) {
        $nombre = "No obtenidos";
    }
    $cedula = limpiarDatos($_POST['cedulaTripleMoto']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $cedula = "No obtenida.";
    }
    $numeroUno = limpiarDatos($_POST['numeroMotoTriple1']);
    if (!preg_match("/\b/", $numeroUno)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar solo numeros.";
        if (!preg_match("/[0-9]{2}/", $numeroUno)) {
            $valido['success'] = false;
            $valido['mensaje'] = "Debe ingresar solo 2 digitos.";
        }
    }
    $numeroDos = limpiarDatos($_POST['numeroMotoTriple2']);
    if (!preg_match("/\b/", $numeroDos)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar solo numeros.";
        if (!preg_match("/[0-9]{2}/", $numeroDos)) {
            $valido['success'] = false;
            $valido['mensaje'] = "Debe ingresar solo 2 digitos.";
        }
    }
    $signoUno = limpiarDatos($_POST['zodiaco1']);
    if ($signo == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione un signo zodiacal.";
    }
    $signoDos = limpiarDatos($_POST['zodiaco2']);
    if ($signo == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione un signo zodiacal.";
    }

    if ($numeroUno > 999) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 00 al 99.";
    }
    if ($numeroDos > 999) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 00 al 99.";
    }
    $vendedor = limpiarDatos($_POST['vendedorTripleMoto']);
    if ($vendedor == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Informacion no valida.";
    }
    $fecha = limpiarDatos($_POST['fechaTripleMoto']);
    if ($fecha == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Fecha no enviada.";
    }
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa_moto_triple']);
    if ($tipo_de_rifa != 5) {
        $valido['success'] = false;
        $valido['mensaje'] = "Rifa no coincide.";
    }

}










?>