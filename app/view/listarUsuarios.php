<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
		header('location: error');
	}
			include_once ("imports.php");
			include_once ("header.php");
			include_once ("nav.php");
			include_once ("footer.php"); 

			getImportsUp();
			require_once "../controller/userModel.php";
			$userModel = new UserModel();
			$usuarios = $userModel->view_all_db_user();
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
							<div class="col-xs-12 col-sm-8 col-md-8">
								<table  style="border-radius: 5px; border: 1px solid #222; width: 100%;">
									<thead>
										<th>Cédula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</thead>
									<?php
										foreach ($variable as $key => $value) {
											# code...
										}
									for ($i=0; $i <sizeof($usuarios) ; $i++)
									{ 
									?>
										<tr>
											
											<td >
												<?php echo "".$usuarios[$i]['idusuario']; ?>
											</td> 
											<td >
												<?php echo "".$usuarios[$i]['nombre']; ?>
											</td> 
											<td >
												<?php echo "".$usuarios[$i]['apellido']; ?>
											</td>
											<?php 
												if($_SESSION['idusuario'] == $usuarios[$i]['idusuario'])
												{
											?>
											<td>
												<a href="<?php echo "editarUsuario?idusuario=".$usuarios[$i]['idusuario']; ?>">
													<div class="imagenAccion"><img style="width: 50px;" src="../../imagenes/administrador/editar.png" /></div>
												</a>
											</td>
											<td >
												<a href="#" onclick="validarAccion<?php echo $i; ?>();"><div class="imagenAccion"><img style="width: 50px;" src="../../imagenes/administrador/eliminar.png" /></div></a>
												<script>
													function validarAccion<?php echo $i; ?>()
													{											
														if(confirm("Estas Seguro de eliminar este Usuario"))
														{
															document.location.href= '../controlador/eliminarUsuario?idusuario='+'<?php echo $usuarios[$i]['idusuario']; ?>';										
														}
														else
														{
															document.location.href= 'listarUsuarios';
														}										
													} 
												</script>
											</td>
											<?php 
												}
												else {
													?>
											<td>-----</td>
											<td>-----</td>
											<?php
												}
											?>								
										</tr>
									<?php	
									}
									?>
									
								</table>	
							</div>
						</div>
					</div>
				</div>
				<?php
					getFooter(); 
					getImportsDown();
?>