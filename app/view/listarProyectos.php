<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
		header('location: error');
	}
			include_once ("imports.php");
			include_once ("header.php");
			include_once ("nav.php");
			include_once ("footer.php"); 
			require_once ("../controller/notificaciones.php");
			require_once ("../controller/projectModel.php");
			require_once ("../controller/userModel.php");
			getImportsUp();
			
			$userModel = new UserModel();
			$proyectoModel = new ProjectModel();
			$proyectos = $proyectoModel->view_all_db_projects();

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
								<h2 style="color: #019831; text-align: center;">Lista de Proyectos</h2>
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
											foreach ($proyectos as $fila) {
												?>
											<tr>
												<td>
													<?php echo $fila['nombreProyecto']; ?>
												</td> 
												<td>
													<?php echo $fila['descripcionProyecto']; ?>
												</td> 
												<td>
													<?php 
														$usuario = $userModel->view_id_user_db_user($fila['Usuario_idUsuario']);
														echo $usuario['nombreUsuario'];
													?>
												</td>
												<td>
													<?php echo $fila['fechaCreacionProyecto']; ?>
												</td>
												<td>
													<a href="#sinAccion" class="open" data-toggle="modal" data-target="#editProject" data-id="<?php echo $fila['idProyecto'] ?>" title="Editar proyecto">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/edit.png"/></div>
													</a>	
												</td>	
												<td>
													<a href="#sinAccion" onclick="eliminarProyecto(<?php echo $fila['idProyecto'] ?>, '<?php echo $fila['nombreProyecto'] ?>');">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/delete.png" title="Eliminar proyecto"/></div>
													</a>
												</td>						
											</tr>
											<?php	
												}
											?>
										</tbody>
									</table>
									<?php
										echo get_confirm_delete_project(); // imprimo el script para eliminar proyectos
										echo get_script_edit_project();
									?>
									<div id="mensaje"></div>
								</div>	
							</div>
						</div>
					</div>
						<!-- Ventana Modal para la misión empresarial -->
					<div class="modal fade" id="editProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h3 class="modal-title" id="myModalLabel">Editar Proyecto</h3> 
					      </div>

					      <div class="modal-body">
					    	<div id="mensaje"></div>
					      	<form class="form-horizontal" id="form-editar-proyecto-ajax" method="POST">
					      		 <input type="hidden" name="idProyecto" id="idProyecto" readonly="readonly">
							     <div class="form-group">
							         <label for="nombreProyecto" class="control-label col-xs-3">Nombre:</label>
							         <div class="col-xs-9">
							            <input type="text" id="nombreProyecto" name="nombreProyecto" class="form-control"/>
							         	<div class="col-xs-9 error-text" id="e_nombre_proyecto"></div>
							         </div>
							     </div>
								  <div class="form-group">
							         <label for="descripcionProyecto" class="control-label col-xs-3">Descripción:</label>
							         <div class="col-xs-9">
							            <textarea id="descripcionProyecto" name="descripcionProyecto" class="form-control" rows="10"></textarea>
							         	<div class="col-xs-10 error-text" id="e_descripcion_proyecto"></div>
							         </div>
							     </div>
							     <div class="form-group">
								        <label for="inputName" class="control-label col-xs-3">Fecha:</label>
								         <div class="col-xs-9">
								         	<input type="text" id="fecha" class="form-control" placeholder="aaaa-mm-dd" readonly="readonly" data-date-language="es">
								         	<div class="col-xs-10 error-text" id="e_fecha_proyecto"></div>
								         </div>
								  </div>	
							     <div class="form-group">
							        <div class="col-xs-offset-2 col-xs-9">							         
							         	<button type="submit" id="btn-editar-projecto-ajax" class="btn btn-success">
							            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Guardar Cambios
							            </button>
							        </div>
							     </div>
							</form>   	 
					      </div>

					      <div class="modal-footer">
					        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>   
					      </div>
					    </div>
					  </div>
					</div> <!-- /- Cierro la ventana Modal para la misión empresarial-->
				</div> <!-- cierro el container principal-->
				<?php
					getFooter(); 
					getImportsDown();
?>