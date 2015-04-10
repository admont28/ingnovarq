<?php 
	require_once ("imports.php");
	require_once ("header.php");
	require_once ("nav.php");
	require_once ("footer.php"); 
	require_once ("../controller/serviceModel.php");
	getImportsUp();
	$servicioModel = new ServiceModel();
	$servicios = $servicioModel->view_all_db_services();
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
						foreach ($servicios as $fila) {?>					
					<div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1">
						<div class="panel panel-default empresa mostrar-servicios ">
							  <div class="panel-heading"><?php echo $fila['nombreServicio'];?></div>
							  	<?php
									$imagenes = $servicioModel->view_db_img_service($fila['idServicio']);
								?>
							  <div class="panel-body">
							  	<div class="col-xs-12 col-sm-3 col-md-4">
							  		<?php
							  			$cont = 0;
										foreach ($imagenes as $columna) {
										if($cont == 0){
									?>									
								 	<a href="<?php echo $columna['rutaImagen'] ?>" class="info group4" title="<?php echo $columna['tituloImagen'] ?>"><img src="<?php echo $imagenes[0]['rutaImagen']?>" class="img-responsive" /></a>
								 	<?php
								 		$cont++;
								 		}	
								 		else{
								 	?>	
								 		<a href="<?php echo $columna['rutaImagen'] ?>" class="group4" title="<?php echo $columna['tituloImagen'] ?>"></a>
									<?php
											}
										}
									?>							 	
								</div>
							  	<div class="col-xs-12 col-sm-7 col-md-8">
									<p class="text-justify"><?php
										echo $fila['descripcionServicio'];
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
		<?php
			getFooter(); 
			getImportsDown();
		?>