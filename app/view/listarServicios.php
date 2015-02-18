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
					if($_SESSION['superAdminUsuario'] == 1)
						getNavSuperAdmin();
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
									<th>Agregar Imágenes</th>
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
											<a href="#sinAccion" class="open2" data-toggle="modal" data-target="#addImageService" data-id="<?php echo $fila['idServicio'] ?>" title="Agregar imágenes al servicio">
												<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/slider.png"/></div>
											</a>	
										</td>
										<td>
											<a href="#sinAccion" class="open" data-toggle="modal" data-target="#editService" data-id="<?php echo $fila['idServicio'] ?>" title="Editar servicio">
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
								echo get_script_edit_service(); // imprimo el script para editar servicios
							?>
							<div id="mensaje"></div>
						</div>	
					</div>
				</div>
			</div>
			<!-- Ventana Modal para la edidicón de servicios -->
			<div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" id="myModalLabel">Editar Proyecto</h3> 
			      </div>

			      <div class="modal-body">
			    	<div id="mensaje"></div>
			      	<form class="form-horizontal" id="form-editar-proyecto-ajax" method="POST">
			      		 <input type="hidden" name="idServicio" id="idServicio" readonly="readonly">
					     <div class="form-group">
					         <label for="nombreServicio" class="control-label col-md-2 col-xs-4">Nombre:</label>
					         <div class="col-md-10 col-xs-8">
					            <input type="text" id="nombreServicio" name="nombreServicio" class="form-control"/>
					         	<div class="col-xs-9 error-text" id="e_nombre_servicio"></div>
					         </div>
					     </div>
						  <div class="form-group">
					         <label for="descripcionServicio" class="control-label col-md-2 col-xs-4">Descripción:</label>
					         <div class="col-md-10 col-xs-8">
					            <textarea id="descripcionServicio" name="descripcionServicio" class="form-control" rows="10"></textarea>
					         	<div class="col-xs-10 error-text" id="e_descripcion_servicio"></div>
					         </div>
					     </div>
					     <div class="form-group">
						        <label for="inputName" class="control-label col-md-2 col-xs-4">Fecha:</label>
						         <div class="col-md-10 col-xs-8">
						         	<input type="text" id="fecha" class="form-control" placeholder="aaaa-mm-dd" readonly="readonly" data-date-language="es">
						         	<div class="col-xs-10 error-text" id="e_fecha_servicio"></div>
						         </div>
						  </div>	
					     <div class="form-group">
					        <div class="col-md-offset-2 col-md-10 col-xs-offset-4 col-xs-9">							         
					         	<button type="submit" id="btn-editar-servicio-ajax" class="btn btn-success">
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
			</div> <!-- /- Cierro la ventana para la edición de servicios-->

			<!-- Ventana Modal para agregar imágenes a servicios -->
			<div class="modal fade" id="addImageService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" id="myModalLabel">Agregar imágenes a servicio</h3> 
			      </div>

			      <div class="modal-body">
			      	<form class="form-horizontal" id="form-editar-proyecto-ajax" method="POST">
			      		<input type="hidden" name="idServicio2" id="idServicio2" readonly="readonly">
			      		<p class="col-xs-12 text-danger">Nota: los cambios que realicen en esta sección son guardados automáticamente, por favor tener cuidado con dichos cambios.</p>
					    <label class="control-label col-md-2 col-xs-3">Imágenes:</label>
			         	<div class="col-md-10 col-xs-9" id="cargador">
			            	<div id="cargarImagenesServicio">Cargar imágenes</div>
			            	<div class="col-xs-9 error-text" id="e_imagen_servicio"></div> 
			         	</div>
					    <div class="form-group">
					        <div class="col-md-offset-2 col-md-10 col-xs-offset-4 col-xs-9">							         
					         	<!--<button type="submit" id="btn-agregar-imagenes-servicio-ajax" class="btn btn-success">
					            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Guardar Cambios
					            </button> -->
					            <label>
					            	<input type="checkbox" id="previsualizacion"> Ocultar Previsualización
					            </label>
					        </div>
					    </div>
					</form>   	 
			      </div>

			      <div class="modal-footer">
			        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>   
			      </div>
			    </div>
			  </div>
			</div> <!-- /- Cierro la ventana modal agregar imágenes a servicios-->
		</div> <!-- cierro el container principal-->
		<?php
			getFooter(); 
			getImportsDown();
?>