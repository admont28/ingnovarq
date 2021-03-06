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
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" id="mision">
						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Misión</div>
						  <div class="panel-body">
						  	<div class="col-xs-3 col-sm-3 col-md-3"><img src="../../images/administrador/mision.png" class="img-responsive"></div>
						  	<div class="col-xs-9 col-sm-9 col-md-9">
								<p class="text-justify"> 
									<?php 	
										echo $mision['misionEmpresa'];
									?>
								</p>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" id="vision">
						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Visión</div>
						  <div class="panel-body">
						  	<div class="col-xs-3 col-sm-3 col-md-3"><img src="../../images/administrador/vision.png" class="img-responsive"></div>
						  	<div class="col-xs-9 col-sm-9 col-md-9">
						  		<p class="text-justify">
									<?php
										echo $vision['visionEmpresa'];
									?>
								</p>
						  	</div>

							
						  </div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" id="filosofia">
						<div class="panel panel-default empresa">
						  	<div class="panel-heading">Nuestra Filosofía</div>
						  	<div class="panel-body">
							  	<div class="col-xs-3 col-sm-3 col-md-3"><img src="../../images/administrador/valores.png" class="img-responsive"></div>
							  	<div class="col-xs-9 col-sm-9 col-md-9">
									<p class="text-justify"> 
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
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>