<?php

require "config/conexion.php";

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
}

date_default_timezone_set('America/Caracas');
// GUARDAMOS EL VALOR DE LA SESSION EN UNA VARIABLE PARA SU USO
$cedula = $_SESSION['cedula'];
// Traer los datos de los vendedores

$sqlVendedores = "SELECT cedula, nombre, telefono, correo FROM vendedores";
$respuestaVendedores = $mysqli->query($sqlVendedores);

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
                <li class="breadcrumb-item">Administrador | Lista de vendedores</li>
            </ol>
            <!-- Breadcrumb end -->

        </div>
        <!-- Page header end -->
        <div class="row gutters">
            <div class="col-xl-3 col-sm-6 col-12">
                <?php 
								switch ($rol) {
									case 1:
										echo '
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearVendedor">
										Registrar Vendedor
										</button>
										';
										break;
								}
							?>
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
                                    <th>Nombre</th>
                                    <th>Cedula</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            while ($row = $respuestaVendedores->fetch_assoc()) :
                                                
                                            ?>
                                <tr>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['cedula']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td><?php echo $row['correo']; ?></td>
                                    <td>
                                        <div class="btn-group dropright">
                                            <button type="button" class="btn btn-primary">
                                                Opciones
                                            </button>
                                            <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <?php 
																switch ($rol) {
																	case 1:
																			echo '
																			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#crearUsuario'.$row['cedula'].'">Generar Usuario</a>
																			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#VerVentas'.$row['cedula'].'">Ver ventas</a>
																			
																			';
																		break;
																	case 3:
																			echo '
																			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#VerVentas'.$row['cedula'].'">Ver ventas</a>
																			';
																		break;
																}
															?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                                include "content/modal/crearusuario.php";
                                                include "content/modal/verventas.php";

                                                endwhile;
                                            ?>
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
				include "content/modal/bloquearNumeroMillonaria.php"; 
				include "content/modal/bloquearNumeroTriple.php"; 
                // Modales de gestion de vendedores.
                include "content/modal/crearvendedor.php";
			//Script 
			include "content/inc/script.php";
			switch ($rol) {
				case 1:
					include "content/modal/limitarventa.php"; 
					echo '<script src="js/bloqueo/limitarventa.js"></script>';
					break;
			}
		?>
<script src="js/funtion.js"></script>
<script src="js/registro/registroVendedor.js"></script>
<script src="js/registro/registroUsuario.js"></script>
<!-- JS para el bloqueo de numeros -->
<script src="js/bloqueo/bloqueoNumeroMoto.js"></script>
<script src="js/bloqueo/bloqueoNumeroDoble.js"></script>
<script src="js/bloqueo/bloqueoNumeroMillonaria.js"></script>
<script src="js/bloqueo/bloqueoNumeroTriple.js"></script>
<script src="js/bloqueo/limitarventa.js"></script>
</body>

</html>