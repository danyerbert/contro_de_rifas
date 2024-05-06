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

// Recibo de valores para la muestra de las diferentes listas
if ($_POST) {
    $tipo_de_rifa = $_POST['tipo_de_rifa'];

    switch ($tipo_de_rifa) {
        case 1:
            $sqlBusqueda = "SELECT m.numero, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
            INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
            $resultadoBusqueda = $mysqli->query($sqlBusqueda);

            // Nombre de la rifa
            $tipo = "Rifa de Moto";
            break;
        case 2:
            $sqlBusqueda = "SELECT m.numero, v.nombre FROM registro_numero_doble_oportunidad AS m 
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE m.fecha = '$fecha'";
            $resultadoBusqueda = $mysqli->query($sqlBusqueda); 

            // Nombre de la rifa
            $tipo = "Rifa Doble oportunidad";
            break;
        case 3:
            $sqlBusqueda = "SELECT m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, v.nombre FROM registro_numero_millonaria AS m 
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE m.fecha = '$fecha'";
            $resultadoBusqueda = $mysqli->query($sqlBusqueda);

            // Nombre de la rifa
            $tipo = "Rifa millonaria";
            break;
        case 4:
            $sqlBusqueda = "SELECT m.numero, m.monto_total, v.nombre FROM registro_numero_triple_500 AS m 
            INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
            $resultadoBusqueda = $mysqli->query($sqlBusqueda);

            // Nombre de la rifa
            $tipo = "Rifa de triple 500";
            break;
    }
}
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];

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
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#BloquearNumeroMillonaria">Rifa Millonaria</a>
                        </li>
                    </ul>
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

                            <?php
                                switch ($tipo_de_rifa) {
                                    case 1:
                                            // Cantidad de numeros vendidos.
                                            $sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE fecha = '$fecha'";
                                            $resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
                                            $rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
                                            $Cantidad = $rowCantidad['numero'];
                                            $MontoTotal = $Cantidad * 2;
                                            echo '
                                            
                                            <h5 class="card-title">Estadisticas</h5>
                                            <!-- <P>Descripcion:</P> -->
                                            <p class="card-text">Numeros vendidos : '.$Cantidad.'</p>
                                            <p class="card-text">Monto Total : .'.$MontoTotal.'</p>
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-primary">
                                                    Generar Reporte
                                                </button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <!-- Dropdown menu links -->
                                                    <a href="report/excel/reporteRifaTriple.php" target="_blank" class="dropdown-item"><i class="bi bi-filetype-xlsx"></i> EXCEL</a>
                                                    <a href="report/pdf/reporteRifaTriple.php" class="dropdown-item" target="_blank"><i class="bi bi-filetype-pdf"></i> PDF</a>
                                                </ul>
                                            </div>
                                            ';
                                        break;
                                    case 2:
                                            // Cantidad de numeros vendidos.
                                            $sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_doble_oportunidad WHERE fecha = '$fecha'";
                                            $resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
                                            $rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
                                            $Cantidad = $rowCantidad['numero'];
                                            $MontoTotal = $Cantidad * 2;
                                            echo '
                                            
                                            <h5 class="card-title">Estadisticas</h5>
                                            <p class="card-text">Numeros vendidos :  '.$Cantidad.'</p>
                                            <p class="card-text">Monto Total : '.$MontoTotal.'</p>
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-primary">
                                                    Generar Reporte
                                                </button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <a href="report/excel/reporteRifaDobleOportunidad.php" target="_blank" class="dropdown-item"><i class="bi bi-filetype-xlsx"></i> EXCEL</a>
                                                    <a href="report/pdf/reporteRifaDoble.php" class="dropdown-item" target="_blank"><i class="bi bi-filetype-pdf"></i> PDF</a>
                                                </ul>
                                            </div>
                                            
                                            
                                            ';


                                        break;
                                    case 3:
                                            echo '
                                            
                                            <div class="btn-group dropend">
                                            <button type="button" class="btn btn-primary">
                                                Generar Reporte
                                            </button>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <!-- Dropdown menu links -->
                                                <a href="report/excel/reporteRifaMillonaria.php" target="_blank" class="dropdown-item"><i class="bi bi-filetype-xlsx"></i> EXCEL</a>
                                                <a href="report/pdf/reporteRifaMillonaria.php" class="dropdown-item" target="_blank"><i class="bi bi-filetype-pdf"></i> PDF</a>
                                            </ul>
                                        </div>
                                            
                                            
                                            ';
                                        break;
                                    case 4:
                                        // Cantidad de numeros vendidos.
                                            $sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
                                            $resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
                                            $rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
                                            $Cantidad = $rowCantidad['numero'];
                                            echo '
                                            <h5 class="card-title">Estadisticas</h5>
                                            <p class="card-text">Numeros vendidos : '.$Cantidad.'</p>
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-primary">
                                                    Generar Reporte
                                                </button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <a href="report/excel/reporteRifaTriple.php" target="_blank" class="dropdown-item"><i class="bi bi-filetype-xlsx"></i> EXCEL</a>
                                                    <a href="report/pdf/reporteRifaTriple.php" class="dropdown-item" target="_blank"><i class="bi bi-filetype-pdf"></i> PDF</a>
                                                </ul>
                                            </div>

                                            
                                            
                                            ';
                                        break;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="container-fluid">
                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <h6 class="m-0 font-weight-bold text-primary">Lista de numero vendidos 
                                <?php
                                    echo $tipo;
                                ?>
                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php
                                                switch ($tipo_de_rifa) {
                                                    case 1:
                                                        echo "
                                                            <th>Número</th>
                                                            <th>triplecación</th>
                                                            <th>Vendedor</th>
                                                            ";
                                                        break;
                                                    case 2:
                                                        echo "
                                                        <th>Número</th>
                                                        <th>Vendedor</th>
                                                        ";
                                                        break;
                                                    case 3:
                                                        echo "
                                                        <th>Primer Número</th>
                                                        <th>Segundo Numero</th>
                                                        <th>Tercer Numero</th>
                                                        <th>Cuarto Numeros</th>
                                                        <th>Quinto Numero</th>
                                                        <th>Vendedor</th>
                                                        ";
                                                        break;
                                                    case 4:
                                                        echo "
                                                        <th>Número</th>
                                                        <th>triplecación</th>
                                                        <th>Vendedor</th>
                                                        ";
                                                        break;
                                                }
                                            ?>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                while ($rowNumero = $resultadoBusqueda->fetch_assoc()):
                                                ?>
                                        <tr>
                                            <?php
                                                switch ($tipo_de_rifa) {
                                                    case 1:

                                                        echo "
                                                            <td> ".$rowNumero['numero']."</td>
                                                            <td> ".$rowNumero['monto_total']."</td>
                                                            <td> ".$rowNumero['nombre']."</td>
                                                        ";
                                                        break;
                                                    case 2:
                                                        echo "
                                                            <td> ".$rowNumero['numero']."</td>
                                                            <td> ".$rowNumero['nombre']."</td>
                                                        ";
                                                        break;
                                                    case 3:
                                                        echo "
                                                        <td> ".$rowNumero['numero_one']."</td>
                                                        <td> ".$rowNumero['numero_dos']."</td>
                                                        <td> ".$rowNumero['numero_tres']."</td>
                                                        <td> ".$rowNumero['numero_cuatro']."</td>
                                                        <td> ".$rowNumero['numero_cinco']."</td>
                                                        <td> ".$rowNumero['nombre']."</td>

                                                        ";
                                                        break;
                                                    case 4:
                                                        echo "
                                                        <td> ".$rowNumero['numero']."</td>
                                                        <td> ".$rowNumero['monto_total']."$ </td>
                                                        <td> ".$rowNumero['nombre']."</td>
                                                        
                                                        ";
                                                        break;
                                                }
                                            
                                            
                                            ?>      
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