<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
		header('location: error');
	}
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
					if($_SESSION['superAdminUsuario'] == 1)
						getNavSuperAdmin();
					else
						getNavAdmin();
				?>
			</div>
			<div class="contenido">
				<div class="row">
					<br>
					<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
						<div class="panel panel-default empresa">
							<div class="panel-heading">
								Crear proyecto.
							</div>
							<div class="panel-body">
								<div id="mensaje"></div>
								<h2 style="color: #019831; text-align: center;">Formulario para agregar un nuevo proyecto de Ingnovarq S.A.S</h2>
								<br>
								<div class="form-horizontal" id="form-proyecto-ajax" method="post" enctype="multipart/form-data">
								    <div class="form-group">
								         <label for="inputName" class="control-label col-xs-2">Nombre:</label>
								         <div class="col-xs-10">
								            <input type="name" id="nombreProyecto" name="nombreProyecto" class="form-control" placeholder="Nombre">
								         	<div class="col-xs-10 error-text" id="e_nombre_proyecto"></div>
								         </div>
								    </div>
									    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-2">Descripción:</label>
								        <div class="col-xs-10">
								        	<textarea id="descripcionProyecto" name="descripcionProyecto" class="form-control" placeholder="Descripción del Proyecto" rows="7"></textarea>
								        	<div class="col-xs-10 error-text" id="e_descripcion_proyecto"></div> 
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-2">Fecha:</label>
								         <div class="col-xs-10">
								         	<input type="text" type="text" id="fecha" class="form-control" placeholder="dd/mm/aaaa" data-date-language="es">
								         	<div class="col-xs-10 error-text" id="e_fecha_proyecto"></div>
								         </div>
								    </div>	
								    <div class="form-group">
							     	 <label class="control-label col-xs-2">Imagen:</label>
							         <div class="col-xs-10" id="cargador">
							            <div id="fileuploader">Cargar imagen</div>
							            <div class="col-xs-10 error-text" id="e_imagen_proyecto"></div> 
							         </div>
							     	</div> 							     
								    <div class="form-group">
								        <div class="col-xs-offset-2 col-xs-8">
								            <div id="btn-crear-proyecto-ajax" class="btn btn-success">
								            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crear Proyecto
								            </div> 
								        </div>
							     	</div>
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