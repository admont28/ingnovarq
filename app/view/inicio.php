<?php 
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once ("../controller/sliderModel.php");
	require_once ("../controller/clientModel.php");
	require_once ("../controller/empresaModel.php");
	require_once ("../controller/serviceModel.php");
	getImportsUp();
	// Acciones para la sección de nuestra empresa.
	$empresa      = new EmpresaModel();
	$mision       = $empresa->get_mision();
	$mision       = substr($mision['misionEmpresa'], 0, 350);
	$vision       = $empresa->get_vision();
	$vision       = substr($vision['visionEmpresa'], 0, 350);
	$filosofia    = $empresa->get_filosofia();
	$filosofia    = substr($filosofia['filosofiaEmpresa'], 0, 350);
	$empresa->cerrar_conexion();
	// Acciones para la sección del slider.
	$sliderModel  = new SliderModel();
	$imagenes     = $sliderModel->get_slider_images();
	$sliderModel->cerrar_conexion();
	// Acciones para la sección de nuestros clientes.
	$clientModel  = new ClientModel();
	$clientes     = $clientModel->view_all_db_clients();
	$clientModel->cerrar_conexion();
	// Acciones para la sección de servicios
	$serviceModel = new ServiceModel();
	$servicios    = $serviceModel->view_all_db_services();
	$serviceModel->cerrar_conexion();
?>
	<body id="body" onLoad="cargador()">
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="con" id="con">
			<div class="container" id="main">
				<?php 
					getHeader();
					getNav();
				?>
			</div>
			<div class="row">
				<div id="slider-content" class="col-xs-12 col-sm-12 col-md-12">			
					<canvas id="lienzo" width="1280" height="535" > 				
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
							<div class="col-md-12" style="height: 385px; padding-left:0; padding-right:0;">

								<iframe type="text/html" width="100%" height="100%" src="http://www.youtube.com/embed/liTip-LTFyY" frameborder="0"></iframe>
							</div>
							
							<br>
								<img class="img-responsive" src="../../images/reserva.png">
							
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Empresa</div>
						  <div class="panel-body">
						  	<h2>Misión</h2>
							<p class="text-justify"><?php echo $mision?>...</p>
							<a href="nosotros#mision" title="Ver más acerca de la misión">Ver más...</a>
							<br>
							<br>
							<h2>Visión</h2>
							<p class="text-justify"><?php echo $vision?>...</p>
							<a href="nosotros#vision" title="Ver más acerca de la visión">Ver más...</a>
							<br>
							<br>
							<h2>Filosofía</h2>
							<p class="text-justify"><?php echo $filosofia?>...</p>
							<a href="nosotros#filosofia" title="Ver más acerca de la filosofia">Ver más...</a>
						  </div>
						</div>

						<div class="panel panel-default servicios">
						  <div class="panel-heading">Nuestros Servicios</div>
						  <div class="panel-body">
						  	<p>Conozca nuestros servicios:</p>
							<ul>
							<?php for ($i=0; $i < sizeof($servicios); $i++) { 
								?>
								<li><h3><?php echo $i+1 ?>) <?php echo $servicios[$i]['nombreServicio']; ?></h3></li>
								<?php	
							}
							?>								
							</ul>
							<a href="servicios" title="Ver más acerca de los servicios">Ver más...</a>
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
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="panel panel-default twitter">
						  <div class="panel-heading">FACEBOOK</div>
						  <div class="panel-body">
								<div class="fb-page" data-href="https://www.facebook.com/pages/Ingnovarq-SAS/779868935419381" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
						  </div>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="panel panel-default twitter">
						  <div class="panel-heading">GOOGLE MÁS</div>
						  <div class="panel-body">
								<div class="g-page" data-width="302" data-href="//plus.google.com/u/0/108218785440706983619" data-rel="publisher"></div>
						  </div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="panel panel-default clientes">
						  	<div class="panel-heading">Nuestros Clientes</div>
						  	<div class="panel-body">
							  	<h3>
							  	Trabajamos para que nuestros clientes siempre regresen.
							  	</h3>
							  	<br>
						  		<?php
						  		foreach ($clientes as $fila) {
						  			?>
						  			<div class="col-xs-12 col-sm-2 col-md-2">
						  			<br>
						  				<h3 class="text-center"><?php echo $fila['nombreCliente']?></h3>
						  				<br>
						  				<img class="img-responsive center-block" src="<?php echo $fila['rutaImagen'] ?>" alt="<?php echo $fila['nombreCliente'] ?>" title="<?php echo $fila['nombreCliente'] ?>">
									</div>
									<?php
						  		}
								?>
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