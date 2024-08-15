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
    $numeroTriple = $_REQUEST['acT'];
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
        <!-- Page header end -->
        <!-- Row start -->
        <div class="row gutters justify-content-center">
            <div class="card">
                <img class="card-img-top" src="img/img1.jpg" alt="AI Dashboards">
                <div class="card-body">
                    <h5 class="card-title">Acumulado Triple 500</h5>

                    <form action="" id="registroNumeroAcumuladoTriple">
                        <h5 class="modal-title fs-7">Eleccion del numero</h5>
                        <div class="form-group">
                            <label for="cedulaAcumulado" class="col-form-label">Cedula</label>
                            <input type="text" class="form-control" id="cedulaAcumulado" name="cedulaAcumulado"
                                pattern="[0-9]{8}">
                        </div>
                        <div class="form-group">
                            <label for="numeroAcumuladoTriple" class="col-form-label">Numero para acumulado</label>
                            <input type="text" class="form-control" id="numeroAcumuladoTriple"
                                name="numeroAcumuladoTriple" pattern="[0-9]{4,4}" maxlength="4">
                        </div>
                        <input type="hidden" name="vendedorTriple" id="vendedorTripleAcumulado"
                            value="<?php echo $cedula;?>">
                        <input type="hidden" name="fechaTriple" id="fechaTripleAcumulado" value="<?php 
                            $fecha = date("Y-m-d");
                            echo $fecha;
                        ?>">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Numero</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="<?php echo $numeroTriple;?>">
                            </div>
                        </div>

                        <input type="hidden" name="ParticipaAcumulado" id="ParticipaAcumulado" value="Si">
                    </form>
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
			// Modales Registrar Numeros de Rifas
				include "content/modal/rifamoto.php";
				include "content/modal/rifaDobleOportunidad.php";
				include "content/modal/rifaMillonaria.php";
				// include "content/modal/rifatriple.php";
				include "content/modal/rifamotoTriples.php";
				include "content/modal/acumuladoTriple.php";
				include "content/modal/ModalPrueba2.php";
			//Modales de bloqueo de numeros
				include "content/modal/bloquearNumeroMoto.php"; 
				include "content/modal/bloquearNumeroDoble.php"; 
				include "content/modal/bloquearNumeroTriple.php";
			// Limite de venta
			include "content/modal/limitarventa.php"; 
			//Script 
			include "content/inc/script.php";
		?>
<script src="js/funtion.js"></script>
<!-- JS para el tema de recoleccion de informacion -->
<script src="js/registro/registroNumeroMoto.js"></script>
<script src="js/registro/registroNumeroDoble.js"></script>
<script src="js/registro//registronumerotriple.js"></script>
<script src="js/registro//registronumerotriple2.js"></script>
<script src="js/registro/registroNumeroMillonaria.js"></script>
<script src="js/registro/registroNumeroTripleMoto.js"></script>
<script src="js/registro/registroAcomuladoTriple.js"></script>
<!-- JS para el bloqueo de numeros -->
<script src="js/bloqueo/bloqueoNumeroMoto.js"></script>
<script src="js/bloqueo/bloqueoNumeroDoble.js"></script>
<script src="js/bloqueo/bloqueoNumeroMillonaria.js"></script>
<script src="js/bloqueo/bloqueoNumeroTriple.js"></script>
<script src="js/bloqueo/limitarventa.js"></script>

</body>

</html>