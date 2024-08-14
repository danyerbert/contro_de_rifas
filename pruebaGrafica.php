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
        <div class="row gutters">
            <div class="card">
                <div class="card-body">
                    This is some text within a card body.
                    <div class="col-lg-12">
                        <button class="btn btn-success" onclick="GenerarDatosDeGrafica()">Generar Graficas</button>
                    </div>
                    <canvas id="myChart" width="400" height="400"></canvas>
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
				include "content/modal/rifatriple.php";
				include "content/modal/rifamotoTriples.php";
				include "content/modal/acumuladoTriple.php";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

function GenerarDatosDeGrafica() {
    $.ajax({
        url: 'php/grafica/generarDataGrafico.php',
        type: 'POST'
    }).done(function(resp) {
        alert(resp);
    })
}
</script>
</body>

</html>