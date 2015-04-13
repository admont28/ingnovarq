<?php 
	require_once ("imports.php");
	require_once ("header.php");
	require_once ("nav.php");
	require_once ("footer.php"); 
	require_once ("../controller/projectModel.php");
	getImportsUp();
	$proyectoModel = new ProjectModel();
	$proyectos = $proyectoModel->view_all_db_projects();
?>
	<body id="body">
		<div class="con" id="con">
			<div class="container" id="main">
				<?php 
					getHeader();
					getNav();
				?>
			</div>			
			<div class="contenido">
				<div class='row'>
					<?php 
						foreach ($proyectos as $fila) {?>					
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="panel panel-default empresa mostrar-servicios ">
							  <div class="panel-heading"><?php echo $fila['nombreProyecto'];?></div>
							  	<?php
									$imagenes = $proyectoModel->view_db_img_project($fila['idProyecto']);
								?>
							  <div class="panel-body">
							  	<div class="col-xs-12 col-sm-3 col-md-4" id="contenedor-imagenes">
							  		<?php
							  			$cont = 0;
										foreach ($imagenes as $columna) {
										if($cont == 0){
									?>									
								 	<a href="<?php echo $imagenes[0]['rutaImagen'] ?>" id="<?php echo $fila['idProyecto'] ?>" class="abrir <?php echo $fila['idProyecto'] ?>" title="<?php echo $imagenes[0]['tituloImagen'] ?>"><img src="<?php echo $imagenes[0]['rutaImagen']?>" class="img-responsive" /></a>
								 	<?php
								 		$cont++;
								 		}	
								 		else{
								 	?>	
								 		<a href="<?php echo $columna['rutaImagen'] ?>" class="<?php echo $fila['idProyecto'] ?>" title="<?php echo $columna['tituloImagen'] ?>"></a>
									<?php
											}
										}
									?>
		
									<!--<a href="<?php echo $imagenes[0]['rutaImagen'] ?>" id="<?php echo $fila['idProyecto'] ?>" class="abrir" title="<?php echo $imagenes[0]['tituloImagen'] ?>"><img src="<?php echo $imagenes[0]['rutaImagen']?>" class="img-responsive" /></a>-->
								</div>
							  	<div class="col-xs-12 col-sm-7 col-md-8">
									<p class="text-justify"><?php
										echo $fila['descripcionProyecto'];
									?></p>
							  	</div>
							  </div>
						</div>		
					</div>	
					<?php				 		
				 		}				 		
				 	?>			
				</div>	
				
				</div>            	
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>
