<?php
require "../config/conexion.php";

require "function.php";

// Instanciamos los que seria el array para la toma de los 2 valores
$valido['success']=array('success', false, 'mensaje'=>"");

if ($_POST) {
    $cedula = limpiarDatos($_POST['cedulaUsuario']);
    if (!preg_match("/\b/", $cedula)) {
        $valido['success'] = false;
        $valido['mensaje'] = "La cedula solo deben de ser numeros.";
        if (!preg_match("/[0-9]{7,8}/", $cedula)) {
            $valido['success'] = false;
            $valido['mensaje'] = "La cedula no cumple con los formatos requeridos.";
        }
    }
    $usuario = limpiarDatos($_POST['usuario']);
    if (!preg_match("/[a-zA-Z]{4,30}/", $usuario)) {
        $valido['success'] = false;
        $valido['mensaje'] = "El usuario no cumple con los caracteres establecidos.";
    }
    // $password = limpiarDatos($_POST['password']);
    // if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{12,16}$/", $password)) {
    //     $valido['success'] = false;
    //     $valido['mensaje'] = "La contrasena no cumple con los caracteres establecidos.";
    // }
    $password = limpiarDatos($_POST['password']);
    if ($password == "") {
        $valido['success'] = false;
        $valido['mensaje'] = "Ingrese una contraseña.";
    }
    $rol = limpiarDatos($_POST['rol']);
    if ($rol != 2) {
        $valido['success'] = false;
        $valido['mensaje'] = "Rol no enviado.";
    }

    // Encriptar la clave

    $pass_encriptada = sha1($password);
    
    $sqlValidation = "SELECT cedula FROM usuario WHERE cedula = '$cedula'";
    $resultadoValidation = $mysqli->query($sqlValidation);
    $num = $resultadoValidation->num_rows;
    if ($num>0) {
        $valido['success'] = false;
        $valido['mensaje'] = "El usuario ya existe.";
    }else {
        $sqlRegistro = "INSERT INTO usuario (id, usuario, password, cedula, id_rol) VALUES (NULL, '$usuario','$pass_encriptada','$cedula','$rol')";
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
