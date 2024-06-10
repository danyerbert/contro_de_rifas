<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
			</div>
		</div>
		<!-- Loading ends -->

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">
				<!-- User profile start -->
				<div class="sidebar-user-details">
					<div class="user-profile">
						<img src="img/LOGO.jpeg" class="profile-thumb" alt="Admin Dashboards">
                        <!-- REALIZAR VALIDACION PARA GENERAR EL USUARIO -->
						<?php 
							$usuario = $_SESSION['usuario'];

							echo '
							<h6 class="profile-name">'.$usuario.'</h6>
							';
						?>
						<ul class="profile-actions">
							<li>
								<a href="logout.php">
									<i class="icon-exit_to_app"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- User profile end -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<?php 
								$rol = $_SESSION['rol'];
								switch ($rol) {
									case 1:
										echo '
										<li class="active">
											<a href="administrador.php" class="current-page">
												<i class="icon-home2"></i>
												<span class="menu-text">Inicio</span>
											</a>
										</li>
										<li>
											<a href="listadevendedores.php">
												<i class="icon-line-graph"></i>
												<span class="menu-text">Lista de Vendedores</span>
											</a>
										</li>
										<li class="sidebar-dropdown">
											<a href="#">
												<i class="icon-calendar1"></i>
												<span class="menu-text">Lista de Rifas</span>
											</a>
											<div class="sidebar-submenu">
												<ul>
													<li>
														<a href="listademoto.php">Rifa de Moto</a>
													</li>
													<li>
														<a href="listadedoble.php">Rifa Royal</a>
													</li>
													<li>
														<a href="listadetriple.php">Rifa Triple 500</a>
													</li>
													<li>
														<a href="listademillonaria.php">Rifa Millonaria</a>
													</li>
													<li>
														<a href="listamototriple.php">Rifa Moto Triples</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="sidebar-dropdown">
											<a href="#">
												<i class="icon-layers2"></i>
												<span class="menu-text">Bloquear Numeros</span>
											</a>
											<div class="sidebar-submenu">
												<ul>
													<li>
														<a href="#" data-toggle="modal" data-target="#BloquearNumeroMoto">Rifa de Moto</a>
													</li>
													<li>
														<a href="#" data-toggle="modal" data-target="#BloquearNumeroDoble">Doble Oportunidad</a>
													</li>
													<li>
														<a href="#" data-toggle="modal" data-target="#BloquearNumeroTriple">Triple 500</a>
													</li>
												</ul>
											</div>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#limitarVenta">
												<i class="icon-line-graph"></i>
												<span class="menu-text">Limitar Venta</span>
											</a>
										</li>
										';
										break;
									case 2:
										echo '
										<li class="active">
											<a href="vendedor.php" class="current-page">
												<i class="icon-home2"></i>
												<span class="menu-text">Inicio</span>
											</a>
										</li>
										';
										break;
									case 3:
										echo '
										<li class="active">
											<a href="administrador.php" class="current-page">
												<i class="icon-home2"></i>
												<span class="menu-text">Inicio</span>
											</a>
										</li>
										<li>
											<a href="listadevendedores.php">
												<i class="icon-line-graph"></i>
												<span class="menu-text">Lista de Vendedores</span>
											</a>
										</li>
										<li class="sidebar-dropdown">
											<a href="#">
												<i class="icon-calendar1"></i>
												<span class="menu-text">Lista de Rifas</span>
											</a>
											<div class="sidebar-submenu">
												<ul>
													<li>
														<a href="listademoto.php">Rifa de Moto</a>
													</li>
													<li>
														<a href="listadedoble.php">Rifa Doble Oportunidad</a>
													</li>
													<li>
														<a href="listadetriple.php">Rifa Triple 500</a>
													</li>
													<li>
														<a href="listademillonaria.php">Rifa Millonaria</a>
													</li>
													<li>
														<a href="listamototriple.php">Rifa Moto Triples</a>
													</li>
												</ul>
											</div>
										</li>
										';
										break;
								}
							?>
                            
							
							
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->

			</nav>
			<!-- Sidebar wrapper end -->