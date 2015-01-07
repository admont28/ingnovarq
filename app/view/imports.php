<?php
	function getImportsUp(){
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
					<title>INGNOVARQ</title>
					<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico" />
					<link rel="stylesheet" type="text/css" href="../../css/style.css">
					<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"  media="screen">
					<!-- CSS File JAlert -->
					<link rel="stylesheet" type="text/css" href="../../css/jquery.alerts.css"/>
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
					<!--- Javascript Files JAlert --> 
					<script src="../../js/jquery.ui.draggable.js" type="text/javascript"></script>
					<script src="../../js/jquery.alerts.mod.js" type="text/javascript"></script>

					<!-- CSS Files y JS para la galeria de imagenes de los proyectos -->
					<link rel="stylesheet" type="text/css" href="../../css/colorbox.css" />
					<script type="text/javascript" src="../../js/jquery.colorbox.js"></script>
					<script>
						jQuery(document).ready(function($){
							
								$(".group4").colorbox({
									rel:'group4',
									slideshow: true,
									width: '600px'
								});
							

						});
					</script>
			            
			        <!-- bxSlider CSS file -->
			        <link rel="stylesheet" type="text/css" href="../../css/jquery.bxslider.css"/>
					
					<!-- Slider CSS Files-->
					<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
					<link rel="stylesheet" type="text/css" href="../../css/slicebox.css" />
					<link rel="stylesheet" type="text/css" href="../../css/custom.css" />

					<!-- Script para slider -->
					<script type="text/javascript" src="../../js/modernizr.custom.46884.js"></script>

					<!-- CSS Files y Script para el nav responsivo -->
					<link rel="stylesheet" type='text/css' href="../../css/normalize.css">
					<link rel="stylesheet" type='text/css' href="../../css/nav.css">
					<script type="text/javascript" src="../../js/navresponsive.js"></script>
					
					<!-- CSS Files y Script para el BoxesGrid -->
					<link rel="stylesheet" type="text/css" href="../../css/styleServicios.css"/>					
			        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Oswald'/>					
					<script id="contentTmpl" type="text/x-jquery-tmpl">	
						<div id="ib-content-preview" class="ib-content-preview">
			                <div class="ib-teaser" style="display:none;">{{html teaser}}</div>
			                <div class="ib-content-full" style="display:none;">{{html content}}</div>
			                <span class="ib-close" style="display:none;">Close Preview</span>
			            </div>
					</script>

					<!-- Script para capturar las acciones de los botones en formularios -->
					<script type="text/javascript" src="../../js/insertions.js"></script>

					<!-- CSS Files para la presentación de proyectos -->
					<link rel="stylesheet" type="text/css" href="../../css/demoProyectos.css"/>
			        <link rel="stylesheet" type="text/css" href="../../css/styleCommonProyectos.css"/>
			        <link rel="stylesheet" type="text/css" href="../../css/styleProyectos.css"/>
			        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Oswald'/>
				</head>
		<?php
	}

	function getImportsDown(){
		?>

		<!-- Script para cargar JQuery -->
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<!-- Script para cargar el js de bootstrap -->
	  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	  	<!-- Script para dibujar el canvas que está debajo del slider -->
	  	<script type="text/javascript" src="../../js/canvas.js"></script>
	  	<!-- <script type="text/javascript" src="js/scrolltofixed-min.js"></script> -->
	  	<script type="text/javascript" src="../../js/app.js"></script>
	  	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
		<script type="text/javascript" src="../../js/jquery.slicebox.js"></script>
		<!-- Script para el Menu pegajoso -->
		<script type="text/javascript" src="../../js/menupegajoso.js"></script>
		<!-- Script para el BoxesGrid -->
		<script type="text/javascript" src="../../js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.kinetic.js"></script>
		<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="../../js/appServicios.js"></script>
        </body>
		</html>
		<?php
	}
?>
