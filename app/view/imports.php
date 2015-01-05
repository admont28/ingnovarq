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
					<link href="../../css/style.css" rel="stylesheet" >
					<link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			            
			        <!-- bxSlider CSS file -->
			        <link type="text/css" href="../../css/jquery.bxslider.css" rel="stylesheet" />
					
					<!-- Slider CSS Files-->
					<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
					<link rel="stylesheet" type="text/css" href="../../css/slicebox.css" />
					<link rel="stylesheet" type="text/css" href="../../css/custom.css" />

					<!-- Script para slider -->
					<script type="text/javascript" src="../../js/modernizr.custom.46884.js"></script>

					<!-- CSS Files y Script para el nav responsivo -->
					<link rel="stylesheet" href="../../css/normalize.css">
					<link rel="stylesheet" href="../../css/nav.css">
					<script type="text/javascript" src="../../js/navresponsive.js"></script>
					
					<!-- CSS Files y Script para el BoxesGrid -->
					<link rel="stylesheet" type="text/css" href="../../css/styleServicios.css" />					
			        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />					
					<script id="contentTmpl" type="text/x-jquery-tmpl">	
						<div id="ib-content-preview" class="ib-content-preview">
			                <div class="ib-teaser" style="display:none;">{{html teaser}}</div>
			                <div class="ib-content-full" style="display:none;">{{html content}}</div>
			                <span class="ib-close" style="display:none;">Close Preview</span>
			            </div>
					</script>
					
				</head>
		<?php
	}

	function getImportsDown(){
		?>

		<!-- Script para cargar JQuery -->
		<script src="../../js/jquery.js"></script>
		<!-- Script para cargar el js de bootstrap -->
	  	<script src="../../js/bootstrap.min.js"></script>
	  	<!-- Script para dibujar el canvas que está debajo del slider -->
	  	<script src="../../js/canvas.js"></script>
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

		<?php
	}
?>
