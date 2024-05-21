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
	$sqlRifaMoto = "SELECT m.numero, s.zodiaco, v.nombre FROM registro_moto_numero AS m 
	INNER JOIN zodiaco AS s ON s.id_zodiaco= m.signo
	INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE fecha = '$fecha'";
	$resultadoRifaMoto = $mysqli->query($sqlRifaMoto);
	
	// Cantidad de numeros vendidos.
	$sqlCantidadVenta = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE fecha = '$fecha'";
	$resultadoCantidadVenta = $mysqli->query($sqlCantidadVenta);
	$rowCantidad = mysqli_fetch_assoc($resultadoCantidadVenta);
	$Cantidad = $rowCantidad['numero'];
	$MontoTotal = $Cantidad * 2;
	

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
								<div class="info-icon">
									<i class="icon-activity"></i>
								</div>
								<div class="sale-num">
									<h4>Estadisticas</h4>
									<p>Numeros Vendidos:</p>
									<h5><?php echo $Cantidad;?></h5>
									<p>Monto Total:</p>
									<h5><?php echo $MontoTotal . "$";?></h5>
									<br>
									<div class="btn-group dropright">
										<button type="button" class="btn btn-primary">
											<i class="icon-export"></i> Generar Reporte
										</button>
										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="report/excel/reporteRifaMoto.php" target="_blank">excel</a>
											<a class="dropdown-item" href="report/pdf/reporteRifaMoto.php" target="_blank" >PDF</a>
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
												<th>Signo</th>
												<th>Vendedor</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($rowNumero = $resultadoRifaMoto->fetch_assoc()):?>
                                        <tr>
                                            <td><?php echo $rowNumero['numero'];?></td>
                                            <td><?php echo $rowNumero['zodiaco'];?></td>
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
		?>

	</body>

</html>