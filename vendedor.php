<?php
require "config/conexion.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}else{
    if ($_SESSION['rol'] != 2) {
        header("Location: 404.php");
    }
}

date_default_timezone_set('America/Caracas');
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];

$zodiaco = "SELECT id_zodiaco, zodiaco FROM zodiaco";
$resultadoZodiaco = $mysqli->query($zodiaco);
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
                <img src="images/LOGO.jpeg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="vendedor.php">Royal 11:22</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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


        <!-- Modal -->
        <div class="modal fade" id="salir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Salir?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="logout.php">Salir</a>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
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