<?php
require "config/conexion.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['rol'] != 1) {
        header("Location: 404.php");
    }
}
date_default_timezone_set('America/Caracas');
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];
// Traer los datos de los vendedores

$sqlVendedores = "SELECT cedula, nombre, telefono, correo FROM vendedores";
$respuestaVendedores = $mysqli->query($sqlVendedores);

// CONSULTA PARA EXTRAER TODOS LOS DATOS
$sqlRifaMoto = "SELECT COUNT(*) numero FROM registro_moto_numero";
$resultadoRifaMoto = $mysqli->query($sqlRifaMoto);
$row2 = mysqli_fetch_assoc($resultadoRifaMoto);
$RifaMoto = $row2['numero'];

// CONSULTA PARA EXTRAER TODOS LO NUMEROS DE RIFA DE DOBLE OPORTUNIDAD
$sqlRifaDobleOportunidad = "SELECT COUNT(*) numero FROM registro_numero_doble_oportunidad";
$resultadoRifaDobleOportunidad = $mysqli->query($sqlRifaDobleOportunidad);
$row1 = mysqli_fetch_assoc($resultadoRifaDobleOportunidad);
$DobleOportunidad = $row1['numero'];


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ROYAL 11:22</title>
    <link rel="shortcut icon" href="images/LOGO.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">

  </head>
  <body>
  <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="administrador.php">Royal 11:22</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="listadevendedores.php">Lista de Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listadeventas.php">Lista de ventas rifas</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <!-- <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Rifas
                                </button> -->
                                <a class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Lista de Rifas</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="listademoto.php">Rifa de Moto</a></li>
                                    <li><a class="dropdown-item" href="#">Rifa Doble Oportunidad</a></li>
                                    <li><a class="dropdown-item" href="#">Rifa Triple 500</a></li>
                                    <li><a class="dropdown-item" href="#">Rifa Millonaria</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <button type="button" class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Perfil
                </button>
                </div>
            </div>
        </nav>
                <div class="container-fluid">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Lista de ventas en rifas</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rifa de Moto</th>
                                            <th>Rifa de Doble Oportunidad</th>
                                            <th>Rifa Millonaria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Numeros Vendidos: <?php
                                                if ($RifaMoto == 0) {
                                                    echo "No se han vendido numeros";
                                                }else {
                                                    
                                                    echo $RifaMoto; 
                                                }
                                                ?>
                                                <br>
                                                Monto:
                                                <?php
                                                    $montoRifaMoto = $RifaMoto * 2;
                                                    echo $montoRifaMoto;
                                                ?>
                                                </td>
                                            <td>Numeros vendidos: <?php
                                                if ($DobleOportunidad == 0) {
                                                    echo "No se han vendido Numeros";
                                                } else {
                                                    
                                                    echo $DobleOportunidad; 
                                                }
                                            ?> <br>
                                            Monto: <?php 
                                                        $monto = $DobleOportunidad * 2;
                                                        echo $monto;
                                                    ?>
                                            </td>
                                            <td>40</td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



 </div>

    <?php
        include "content/inc/logoutModal.php";
        include "content/inc/script.php";
    
    ?>

    </body>
</html>