<?php 
	require_once ("imports.php");
	require_once ("header.php");
	require_once ("nav.php");
	require_once ("footer.php"); 
	require_once ("../controller/projectModel.php");
	getImportsUp();
	$proyectoModel = new projectModel();
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
							foreach ($imagenes as $columna) {?>
								<a href="<?php echo $columna['rutaImagen'] ?>" class="info group4" title="<?php echo $columna['tituloImagen'] ?>">Read More</a>
							<?php
							}
						}
						?>
					
					<div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.gif" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Read More</a>
	                    </div>
	                </div>
	               <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.gif" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="../../images/reserva.gif" class="info group4">Read More</a>
	                        <a href="../../images/logo.jpg" class="group4"></a>
	                        <a href="../../images/reserva.gif" class="group4"></a>
	                        <a href="../../images/logo.jpg" class="group4"></a>
	                    </div>
	                </div>
	                <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.gif" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Read More</a>
	                    </div>
	                </div>
	                <div class="view view-third col-xs-12 col-sm-4 col-md-4">
	                    <img src="../../images/reserva.gif" class="img-responsive" />
	                    <div class="mask">
	                        <h2>Hover Style #3</h2>
	                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
	                        <a href="#" class="info">Read More</a>
	                    </div>
	                </div>
	                
					<!--<div class="col-xs-12 col-sm-8 col-md-8">
						<div class="panel panel-default empresa">
						  <div class="panel-heading">Conoce nuestro nuevo proyecto</div>
						  <div class="panel-body">
							Conoce nuestro nuevo proyecto "Reserva de la colina" ubicada en la ciudad de Tebaida Quindío.

							<br> <br>Para ver las imagenes dirígete a nuestras redes sociales. <br>

							<a href="https://www.facebook.com/media/set/?set=a.780324305373844.1073741828.779868935419381" target="_Blank">Facebook</a>

							<a href="https://plus.google.com/u/0/photos/108218785440706983619/albums/6094699707337871649" target="_Blank">Google Plus</a>

							<a href="" target="_Blank">Twitter</a>

							<br>
							<img class="img-responsive" src="../../images/reserva.gif">
						  </div>
						</div>
					</div>-->
				</div>            	
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>