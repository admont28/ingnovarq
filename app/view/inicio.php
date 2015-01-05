<?php 
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once ("../controller/sliderModel.php");
	getImportsUp();
	$sliderModel = new SliderModel();
	$imagenes = $sliderModel->get_slider_images();
?>
	<body id="body" onLoad="cargador()">
		<div class="con" id="con">
			<div class="container" id="main">
				
					<?php 
						getHeader();
						getNav();
					?>
			</div>
			
			<div class="row">
				<div id="slider-content" class="col-xs-12 col-sm-12 col-md-12">			
					<canvas id="lienzo" width="1300" height="535" > 				
					</canvas>
					<div id="contenedorSlider" class="contenedorSlider paddingSlider">
						   <div class="wrapper">
								<ul id="sb-slider" class="sb-slider">
									<?php
										foreach ($imagenes as $fila) {
											$rutaImagen = $fila['rutaImagen'];
											$tituloImagen = $fila['tituloImagen'];
										?>
											<li>
												<img src="<?php echo $rutaImagen; ?>" alt="<?php echo $tituloImagen?>"/>
												<div class="sb-description"> <h3><?php echo $tituloImagen?></h3> </div>
											</li>
										<?php	
										}
									?>
								</ul>

								<div id="shadow" class="shadow"></div>

								<div id="nav-arrows" class="nav-arrows">
									<a href="#">Next</a>
									<a href="#">Previous</a>
								</div>

							</div>
					</div>
				</div>		
			</div>

			<div class="contenido">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">

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

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Empresa</div>
						  <div class="panel-body">
							SITIO WEB EN CONSTRUCCIÓN
						  </div>
						</div>

						<div class="panel panel-default servicios">
						  <div class="panel-heading">Nuestros Servicios</div>
						  <div class="panel-body">
							SITIO WEB EN CONSTRUCCIÓN
						  </div>
						</div>	
						<div class="panel panel-default clientes">
						  <div class="panel-heading">Nuestros Clientes</div>
						  <div class="panel-body">
							SITIO WEB EN CONSTRUCCIÓN
						  </div>
						</div>		
					</div>
					<div  class=" col-xs-12 col-sm-4 col-md-4">
						<div class="panel panel-default twitter">
						  <div class="panel-heading">TWITTER</div>
						  <div class="panel-body">
								<a class="twitter-timeline" href="https://twitter.com/ingnovarqsas" data-widget-id="546104635002728448">Tweets por @ingnovarqsas.
								</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			getFooter();
			getImportsDown();
		?>
	</body>
</html>