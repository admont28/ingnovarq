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
						  <div class="panel-heading">Misión</div>
						  <div class="panel-body">
							SITIO WEB EN CONSTRUCCIÓN
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Visión</div>
						  <div class="panel-body">
							SITIO WEB EN CONSTRUCCIÓN
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