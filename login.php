<?php
require "config/conexion.php";
require "php/function.php";

session_start();


//Verficacion de datos

if ($_POST) {
    $usuario = limpiarDatos($_POST['usuario']);

    // if (!preg_match("/[a-zA-Z]{4-30}/", $usuario)) {
    //     echo  "
    //     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    //     <script language='JavaScript'>
    //     document.addEventListener('DOMContentLoaded', function() {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'El nombre de usuario no cumple con las caracteristicas establecidas.',
    //             showCancelButton: false,
    //             confirmButtonColor: '#3085d6',
    //             confirmButtonText: 'OK'
    //           }).then(() => {
    //             location.assign('../index.php');
    //           });
    //         });
    //     </script>";
    // }
    $password = limpiarDatos($_POST['password']);
            // if (!preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,25}$/", $password)) {
            //     echo  "
            //     <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            //     <script language='JavaScript'>
            //     document.addEventListener('DOMContentLoaded', function() {
            //         Swal.fire({
            //             icon: 'error',
            //             title: 'Las caracteristicas no cumplen con el formato preestablecido.',
            //             showCancelButton: false,
            //             confirmButtonColor: '#3085d6',
            //             confirmButtonText: 'OK'
            //         }).then(() => {
            //             location.assign('index.php');
            //         });
            //         });
            //     </script>";
            // }

    $sql = "SELECT id, usuario, password,cedula, id_rol FROM usuario WHERE usuario = '$usuario'";

    $resultado = $mysqli->query($sql);

    $num = $resultado->num_rows;

    if ($num > 0) {
        $row = $resultado->fetch_assoc();
        $password_db = $row['password'];
        $password_env = sha1($password);
        if ($password_db = $password_env) {
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['rol'] = $row['id_rol'];
            $_SESSION['cedula'] = $row['cedula'];
            if (isset($_SESSION['rol'])) {
                switch ($_SESSION['rol']) {
                    case 1:
                        // Comprobacion para rederigir al usuario al perfil de administrador.
                        header("Location:administrador.php");
                        break;
                    case 2:
                        // Comprobacion para rederigir al vendedor
                        header("Location:vendedor.php");
                        break;
                    case 3:
                        // Comprobacion para rederigir al supervisor
                        header("Location:supervisor.php");
                        break;
                    default:
                    echo  "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Rol no existente',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                          }).then(() => {
                            location.assign('index.php');
                          });
                });
                    </script>";
                        break;
                }
            }
        }else {
            // Envia un mensaje de alerta por si el password no coincide
             echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'La contraseña no coincide',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                      }).then(() => {

                        location.assign('index.php');

                      });
            });
                </script>";
        }
    }else {
        // Envia un mensaje de alerta por si el usuario no coincide no coincide
        echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'El usuario no coincide',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                      }).then(() => {

                        location.assign('index.php');

                      });
            });
                </script>";
    }
}


?>