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
				<div class="row">
					<?php 
						foreach ($proyectos as $fila) {?>
							<div class="view view-third col-xs-12 col-sm-4 col-md-4">
						<?php
							$imagenes = $proyectoModel->view_db_img_project($fila['idProyecto']);
						?>
								<img src="<?php echo $imagenes[0]['rutaImagen']?>" class="img-responsive" />
								<div class="mask">
								<h2><?php echo $fila['nombreProyecto']?></h2>
								<p><?php echo $fila['descripcionProyecto']?></p>
						<?php
							$contador = 1;
							foreach ($imagenes as $columna) {
								if($contador == 1){?>
								<a href="<?php echo $columna['rutaImagen'] ?>" class="info group4" title="<?php echo $columna['tituloImagen'] ?>">Ver imágenes</a>
							<?php
									}
								else{?>
								<a href="<?php echo $columna['rutaImagen'] ?>" class="group4" title="<?php echo $columna['tituloImagen'] ?>">Ver imágenes</a>
							<?php
								}
							}
						}
						?>
					<div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.png" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Ver imágenes</a>
	                    </div>
	                </div>
	               <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.png" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="../../images/logo.jpg" class="info group4">Ver imágenes</a>
	                        <a href="../../images/logo.jpg" class="group4"></a>
	                        <a href="../../images/reserva.png" class="group4"></a>
	                        <a href="../../images/logo.jpg" class="group4"></a>
	                    </div>
	                </div>
	                <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.png" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Ver imágenes</a>
	                    </div>
	                </div>
	                <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.png" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Ver imágenes</a>
	                    </div>
	                </div>
				</div>            	
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>
