<?php 
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once "../controller/empresaModel.php";
	getImportsUp();

	$empresa = new EmpresaModel();
	$mision = $empresa->get_mision();
	$vision = $empresa->get_vision();
	$filosofia = $empresa->get_filosofia();
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
						  <div class="panel-heading">Nuestra Misión</div>
						  <div class="panel-body">
							<p> 
								<?php 	
									echo $mision['misionEmpresa'];
								?>
							</p>
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Visión</div>
						  <div class="panel-body">
							<p>
								<?php
									echo $vision['visionEmpresa'];
								?>
							</p>
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Filosofía</div>
						  <div class="panel-body">
							<p> 
								<?php
									echo $filosofia['filosofiaEmpresa'];
								?>
							</p>
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