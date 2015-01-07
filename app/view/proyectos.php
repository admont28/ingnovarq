<?php 
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	getImportsUp();
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
					</div>
				</div>
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>