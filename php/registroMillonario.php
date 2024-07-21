<?php

require "../config/conexion.php";
require "function.php";
date_default_timezone_set('America/Caracas');
$valido['success']=array('success', false, 'mensaje'=>"", 'ticket' => "");
    $horaServer =  date('h:i:s A');
    $horaDeCierre = "11:00:00 PM";

    // if ($horaServer >= $horaDeCierre) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Cierre realizado.";
    // }else
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
    $montoBolivares = limpiarDatos($_POST['montoBolivares']);
    if ($montoBolivares === '') {
        $montoBolivares = "N/A";
    } 
    $valor = 2;

    // $sqlNumeroBloqueado = "SELECT numero FROM numero_bloqueado WHERE fecha = '$fecha' AND tipo_de_rifa = '$tipo_de_rifa'";
    // $resultadoBloqueado = $mysqli->query($sqlNumeroBloqueado);
    // $rowBloqueado = mysqli_fetch_assoc($resultadoBloqueado);
    // $NumeroBloqueado = $rowBloqueado['numero'];

    // if ($numeroOne == $NumeroBloqueado) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Numero no permitido: " . $numeroOne;
    // }elseif (
    //     $numeroDos == $NumeroBloqueado
    // ) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Numero no permitido: " . $numeroDos;
    // }elseif (
    //     $numeroTres == $NumeroBloqueado
    // ) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Numero no permitido: " . $numeroTres;
    // }elseif (
    //     $numeroCuatro == $NumeroBloqueado
    // ) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Numero no permitido: " . $numeroCuatro;
    // }elseif (
    //     $numeroCinco == $NumeroBloqueado
    // ) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "Numero no permitido: " . $numeroCinco;
    // }else {
    
        $datos = "SELECT MAX(id_millonaria) AS id_millonaria  FROM registro_numero_millonaria WHERE fecha = '$fecha'";
        $resultado=mysqli_query($mysqli,$datos);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $valor1 = $row['id_millonaria'];
                $contadordb = 0;
                for ($i=0; $i <= $valor1 ; $i++) { 
                    if ($valor1 == 0) {
                        $contadordb = 1;
                    }else {
                        $contadordb++;
                    }
                }
                $irmm =  date("Y", strtotime($fecha)) ."-"."MM". "-". $contadordb ;
        }
        switch ($metodoDePago) {
            case 1:
                $sql = "INSERT INTO registro_numero_millonaria (id_millonaria, irmm, numero_one, numero_dos, numero_tres, numero_cuatro, numero_cinco, vendedor, valor, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irmm', '$numeroOne','$numeroDos','$numeroTres','$numeroCuatro','$numeroCinco','$vendedor','$valor','$fecha','$nombre','$cedula', '$tipo_de_rifa', '$metodoDePago', '$montoBolivares', '$cantidaPago')";
                break;
            
            default:
                $sql = "INSERT INTO registro_numero_millonaria (id_millonaria, irmm, numero_one, numero_dos, numero_tres, numero_cuatro, numero_cinco, vendedor, valor, fecha, nombre_comprador, cedula, tipo_de_rifa, metodo_pago, cantidad_pago, referencia_pm) VALUES (NULL, '$irmm', '$numeroOne','$numeroDos','$numeroTres','$numeroCuatro','$numeroCinco','$vendedor','$valor','$fecha','$nombre','$cedula', '$tipo_de_rifa', '$metodoDePago', '$cantidaPago', '$montoBolivares')";
                break;
        }
        $resultadoRegistro = $mysqli->query($sql);
        if ($resultadoRegistro === true) {
            $valido['success'] = true;
            $valido['mensaje'] = "Se registro correctamente.";
            $valido['ticket'] = $irmm;
        }else {
            $valido['success'] = false;
            $valido['mensaje'] = "No se realizo el registro.";
        }
    }
// }
echo json_encode($valido);
?>