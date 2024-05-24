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
    $numeroAcomulado = limpiarDatos($_POST['numero_acomulado']);
    if (preg_match("/\b/", $numeroAcomulado)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar solo numeros.";
    }elseif (preg_match("/[0-9]{4,4}/", $numeroAcomulado)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar el numeros en el formato solicitado.";
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

    $participa = limpiarDatos($_POST['participacion']);

    if ($participa == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Fecha no enviada.";
    }

    $sqlRegistro = "INSERT INTO triple_acomulado (id_triple_acomulado, numero, vendedor, fecha, participacion) VALUES (NULL, '$numeroAcomulado', '$vendedor', '$fecha','$participa')";
    $resultadoRegistro = $mysqli->query($sqlRegistro);

    if ($resultadoRegistro === true) {
        $valido['success'] = true;
        $valido['mensaje'] = "Registro Exito.";
    }else {
        $valido['success'] = false;
        $valido['mensaje'] = "Fallo al realizar el registro.";
    }
}

echo json_encode($valido);

?>