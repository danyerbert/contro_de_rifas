<?php
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
							<li class="breadcrumb-item">Vendedor Home</li>
						</ol>
					</div>
					<!-- Page header end -->
					<!-- Row start -->
					<div class="row gutters">
						<div class="col-lg-4 col-sm-6">
							<div class="pricing-plan">
								<div class="pricing-header">
									<h4 class="pricing-title">Rifa de Moto</h4>
								</div>
								<ul class="pricing-features">
									<li>5GB Linux Web Space</li>
									<li>5 MySQL Databases</li>
									<li>500 Emails</li>
									<li>250Gb mothly Transfer</li>
									<li class="text-muted"><del>24/7 Tech Support</del></li>
									<li class="text-muted"><del>Daily Backups</del></li>
								</ul>
								<div class="pricing-footer">
									<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rifaMoto">Boleto</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="pricing-plan">
								<div class="pricing-header secondary">
									<h4 class="pricing-title">Rifa Doble Oportunidad</h4>
								</div>
								<ul class="pricing-features">
									<li>10GB Linux Web Space</li>
									<li>10 MySQL Databases</li>
									<li>1000 Emails</li>
									<li>750Gb mothly Transfer</li>
									<li>24/7 Tech Support</li>
									<li class="text-muted"><del>Daily Backups</del></li>
								</ul>
								<div class="pricing-footer">
									<a href="#" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#rifaDobleOportunidad">Boleto</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
							<div class="pricing-plan">
								<div class="pricing-header">
									<h4 class="pricing-title">Rifa Millonaria</h4>
								</div>
								<ul class="pricing-features">
									<li>50GB Linux Web Space</li>
									<li>100 MySQL Databases</li>
									<li>Unlimited Emails</li>
									<li>1000Gb mothly Transfer</li>
									<li>24/7 Tech Support</li>
									<li>Daily Backups</li>
								</ul>
								<div class="pricing-footer">
									<a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rifaMillonaria">Boleto</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12">
							<div class="pricing-plan">
								<div class="pricing-header secondary">
									<h4 class="pricing-title">Rifa Triple 500</h4>
								</div>
								<ul class="pricing-features">
									<li>50GB Linux Web Space</li>
									<li>100 MySQL Databases</li>
									<li>Unlimited Emails</li>
									<li>1000Gb mothly Transfer</li>
									<li>24/7 Tech Support</li>
									<li>Daily Backups</li>
								</ul>
								<div class="pricing-footer">
									<a href="#" class="btn btn-secondary btn-lg" data-toggle="modal" data-target="#rifaTriple">Boleto</a>
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
			// Modales Registrar Numeros de Rifas
				include "content/modal/rifamoto.php";
				include "content/modal/rifaDobleOportunidad.php";
				include "content/modal/rifaMillonaria.php";
				include "content/modal/rifatriple.php";
			//Script 
			include "content/inc/script.php";
		?>
		<script src="js/funtion.js"></script>
		<!-- JS para el tema de recoleccion de informacion -->
		<script src="js/registro/registroNumeroMoto.js"></script>
		<script src="js/registro/registroNumeroDoble.js"></script>
		<script src="js/registro//registronumerotriple.js"></script>
		<script src="js/registro/registroNumeroMillonaria.js"></script>
	</body>

</html>