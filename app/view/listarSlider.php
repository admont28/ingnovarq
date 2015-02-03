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
			require_once ("../controller/sliderModel.php");
			require_once ("../controller/userModel.php");
			getImportsUp();
			
			$userModel = new UserModel();
			$sliderModel = new SliderModel();
			$imagenesSlider = $sliderModel->get_slider_images();

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
							<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
								<h2 style="color: #019831; text-align: center;">Lista de Imágenes en el Slider</h2>
								<br>
								<div class="table-responsive">
									<table  class="table table-bordered table-hover" style="border-radius: 5px; background-color: rgba(129,205,0,0.4);">
										<thead>
											<th>Imagen</th>
											<th>Titulo</th>
											<th>Editar</th>
											<th>Eliminar</th>
										</thead>
										<tbody>
										<?php
											foreach ($imagenesSlider as $fila) {
												?>
											<tr>
												<td>
													<div style="width: 150px; height: 150px;"><img class="img-responsive" src="<?php echo $fila['rutaImagen']; ?>"></div>
												</td> 
												<td>
													<?php echo $fila['tituloImagen']; ?>
												</td> 
												<td>
													<a href="#sinAccion" class="open" data-toggle="modal" data-target="#myModal" data-id="<?php echo $fila['idImagen'] ?>" title="Editar Imagen del Slider">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/edit.png"/></div>
													</a>															
												</td>	
												<td>
													<a href="#sinAccion" onclick="eliminarImagen(<?php echo $fila['idImagen'] ?>, '<?php echo $fila['tituloImagen'] ?>');">
														<div><img style="width: 50px;" class="img-responsive" src="../../images/administrador/delete.png" title="Eliminar Imagen del Slider"/></div>
													</a>
												</td>						
											</tr>
											<?php	
												}
											?>
										</tbody>
									</table>
									<?php
										echo get_confirm_delete_image_slider(); // imprimo el script para eliminar imagenes del slider
										echo get_script_edit_image_slider();
									?>
									
								</div>	
							</div>
						</div>
					
					</div>
					<!-- Ventana Modal para la edición de imagenes del slider -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h3 class="modal-title" id="myModalLabel">Editar Imagen del Slider</h3> 
					      </div>

					      <div class="modal-body">
					      	<div id="mensaje"></div>
					      	<div class="form-horizontal">
					      		 <input type="hidden" name="idImagen" id="idImagen" readonly="readonly">
							     <div class="form-group">
							         <label for="inputName" class="control-label col-xs-2">Titulo:</label>
							         <div class="col-xs-10">
							            <input type="name" id="tituloImagen" name="tituloImagen" class="form-control" placeholder="Titulo">
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
							            <div id="btn-editar-slider-ajax" class="btn btn-success">
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
					</div> <!-- /- Cierro la ventana Modal para la edición de imagenes del slider-->
				</div> <!-- cierro el container principal-->
				<?php
					getFooter(); 
					getImportsDown();
?>