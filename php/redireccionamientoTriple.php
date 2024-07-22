<?php

require "function.php";

if ($_POST) {
    $rol = limpiarDatos($_POST['rol']);
    if ($rol === "") {
        header("Location: 404.php");
    }
    switch ($rol) {
        case 1:
            $ruta = "administrador.php";
            break;
        case 2:
            $ruta = "vendedor.php";
            break;
        case 3:
            $ruta = "supervisor.php";
            break;
        default:
            header("Location: 404.php");
            break;
    }

    $fechaDesde = limpiarDatos($_POST['fechaDesde']);
    if ($fechaDesde === "") {
        header("Location: $ruta");
    }elseif ($fechaDesde == "0000-00-00") {
        header("Location: $ruta");
    }
    $fechaHasta = limpiarDatos($_POST['fechaHasta']);
    if ($fechaHasta === "") {
        header("Location: $ruta");
    }elseif ($fechaHasta == "0000-00-00") {
        header("Location: $ruta");
    }
    $metodoPago = limpiarDatos($_POST['metodoPago']);
    if (!preg_match("/\b/", $metodoPago)) {
        header("Location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $metodoPago)) {
        header("Location: $ruta");
    }
    $formato = limpiarDatos($_POST['formato']);
    if (!preg_match("/\b/", $formato)) {
        header("Location: $ruta");
    }elseif (!preg_match("/[0-9]{1}/", $formato)) {
        header("Location: $ruta");
    }

    switch ($formato) {
        case 1:
            header("location: ../report/pdf/reporteRifaTriplePDF.php?fd=$fechaDesde&fh=$fechaHasta&mdp=$metodoPago&r=$rol");
            break;
        case 2:
            header("location: ../report/excel/reporteRifaTripleExcel.php?fd=$fechaDesde&fh=$fechaHasta&mdp=$metodoPago&r=$rol");
            break;
        
        default:
        
            break;
    }
}


















?>