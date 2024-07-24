<?php

require "config/conexion.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

date_default_timezone_set('America/Caracas');
$fecha = date("Y-m-d");
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];
$rol = $_SESSION['rol'];

// CONSULTA PARA EXTRAER TODOS LOS DATOS
$sqlRifaMoto = "SELECT m.numero, m.monto_total, m.nombre_comprador, m.cedula, m.cantidad_pago, m.referencia_pm, p.metodo, v.nombre FROM registro_numero_triple_500 AS m 
INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE fecha = '$fecha'";
$resultadoRifaMoto = $mysqli->query($sqlRifaMoto);

// Cantidad de numeros vendidos.
$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE fecha = '$fecha'";
$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
$Cantidad = $rowCantidad['numero'];
$sqlMetodoPago = "SELECT id_metodo_pago, metodo FROM metodo_de_pago";
    $resultadoMetodoPago = $mysqli->query($sqlMetodoPago);
    // Consulta para traer todas las rifas creadas
	$sqlRifas = "SELECT id_rifas, nombre FROM tipo_de_rifas";
	$resultadoRifas = $mysqli->query($sqlRifas);

	include "content/inc/header.php";
	include "content/inc/sidebar.php";

?>


<!-- Page content start  -->
<div class="page-content">

    <!-- Main container start -->
    <div class="main-container">

        <?php
						include "content/inc/navbar.php";
					?>

        <!-- Page header start -->
        <div class="page-header">

            <!-- Breadcrumb start -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Administrador | Lista de Rifa Triple 500</li>
            </ol>
            <!-- Breadcrumb end -->
        </div>
        <!-- Page header end -->
        <div class="row gutters">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="info-stats2">
                    <div class="info-icon">
                        <i class="icon-activity"></i>
                    </div>
                    <div class="sale-num">
                        <h4>Estadisticas</h4>
                        <p>Numeros Vendidos:</p>
                        <h5><?php echo $Cantidad;?></h5>
                        <br>
                        <a href="#" class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#generarReporteTriple"> <i class="icon-export"></i> Generar Reporte</a>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body pricing-plan">
                        <h5 class="card-title">Reglas del Juego</h5>
                        <ul class="pricing-features">
                            <li>Son 1000 números a rifar (de tres cifras)</li>
                            <li>Los números van del 000 al 999.</li>
                            <li>Por cada dólar 1$ apostado se <br> gana 500 veces su monto</li>
                            <li>Debe apostar 3$ minimo.</li>
                            <li>El premio se gana con el triple del <br> número pegado en las loterías <br> Triple
                                Táchira o Triple Gana.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="carouselExampleSlidesOnly" class="carousel slide m-0" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/rifas/rifa_triple_500.png" class="rounded d-block w-100"
                                        alt="AI Dashboards">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/rifas/rifa_triple_500.png" class="rounded d-block w-100"
                                        alt="AI Dashboards">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/rifas/reglas_rrifas.png" class="rounded d-block w-100"
                                        alt="AI Dashboards">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-sm-12">
                <div class="table-container">
                    <div class="t-header">Numeros Vendidos</div>
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Ganancia</th>
                                    <th>Vendedor</th>
                                    <th>Nombre del Comprador</th>
                                    <th>Cedula del Comprador</th>
                                    <th>Metodo de Pago</th>
                                    <th>Cantidad Pagada</th>
                                    <th>Referencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rowNumero = $resultadoRifaMoto->fetch_assoc()):?>
                                <tr>
                                    <td><?php echo $rowNumero['numero'];?></td>
                                    <td><?php echo $rowNumero['monto_total'] . "$";?></td>
                                    <td><?php echo $rowNumero['nombre'];?></td>
                                    <td><?php echo $rowNumero['nombre_comprador'];?></td>
                                    <td><?php echo $rowNumero['cedula'];?></td>
                                    <td><?php echo $rowNumero['metodo'];?></td>
                                    <td><?php echo $rowNumero['cantidad_pago'];?></td>
                                    <td><?php echo $rowNumero['referencia_pm'];?></td>
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
        <!-- Row end -->
    </div>
    <!-- Main container end -->

</div>
<!-- Page content end -->

</div>
<!-- Page wrapper end -->
<?php
			//Modales de bloqueo de numeros
			include "content/modal/bloquearNumeroMoto.php"; 
			include "content/modal/bloquearNumeroDoble.php"; 
			include "content/modal/bloquearNumeroTriple.php"; 
			include "content/modal/report/generarReporteRifaTriple.php"; 
			//Script 
			include "content/inc/script.php";
			
			switch ($rol) {
				case 1:
					include "content/modal/limitarventa.php"; 
					echo '<script src="js/bloqueo/limitarventa.js"></script>';
					break;
			}
		?>

</body>

</html>