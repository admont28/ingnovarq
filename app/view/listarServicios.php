<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
		header('location: error');
	}
			include_once ("imports.php");
			include_once ("header.php");
			include_once ("nav.php");
			include_once ("footer.php"); 
			require_once ("../controller/notificaciones.php");
			require_once ("../controller/serviceModel.php");
			require_once ("../controller/userModel.php");
			getImportsUp();
			
			$userModel = new UserModel();
			$serviceModel = new ServiceModel();
			$servicios = $serviceModel->view_all_db_services();

			?>
			<body id="body">
				<div class="con" id="con">
					<div class="container" id="main">
						<?php 
							getHeader();
							if($_SESSION['superAdminUsuario'] == 1){
								getNavSuperAdmin();
							}
							else
								getNavAdmin();
						?>
					</div>
					<div class="contenido">
						<div class="row">
							<br>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<h2 style="color: #019831; text-align: center;">Lista de servicios</h2>
								<br>
								<div class="table-responsive">
									<table  class="table table-bordered table-hover" style="border-radius: 5px; background-color: rgba(129,205,0,0.4);">
										<thead>
											<th>Nombre</th>
											<th>Descripción</th>
											<th>Creado Por</th>
											<th>Fecha de Creación</th>
											<th>Editar</th>
											<th>Eliminar</th>
										</thead>
										<tbody>
										<?php
											foreach ($servicios as $fila) {
												?>
											<tr>
												<td>
													<?php echo $fila['nombreServicio']; ?>
												</td> 
												<td>
													<?php echo $fila['descripcionServicio']; ?>
												</td> 
												<td>
													<?php 
														$usuario = $userModel->view_id_user_db_user($fila['Usuario_idUsuario']);
														echo $usuario['nombreUsuario'];
													?>
												</td>
												<td>
													<?php echo $fila['fechaCreacionServicio']; ?>
												</td>
												<td>
													<a href="#sinAccion" class="open" data-toggle="modal" data-target="#myModal" data-id="" title="Editar servicio">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/edit.png"/></div>
													</a>	
												</td>	
												<td>
													<a href="#sinAccion" onclick="eliminarServicio(<?php echo $fila['idServicio'] ?>, '<?php echo $fila['nombreServicio'] ?>');">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/delete.png" title="Eliminar servicio"/></div>
													</a>
												</td>						
											</tr>
											<?php	
												}
											?>
										</tbody>
									</table>
									<?php
										echo get_confirm_delete_service(); // imprimo el script para eliminar servicios
									?>
									<div id="mensaje"></div>
								</div>	
							</div>
						</div>
					</div>
				</div> <!-- cierro el container principal-->
				<?php
					getFooter(); 
					getImportsDown();
?>