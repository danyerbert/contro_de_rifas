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
	$sqlRifaMillonaria = "SELECT m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, v.nombre FROM registro_numero_millonaria AS m 
	INNER JOIN vendedores AS v ON v.cedula = m.vendedor WHERE m.fecha = '$fecha'";
	$resultadoRifaMoto = $mysqli->query($sqlRifaMillonaria);

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
							<li class="breadcrumb-item">Administrador | Lista Rifa Millonaria</li>
						</ol>
						<!-- Breadcrumb end -->

					</div>
					<!-- Page header end -->
					<div class="row gutters">
						<div class="col-xl-3 col-sm-6 col-12">
						<div class="btn-group dropright">
										<button type="button" class="btn btn-primary">
											<i class="icon-export"></i> Generar Reporte
										</button>
										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="report/excel/reporteRifaMillonaria.php" target="_blank">EXCEL</a>
											<a class="dropdown-item" href="#" href="report/pdf/reporteRifaMillonaria.php" target="_blank">PDF</a>
										</div>
									</div>
						</div>
					</div>
					<br>
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-sm-12">
						<div class="table-container">
								<div class="t-header">Numeros Vendidos</div>
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>Primer Numero</th>
												<th>Segundo Numero</th>
												<th>Tercer Numero</th>
												<th>Cuarto Numero</th>
												<th>Quinto Numero</th>
												<th>Vendedor</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($rowNumero = $resultadoRifaMoto->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo $rowNumero['numero_one'];?></td>
                                            <td><?php echo $rowNumero['numero_dos'];?></td>
                                            <td><?php echo $rowNumero['numero_tres'];?></td>
                                            <td><?php echo $rowNumero['numero_cuatro'];?></td>
                                            <td><?php echo $rowNumero['numero_cinco'];?></td>
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