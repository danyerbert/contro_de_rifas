<?php
require "../config/conexion.php";
require "function.php";

$valido['success']=array('success', false, 'mensaje'=>"", 'ticket' => "");

date_default_timezone_set('America/Caracas');
$horaServer =  date('h:i:s A');
$horaDeCierre = "11:00:00 PM";

if ($horaServer >= $horaDeCierre) {
    $valido['success'] = false;
    $valido['mensaje'] = "Cierre realizado.";
}elseif ($_POST) {
    $cedula = limpiarDatos($_POST['cedula']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $cedula = "No obtenida.";
    }
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
    $datos = "SELECT MAX(id_triple_acomulado) AS id_triple_acomulado FROM triple_acomulado WHERE fecha = '$fecha'";
    $resultado=mysqli_query($mysqli,$datos);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $valor1 = $row['id_triple_acomulado'];
            $contadordb = 0;
            for ($i=0; $i <= $valor1 ; $i++) { 
                if ($valor1 == 0) {
                    $contadordb = 1;
                }else {
                    $contadordb++;
                }
            }
            $irta =  date("Y", strtotime($fecha)) ."-"."TA". "-". $contadordb ;
    }
    $sqlRegistro = "INSERT INTO triple_acomulado (id_triple_acomulado, irta, numero, cedula_comprador, vendedor, fecha, participacion) VALUES (NULL, '$irta', '$numeroAcomulado', '$cedula', '$vendedor', '$fecha','$participa')";
    $resultadoRegistro = $mysqli->query($sqlRegistro);

    if ($resultadoRegistro === true) {
        $valido['success'] = true;
        $valido['mensaje'] = "Registro Exito.";
        $valido['ticket'] = $irta;
    }else {
        $valido['success'] = false;
        $valido['mensaje'] = "Fallo al realizar el registro.";
    }
}

echo json_encode($valido);

?>