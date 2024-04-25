<?php

require "../../config/conexion.php";
require "../function.php";
date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");

$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $numero_bloquear = limpiarDatos($_POST['numeroBloquear']);
    if (!preg_match("/\b/", $numero_bloquear)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar un numero";
    }
    if (!preg_match("/[0-9]{3}/", $numero_bloquear)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar un numero";
    }
    $tipo_de_rifa = limpiarDatos($_POST['tipo_de_rifa']);
    if ($tipo_de_rifa != 1) {
        $valido['success'] = false;
        $valido['mensaje'] = "Informacion no enviada.";
    }

    $sql = "INSERT INTO numero_bloqueado (id_numero_bloqueo, numero, fecha, tipo_de_rifa) VALUES (NULL, '$numero_bloquear', '$fecha', '$tipo_de_rifa')";
    $resultadoBloqueado = $mysqli->query($sql);
    if ($resultadoBloqueado === true) {
        $valido['success'] = true;
        $valido['mensaje'] = "Se guardo el numero correctamente";
    }else {
        $valido['success'] = false;
        $valido['mensaje'] = "No se guardo el numero correctamente";
    }
}

echo json_encode($valido);
?>