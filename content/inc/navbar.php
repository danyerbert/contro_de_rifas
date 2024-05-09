<!-- Header start -->
<header class="header">
						<div class="toggle-btns">
							<a id="toggle-sidebar" href="#">
								<i class="icon-list"></i>
							</a>
							<a id="pin-sidebar" href="#">
								<i class="icon-list"></i>
							</a>
						</div>
						<div class="header-items">
							<!-- Header actions start -->
							<ul class="header-actions">
								<li class="dropdown selected">
									<a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
										<i class="icon-user1"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<div class="header-user-profile">
												<?php
													$usuario = $_SESSION['usuario'];

													echo '
														<h5>'.$usuario.'</h5>
													';
												
												?>
											</div>
											<a href="logout.php"><i class="icon-log-out1"></i> Salir</a>
										</div>
									</div>
								</li>
                                <!-- GESTIONAR UN METODO PARA EL TOTAL DEL DIA -->
								<!-- <li class="balance">
									<h6>Balance</h6>
									<h3>$25,700</h3>
								</li> -->
							</ul>
							<!-- Header actions end -->
						</div>
					</header>
					<!-- Header end -->