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
	
	// CONSULTA PARA EXTRAER TODOS LOS DATOS
	$sqlRifaMoto = "SELECT m.irta, m.numero, m.cedula_comprador, m.fecha, v.nombre FROM triple_acomulado AS m 
    INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
	$resultadoRifaMoto = $mysqli->query($sqlRifaMoto);

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
                <li class="breadcrumb-item">Administrador | Lista de Rifa de Moto</li>
            </ol>
            <!-- Breadcrumb end -->
        </div>
        <!-- Page header end -->
        <div class="row gutters">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="info-stats2">
                <div class="btn-group dropright">
                            <button type="button" class="btn btn-primary">
                                <i class="icon-export"></i> Generar Reporte
                            </button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="report/excel/reporteRifaMoto.php"
                                    target="_blank">Excel</a>
                                <a class="dropdown-item" href="report/pdf/reporteRifaMoto.php" target="_blank">PDF</a>
                            </div>
                        </div>
                    <div class="sale-num">
                        
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div id="carouselExampleSlidesOnly" class="carousel slide m-0" data-ride="carousel">
										<div class="carousel-inner">
											<div class="carousel-item active">
												<img src="img/rifas/rifa_de_moto.png" class="rounded d-block w-100" alt="AI Dashboards">
											</div>
											<div class="carousel-item">
												<img src="img/rifas/rifa_de_moto.png" class="rounded d-block w-100" alt="AI Dashboards">
											</div>
											<div class="carousel-item">
												<img src="img/rifas/rifa_de_moto_2.png" class="rounded d-block w-100" alt="AI Dashboards">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
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
                                    <th>Id</th>
                                    <th>Numero</th>
                                    <th>Cedula Del Jugador</th>
                                    <th>Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rowNumero = $resultadoRifaMoto->fetch_assoc()):?>
                                <tr>
                                    <td><?php echo $rowNumero['irta'];?></td>
                                    <td><?php echo $rowNumero['numero'];?></td>
                                    <td><?php echo $rowNumero['cedula_comprador'];?></td>
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