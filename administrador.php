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

$zodiaco = "SELECT id_zodiaco, zodiaco FROM zodiaco";
$resultadoZodiaco = $mysqli->query($zodiaco);

// Consulta para traer todas las rifas creadas
$sqlRifas = "SELECT id_rifas, nombre FROM tipo_de_rifas";
$resultadoRifas = $mysqli->query($sqlRifas);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ROYAL 11:22</title>
    <link rel="shortcut icon" href="images/LOGO.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#BuscarNumeros">Rifa Millonaria</a>
                        </li> -->
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
                <div class="col-md-4">
                    <img src="images/moto.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">RIFA DE MOTO</h5>
                        <P>Descripcion:</P>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rifaMoto">
                        Boleto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/doble_oportunidad.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Doble Oportunidad</h5>
                        <p>Descripcion:</p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rifaDobleOportunidad">
                        Boleto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/rifas/rifamillonaria.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Rifa Millonaria</h5>
                        <p>Descripcion:</p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rifaMillonaria">
                        Boleto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/rifas/triple500.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Rifa Trible 500</h5>
                        <p>Descripcion:</p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#rifaTriple">
                        Boleto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>





    <?php
        include "content/inc/logoutModal.php";

        // Modales para el registro de numeros de la rifa
        include "content/modal/rifamoto.php";
        include "content/modal/rifaDobleOportunidad.php";
        include "content/modal/rifaMillonaria.php";
        include "content/modal/rifatriple.php";

        // Modales para el bloqueo de las rifas
        include "content/modal/bloquearNumeroMoto.php";
        include "content/modal/bloquearNumeroDoble.php";
        include "content/modal/bloquearNumeroMillonaria.php";
        include "content/modal/bloquearNumeroTriple.php";

        // Buscar numeros
        include "content/modal/buscarNumeros.php";

        include "content/inc/script.php";
    
    ?>







   
    <script src="js/funtion.js"></script>
    <!-- JS para el tema de recoleccion de informacion -->
    <script src="js/registro/registroNumeroMoto.js"></script>
    <script src="js/registro/registroNumeroDoble.js"></script>
    <script src="js/registro//registronumerotriple.js"></script>
    <script src="js/registro/registroNumeroMillonaria.js"></script>
    <!-- JS para el bloqueo de numeros -->
    <script src="js/bloqueo/bloqueoNumeroMoto.js"></script>
    <script src="js/bloqueo/bloqueoNumeroDoble.js"></script>
    <script src="js/bloqueo/bloqueoNumeroMillonaria.js"></script>
    <script src="js/bloqueo/bloqueoNumeroTriple.js"></script>
    </body>
</html>