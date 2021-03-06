<?php
	function getImportsUp(){
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
					<title>INGNOVARQ S.A.S</title>
					
					<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico"/>
					<link rel="stylesheet" type="text/css" href="../../css/style.css">
					<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"  media="screen">

					<!-- CSS File JQuery Upload File Plugin -->
					<link rel="stylesheet" type="text/css" href="../../css/jquery.uploadfile.css">

					<!-- JavaScript Jquery -->
					<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

					<!-- JavaScript JQuery Upload File Plugin -->
					<script type="text/javascript" src="../../js/jquery.uploadfile.js"></script>
					
					<!-- Fechas Bootstrap-datatimepicker.js -->
					<script type="text/javascript" src="../../js/bootstrap-datepicker.js"></script>
					<script type="text/javascript" src="../../js/bootstrap-datepicker.es.js" charset="UTF-8"></script>
					<link rel="stylesheet" type="text/css" href="../../css/bootstrap-datepicker.css">

					<!-- notificaciones PNotify -->
					<link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css" media="all"/>
					<script type="text/javascript" src="../../js/pnotify.custom.min.js"></script>
					<link rel="stylesheet" type="text/css" href="../../css/pnotify.custom.min.css" media="all"/>


					<!--- Javascript Draggable --> 
					<script type="text/javascript" src="../../js/jquery.ui.draggable.js"></script>

					<!-- CSS Files y JS para la galeria de imagenes de los proyectos -->
					<link rel="stylesheet" type="text/css" href="../../css/colorbox.css"/>
					<script type="text/javascript" src="../../js/jquery.colorbox.js"></script>

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
			        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald"/>		
			        <link rel="stylesheet" type="text/css" href="../../css/styleServicios.css"/>								
					<script id="contentTmpl" type="text/x-jquery-tmpl">	
						<div id="ib-content-preview" class="ib-content-preview">
			                <div class="ib-teaser" style="display:none;">{{html teaser}}</div>
			                <div class="ib-content-full" style="display:none;">{{html content}}</div>
			                <span class="ib-close" style="display:none;">Close Preview</span>
			            </div>
					</script>

					<!-- Script para capturar las acciones de los botones en formularios -->
					<script type="text/javascript" src="../../js/botones.js" ></script>

			        <link rel="stylesheet" type="text/css" href="../../css/styleClientes.css"/>
			        <link rel="stylesheet" type="text/css" href="../../css/styleProyectos.css"/>
				</head>
		<?php
	}

	function getImportsDown(){
		?>
		<!-- Script para cargar JQuery -->
		<!-- <script type="text/javascript" src="../../js/jquery.js"></script> -->
		<!-- AJAX Upload -->
			        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
					<!-- <script src="../../js/jquery.ui.widget.js"></script> -->
					<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
					<!-- <script src="../../js/jquery.iframe-transport.js"></script> -->
					<!-- The basic File Upload plugin -->
					<!-- <script src="../../js/jquery.fileupload.js"></script> -->
		<!-- /AJAX Upload -->
		<!-- Script para cargar el js de bootstrap -->
	  	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	  	<!-- Script para dibujar el canvas que está debajo del slider -->
	  	<script type="text/javascript" src="../../js/canvas.js"></script>
	  	
	  	<script type="text/javascript" src="../../js/app.js"></script>
	  	
		<script type="text/javascript" src="../../js/jquery.slicebox.js"></script>
		<!-- Script para el Menu pegajoso -->
		<script type="text/javascript" src="../../js/menupegajoso.js"></script>
		<!-- Script para el BoxesGrid -->
		<script type="text/javascript" src="../../js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="../../js/jquery.kinetic.js"></script>
		<script type="text/javascript" src="../../js/jquery.easing.1.3.js"></script>
        
        
       	<!-- Inserta esta etiqueta en la sección "head" o justo antes de la etiqueta "body" de cierre. -->
		<script src="https://apis.google.com/js/platform.js" async defer>
		  {lang: 'es-419'}
		</script>
        </body>
		</html>
		<?php
	}
?>
