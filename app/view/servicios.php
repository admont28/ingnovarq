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
				<div class="">
            
		            <div id="ib-top" class="ib-top">
		                <h1>Nuestros Servicios <span>Ingnovarq S.A.S</span></h1>
		            </div>
		            <div id="ib-main-wrapper" class="ib-main-wrapper">
		                <div class="ib-main">

		                	<?php 
		                		foreach ($servicios as $fila) {
		                			?>
		                			<a href="#" class="ib-content">                   
			                        <div class="ib-teaser">
			                            <h2> <?php echo $fila['nombreServicio'] ?> </h2>
			                        </div>
			                        <div class="ib-content-full">
			                            <p class="color-p"> <?php echo $fila['descripcionServicio'] ?> </p>
			                        </div>
		                    </a>
		                    <?php
		                		}
		                	?>
							<div class="clr"></div>
						</div><!-- ib-main -->
		            </div><!-- ib-main-wrapper -->
        		</div>
				
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>
		</body>
</html>