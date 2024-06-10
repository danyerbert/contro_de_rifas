<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "control_de_rifas_l10");

if ($mysqli->connect_error) {
    die("Conexion Fallo:" . $mysqli->connect_error);

}
?>