<?php

require "../../config/conexion.php";
require "../function.php";
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $cantidad_venta = limpiarDatos($_POST['cantidadVenta']);
    if (preg_match("/\b/", $cantidad_venta)) {
        $valido['success'] = false;
        $valido['mensaje'] = "La cantidad debe ser un numero.";
    }
    $rifa_seleccion = limpiarDatos($_POST['rifaSeleccion']);
    if (preg_match("/\b/", $rifa_seleccion)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Error de seleccion de rifa.";
    }

    $sql = "INSERT INTO cantidad_venta (id_venta, cantidad_venta, fecha, tipo_de_rifa) VALUES (NULL, '$cantidad_venta','$fecha','$rifa_seleccion')";
    $resultado = $mysqli->query($sql);

    if ($resultado === true) {
        $valido['success'] = true;
        $valido['mensaje'] = "Guardado Correctamente.";
    }else {
        $valido['success'] = false;
        $valido['mensaje'] = "Error al guardar.";
    }
}else {
    $valido['sucess'] = false;
    $valido['mensaje'] = "Error de envio de datos.";
}

echo json_encode($valido);


?>