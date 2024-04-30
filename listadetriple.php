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
$fecha = date("Y-m-d");
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];

// CONSULTA PARA EXTRAER TODOS LOS DATOS
$sqlRifaMoto = "SELECT m.numero, m.monto_total, v.nombre FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
$resultadoRifaMoto = $mysqli->query($sqlRifaMoto);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Lista de Rifas</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="listademoto.php">Rifa de Moto</a></li>
                                    <li><a class="dropdown-item" href="listadobleoportunidad.php">Rifa Doble Oportunidad</a></li>
                                    <li><a class="dropdown-item" href="listadetriple.php">Rifa Triple 500</a></li>
                                    <li><a class="dropdown-item" href="listademillonaria.php">Rifa Millonaria</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">Gestionar Rifa</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BloquearNumeroMoto">Bloquear Numero Moto</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BloquearNumeroDoble">Rifa Doble Oportunidad</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BloquearNumeroTriple">Rifa Triple 500</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#BloquearNumeroMillonaria">Rifa Millonaria</a></li>
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
        <div class="container-sm text-center">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Estadisticas</h5>
                            <!-- <P>Descripcion:</P> -->
                            <p class="card-text">Numeros vendidos : <?php echo $Cantidad;?></p>
                            <a href="report/excel/reporteRifaTriple.php" target="_blank" class="btn btn-info btn-sm"><i class="bi bi-filetype-xlsx"></i> Generar Reporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="container-fluid">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Numeros Vendidos Doble Oportunidad</h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Monto a pagar</th>
                                            <th>Vendedor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                while ($rowNumero = $resultadoRifaMoto->fetch_assoc()):
                                                ?>
                                        <tr>
                                            <td><?php 
                                                echo $rowNumero['numero'];
                                            ?></td>
                                            <td><?php echo $rowNumero['monto_total'];?></td>
                                            <td><?php echo $rowNumero['nombre'];?></td>        
                                            <?php 
                                                endwhile;
                                            ?>
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