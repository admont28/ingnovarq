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
								         <label for="inputName" class="control-label col-xs-3">Nombre:</label>
								         <div class="col-xs-9">
								            <input type="name" id="nombreProyecto" name="nombreProyecto" class="form-control" placeholder="Nombre">
								         	<div class="col-xs-12 error-text" id="e_nombre_proyecto"></div>
								         </div>
								    </div>
									    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-3">Descripción:</label>
								        <div class="col-xs-9">
								        	<textarea id="descripcionProyecto" name="descripcionProyecto" class="form-control" placeholder="Descripción del Proyecto" rows="7"></textarea>
								        	<div class="col-xs-12 error-text" id="e_descripcion_proyecto"></div> 
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-3">Fecha:</label>
								         <div class="col-xs-9">
								         	<input type="text" id="fecha" class="form-control" placeholder="aaaa-mm-dd" data-date-language="es" readonly="readonly">
								         	<div class="col-xs-12 error-text" id="e_fecha_proyecto"></div>
								         </div>
								    </div>	
								    <div class="form-group">
							     	 <label class="control-label col-xs-3">Imagen:</label>
							         <div class="col-xs-9" id="cargador">
							            <div id="fileuploader">Cargar imagen</div>
							            <div class="col-xs-12 error-text" id="e_imagen_proyecto"></div>
							            <p class="col-xs-12 text-info">Nota: Cada proyecto debe tener almenos 1 imagen, para agregar más imágenes al proyecto debe editarlo una vez creado.</p> 
							         </div>
							     	</div> 							     
								    <div class="form-group">
								        <div class="col-xs-offset-3 col-xs-9">
								            <div id="btn-agregar-proyecto-ajax" class="btn btn-success">
								            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crear Proyecto
								            </div> 
								            <label>
								            	<input type="checkbox" id="previsualizacion"> Ocultar Previsualización
								            </label>
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