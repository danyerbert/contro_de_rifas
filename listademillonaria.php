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
	$sqlRifaMillonaria = "SELECT m.numero_one, m.numero_dos, m.numero_tres, m.numero_cuatro, m.numero_cinco, m.nombre_comprador, m.cedula, m.cantidad_pago, m.referencia_pm, p.metodo, v.nombre FROM registro_numero_millonaria AS m 
	INNER JOIN vendedores AS v ON v.cedula = m.vendedor 
	INNER JOIN metodo_de_pago AS p ON p.id_metodo_pago = m.metodo_pago WHERE m.fecha = '$fecha'";
	$resultadoRifaMoto = $mysqli->query($sqlRifaMillonaria);
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
                <li class="breadcrumb-item">Administrador | Lista Rifa Millonaria</li>
            </ol>
            <!-- Breadcrumb end -->

        </div>
        <!-- Page header end -->
        <div class="row gutters">
            <div class="col-xl-3 col-sm-6 col-12">
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#generarReporteMillo"> <i
                        class="icon-export"></i> Generar Reporte</a>
                <br>
                <div class="card">
                    <div class="card-body pricing-plan">
                        <h5 class="card-title">Reglas del Juego</h5>
                        <ul class="pricing-features">
                            <li>Son 1000 números a rifar (de tres cifras)</li>
                            <li>Los números van del 000 al 999.</li>
                            <li>El número posee un valor 2$.</li>
                            <li>tiene la opción de elegir 5 números.</li>
                            <li>El premio se gana con el triple del <br> número pegado en las loterías <br> Triple
                                Táchira o Triple Gana.</li>
                        </ul>
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
                                    <th>Numeros Jugados</th>
                                    <th>Vendedor</th>
                                    <th>Nombre del Comprador</th>
                                    <th>Cedula del Comprador</th>
                                    <th>Metodo de Pago</th>
                                    <th>Cantidad Pagada</th>
                                    <th>Referencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rowNumero = $resultadoRifaMoto->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $rowNumero['numero_one'] ."-". $rowNumero['numero_dos'] ."-".$rowNumero['numero_tres'] ."-".$rowNumero['numero_cuatro']."-".$rowNumero['numero_cinco'] ;?>
                                    </td>
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
				include "content/modal/report/generarReporteRifaMillo.php"; 
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