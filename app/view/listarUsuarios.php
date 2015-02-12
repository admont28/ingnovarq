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
	require_once ("../controller/userModel.php");
	getImportsUp();
	$userModel = new UserModel();
	$usuarios = $userModel->view_all_db_users();
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
						<h2 style="color: #019831; text-align: center;">Lista de usuarios</h2>
						<br>
						<div class="table-responsive">
							<table  class="table table-bordered table-hover" style="border-radius: 5px; background-color: rgba(129,205,0,0.4);">
								<thead>
									<th>Cédula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Súper Administrador</th>
									<th>Fecha de Creación</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</thead>
								<tbody>
								<?php
									foreach ($usuarios as $fila) {
										?>
									<tr>
										<td >
											<?php echo $fila['cedulaUsuario']; ?>
										</td> 
										<td >
											<?php echo $fila['nombreUsuario']; ?>
										</td> 
										<td >
											<?php echo $fila['apellidoUsuario']; ?>
										</td>
										<td >
											<?php 	if($fila['superAdminUsuario'] == 1)
														echo "Si";
													else
														echo "No"; ?>
										</td>
										<td >
											<?php echo $fila['fechaCreacionUsuario']; ?>
										</td>
										<?php 
											if($_SESSION['superAdminUsuario'] == 1){
												if($fila['cedulaUsuario'] == $_SESSION['idUsuario'] || $fila['superAdminUsuario'] == 0){
											?>
												<td>
													<a href="#sinAccion" class="open" data-toggle="modal" data-target="#myModal" data-id="<?php echo $fila['cedulaUsuario'] ?>" title="Editar usuario">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/edit.png"/></div>
													</a>															
												</td>
												<?php 
												} else{
												?>
												<td>
												<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/cancel.png" title="No puede efectuar acciones"/></div>
												</td>
												<?php } ?>
												<td >
													<a href="#sinAccion" onclick="eliminarUsuario(<?php echo $fila['cedulaUsuario'] ?>);">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/delete.png" title="Eliminar usuario"/></div>
													</a>
													
												</td>
											<?php
											}
											else{
												?>
												<td>-----</td>
												<td>-----</td>
												<?php
											}
											?>						
									</tr>
								<?php	
								}
								echo get_confirm_delete_user(); // imprimo el script para eliminar usuarios
								echo get_script_edit_user(); // imprimo el script para editar los usuarios
								?>
								</tbody>
							</table>
							<div id="mensaje"></div>
						</div>	
					</div>
				</div>
			</div>
			<!-- Ventana Modal para editar los usuarios -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" id="myModalLabel">Editar Usuario</h3> 
			      </div>

			      <div class="modal-body">
			      	<div id="mensaje"></div>
			      	<form class="form-horizontal" id="form-editar-usuario-ajax" method="post">
			      		<input type="hidden" name="idUsuario" id="idUsuario" readonly="readonly">
					     <div class="form-group">
					         <label for="inputName" class="control-label col-xs-3">Nombre:</label>
					         <div class="col-xs-9">
					            <input type="name" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
					         	<div class="col-xs-9 error-text" id="e_nombre"></div>
					         </div>
					     </div>
						     <div class="form-group">
					        <label for="inputName" class="control-label col-xs-3">Apellido:</label>
					        <div class="col-xs-9">
					            <input type="name" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="">
					        	<div class="col-xs-9 error-text" id="e_apellido"></div> 
					        </div>
					     </div>
					     <div class="form-group">
					        <label for="inputName" class="control-label col-xs-3">Cédula:</label>
					        <div class="col-xs-9">
					            <input type="text" id="cedula" name="cedula" class="form-control" placeholder="Cédula" >
					        	<div class="col-xs-9 error-text" id="e_cedula"></div>
					        </div>
					     </div>
					     <div class="form-group">
					        <label for="inputPassword" class="control-label col-xs-3">Contraseña:</label>
					        <div class="col-xs-9">
					            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
					        	<div class="col-xs-9 error-text" id="e_password"></div>
					        	<p class="col-xs-12 text-info">Nota: dejar intacto para conservar la misma contraseña</p>
					        </div>
					     </div>
					     <div class="form-group">
					        <label for="inputPassword" class="control-label col-xs-3">Repetir Contraseña:</label>
					        <div class="col-xs-9">
					            <input type="password" id="repetir_password" name="repetir_password" class="form-control" placeholder="Repetir Contraseña" >
					        	<div class="col-xs-9 error-text" id="e_repetir_password"></div>
					        	<p class="col-xs-12 text-info">Nota: dejar intacto para conservar la misma contraseña</p>
					        </div>
					     </div>
					     <div class="form-group">
					     	<label for="tipoUsuario" class="control-label col-xs-3">Tipo de usuario</label>
					     	<div class="col-xs-9">
						     	<select class="form-control" id="tipoUsuario" name="tipoUsuario"> 
									<option value="0">Administrador</option>
									<option value="1">Súper Administrador</option>
								</select>
							</div>
					     </div>
					     <div class="form-group">
					        <div class="col-xs-offset-3 col-xs-6">
					         	<input type="hidden" name="ajax">
					            <button type="submit" id="btn-editar-usuario-ajax" class="btn btn-success">Guardar Cambios</button> 
					        </div>
					     </div>
					</form> 
			      </div>

			      <div class="modal-footer">
			        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>   
			      </div>
			    </div>
			  </div>
			</div> <!-- /- Cierro la ventana Modal de editar usuario-->
		</div> <!-- cierro el container principal-->
		<?php
			getFooter(); 
			getImportsDown();
?>