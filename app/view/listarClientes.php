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
	require_once ("../controller/clientModel.php");
	require_once ("../controller/userModel.php");
	require_once ("../controller/imagenModel.php");
	getImportsUp();
	$userModel = new UserModel();
	$clienteModel = new ClientModel();
	$imagenModel = new imagenModel();
	$clientes = $clienteModel->view_all_db_clients();
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
					<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
						<h2 class="text-center">Lista de clientes</h2>
						<br>
						<div class="table-responsive">
							<table  class="table table-bordered table-hover" style="border-radius: 5px; background-color: rgba(129,205,0,0.4);">
								<thead>
									<th>Imagen</th>
									<th>Nombre</th>
									<th>Creado Por</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</thead>
								<tbody>
								<?php
									foreach ($clientes as $fila) {
										?>
									<tr>
										<td>
											<div style="width: 150px; height: 150px;"> <?php $imagenCliente = $imagenModel->view_image_db_client($fila['idCliente']); ?>
												<img class="img-responsive" src="<?php echo $imagenCliente['rutaImagen']; ?>" alt="No posee imagen" title="Imagen representativa del cliente">
											</div> 
										</td>
										<td>
											<?php echo $fila['nombreCliente']; ?>
										</td> 
										<td>
											<?php 
												$usuario = $userModel->view_id_user_db_user($fila['Usuario_idUsuario']);
												echo $usuario['nombreUsuario'];
											?>
										</td>
										<td>
											<a href="#sinAccion" class="open" data-toggle="modal" data-target="#edit-client" data-id="<?php echo $fila['idCliente'] ?>" title="Editar cliente">
												<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/edit.png"/></div>
											</a>	
										</td>	
										<td>
											<a href="#sinAccion" onclick="eliminarCliente(<?php echo $fila['idCliente'] ?>, '<?php echo htmlspecialchars($fila['nombreCliente'], ENT_NOQUOTES); ?>');">
												<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/delete.png" title="Eliminar cliente"/></div>
											</a>
										</td>						
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
							<?php	
								echo get_confirm_delete_client(); // imprimo el script para eliminar clientes
								echo get_script_edit_client(); // imprimo el script para editar clientes
							?>
							<div id="mensaje"></div>
						</div>	
					</div>
				</div>
			</div>
			<!-- Ventana Modal para la edición de clientes -->
			<div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">

			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h3 class="modal-title" id="myModalLabel">Editar Cliente</h3> 
			      </div>

			      <div class="modal-body">
			      	<div id="mensaje"></div>
			      	<div class="form-horizontal">
			      		 <input type="hidden" name="idCliente" id="idCliente" readonly="readonly">
					     <div class="form-group">
					         <label for="nombreCliente" class="control-label col-xs-2">Nombre:</label>
					         <div class="col-xs-10">
					            <input type="name" id="nombreCliente" name="nombreCliente" class="form-control" placeholder="Titulo">
					         </div>
					     </div>
					     <div class="form-group">
					     	 <label class="control-label col-xs-2">Imagen:</label>
					         <div class="col-xs-10" id="cargador">
					            <div id="fileuploader">Cargar imagen</div>
					            <p id="nota" class="col-xs-12 text-info">Nota: Si no selecciona ninguna imagen y guarda los cambios, se conservará la imagen actual.
					            </p>
					         </div>
					     </div>    
					     <div class="form-group">
					        <div class="col-xs-offset-2 col-xs-8">
					            <div id="btn-editar-cliente-ajax" class="btn btn-success">
					            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Guardar Cambios
					            </div> 
					        </div>
					     </div>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" id="cerrar" class="btn btn-default" data-dismiss="modal">Cerrar</button>   
			      </div>
			    </div>
			  </div>
			</div> <!-- /- Cierro la ventana Modal para la edición de clientes-->
		</div> <!-- cierro el container principal-->
		<?php
			getFooter(); 
			getImportsDown();
?>