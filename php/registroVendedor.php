<?php

require "../config/conexion.php";
require "function.php";
// Instanciamos los que seria el array para la toma de los 2 valores
$valido['success']=array('success', false, 'mensaje'=>"");


if ($_POST) {
    // Toma de datos dependiendo si existe el envio de los mismos

    $cedula = limpiarDatos($_POST['cedulaVendedor']);
    if (!preg_match("/\b/", $cedula)) {
        $valido['success'] = false;
        $valido['mensaje'] = "La cedula solo deben de ser numeros.";
        if (!preg_match("/[0-9]{7,8}/", $cedula)) {
            $valido['success'] = false;
            $valido['mensaje'] = "La cedula no cumple con los formatos requeridos.";
        }
    }
    $nombre = limpiarDatos($_POST['nombre']);
    if (!preg_match("/[a-zA-Z\s]{4,30}/", $nombre)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El nombre no cumple con los caracteres requeridos.";
    }
    $telefono = limpiarDatos($_POST['telefono']);
    if (!preg_match("/\b/", $telefono)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permiten numeros en el telefono.";
    }
    $correo = limpiarDatos($_POST['correo']);
    if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $correo)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El correo no cumple con los caracteres establecidos.";
    }

    $sqlValidation = "SELECT cedula FROM vendedores WHERE cedula = '$cedula'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $num = $resultadoValidation->num_rows;
    if ($num > 0) {
        $valido['success'] = false;
        $valido['mensaje'] = "El vendedor ya existe.";
    }else {
        $sqlRegistro = "INSERT INTO vendedores (cedula, nombre, telefono, correo) VALUES ('$cedula','$nombre','$telefono','$correo')";
        $resultadoRegistro = $mysqli->query($sqlRegistro);

        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Vendedor registrado con exito.";
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "Error al registrar vendedor.";
        }
    }
}


echo json_encode($valido);



?>