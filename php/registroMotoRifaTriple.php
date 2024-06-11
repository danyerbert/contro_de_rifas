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
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar el nombre.";
    }
    $cedula = limpiarDatos($_POST['cedulaTripleMoto']);
    if (!preg_match("/^[0-9]{7,8}/", $cedula)) {
        $valido['success'] = false;
        $valido['mensaje'] = "Debe ingresar la cedula.";
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
    if ($signoUno == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione un signo zodiacal.";
    }
    $signoDos = limpiarDatos($_POST['zodiaco2']);
    if ($signoDos == '') {
        $valido['success'] = false;
        $valido['mensaje'] = "Seleccione un signo zodiacal.";
    }

    if ($numeroUno > 999) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 000 al 999.";
    }
    if ($numeroDos > 999) {
        $valido['success'] = false;
        $valido['mensaje'] = "Solo se permite desde el 000 al 999.";
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
    $valor = 1;

    // Verificacion de numero bloqueado.

    $sqlNumeroBloqueado = "SELECT numero, fecha FROM numero_bloqueado WHERE fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    $num = $resultadoBloqueado->num_rows;
    
    if ($num >0) {
        $valido['success'] = false;
        $valido['mensaje'] = "Numero no permitido.";
    }else {
        // Validacion de numero bloqueado.
        $sqlValidationNumero = "SELECT COUNT(*) numero_primero, COUNT(*) numero_segundo FROM registro_moto_triples WHERE numero_primero = '$numeroUno' AND numero_segundo = '$numeroDos' AND fecha = '$fecha'";
        $resultadoValidationNumero = $mysqli->query($sqlValidationNumero);
        $row = mysqli_fetch_assoc($resultadoValidationNumero);
        $valorNumeroPrimero = $row['numero_primero'];
        $valorNumeroSegundo = $row['numero_segundo'];


         // Validacion de limite de venta.
         $sqlLimiteVenta = "SELECT cantidad_venta FROM cantidad_venta WHERE tipo_de_rifa = 5 AND fecha = '$fecha'";
         $resultadoLimite = $mysqli->query($sqlLimiteVenta);
         $rowLimite = mysqli_fetch_assoc($resultadoLimite);
         $dbcantidad = $rowLimite['cantidad_venta'];
 
         if ($dbcantidad = 0) {
             $limite_venta = 3;
         }else {
             $limite_venta = $rowLimite['cantidad_venta'];
         }
 
         if ($valorNumeroPrimero == $limite_venta || $valorNumeroSegundo == $limite_venta) {
             $valido['success'] = false;
             $valido['mensaje'] = "Numero no habilitado.";
         }else {
            
            $sqlRegistro = "INSERT INTO registro_moto_triples (id_rifa_moto_triple, numero_primero, numero_segundo, zodiacal_primero, zodiacal_segundo, fecha, vendedor, nombre_comprador, cedula, valor, tipo_de_rifa, metodo_pago, cantidad_pago) VALUES (NULL, '$numeroUno','$numeroDos','$signoUno','$signoDos','$fecha','$vendedor','$nombre','$cedula','$valor','$tipo_de_rifa', '$metodoDePago', '$cantidaPago')";
            $resultadoRegistro = $mysqli->query($sqlRegistro);

            if ($resultadoRegistro === true) {
                $valido['success'] = true;
                $valido['mensaje'] = "Registro de numero exitos.";
            }else {
                $valido['success'] = false;
                $valido['mensaje'] = "No se logro registrar el numero.";
            }
         }

    }
}

echo json_encode($valido);








?>