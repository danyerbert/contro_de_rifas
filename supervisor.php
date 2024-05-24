<?php
	require "config/conexion.php";

	session_start();
	if (!isset($_SESSION['id_usuario'])) {
		header("Location: index.php");
	}else{
		if ($_SESSION['rol'] != 3) {
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
							<li class="breadcrumb-item">Administrador | Inicio</li>
						</ol>
					</div>
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-lg-4 col-sm-6">
							<div class="pricing-plan">
								<div class="pricing-header">
									<h4 class="pricing-title">Rifa de Moto</h4>
								</div>
								<div class="pricing-footer">
									<div class="btn-group dropright">
										<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											Ir
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="listamototriple.php">1$</a>
											<a class="dropdown-item" href="listademoto.php" data-toggle="modal" data-target="#rifaMoto">3$</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="pricing-plan">
								<div class="pricing-header secondary">
									<h4 class="pricing-title">Rifa Doble Oportunidad</h4>
								</div>
								<div class="pricing-footer">
									<a href="listadedoble.php" class="btn btn-secondary btn-lg" >Ir</a>
									
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="pricing-plan">
								<div class="pricing-header">
									<h4 class="pricing-title">Rifa Millonaria</h4>
								</div>
								<div class="pricing-footer">
									<a href="listademillonaria.php" class="btn btn-primary btn-lg">Ir</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12">
							<div class="pricing-plan">
								<div class="pricing-header secondary">
									<h4 class="pricing-title">Rifa Triple 500</h4>
								</div>
								<div class="pricing-footer">
									<a href="listadetriple.php" class="btn btn-secondary btn-lg">Ir</a>
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
			//Script 
			include "content/inc/script.php";
		?>
	</body>

</html>