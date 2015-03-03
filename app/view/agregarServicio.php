<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
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
					<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
						<div class="panel panel-default empresa">
							<div class="panel-heading">
								Crear servicio.
							</div>
							<div class="panel-body">
								<div id="mensaje"></div>
								<h2 style="color: #019831; text-align: center;">Formulario para agregar un nuevo servicio de Ingnovarq S.A.S</h2>
								<br>
								<div class="form-horizontal" >
								    <div class="form-group">
								         <label class="control-label col-xs-3">Nombre:</label>
								         <div class="col-xs-9">
								            <input type="name" id="nombreServicio" name="nombreServicio" class="form-control" placeholder="Nombre">
								         	<div class="col-xs-12 error-text" id="e_nombre_servicio"></div>
								         </div>
								    </div>
								    <div class="form-group">
								        <label class="control-label col-xs-3">Descripción:</label>
								        <div class="col-xs-9">
								            <textarea id="descripcionServicio" name="descripcionServicio" class="form-control" placeholder="Descripción del Servicio" rows="7"></textarea>
								        	<div class="col-xs-12 error-text" id="e_descripcion_servicio"></div> 
								        </div>
								    </div>
								    <div class="form-group">
								        <label class="control-label col-xs-3">Fecha:</label>
								        <div class="col-xs-9">
								            <input type="text" type="text" id="fecha" class="form-control" placeholder="aaaa-mm-dd" data-date-language="es" readonly="readonly">
								         	<div class="col-xs-12 error-text" id="e_fecha_servicio"></div>
								        </div>
								    </div>	
								    <div class="form-group">
								    	<label class="col-xs-6 col-xs-offset-3">
								           	<input type="checkbox" id="previsualizacion"> Ocultar Previsualización
								        </label>
								    </div>
								    <div class="form-group">
								    	
							     		<label class="control-label col-xs-3">Imágenes:</label>
							         	<div class="col-xs-9" id="cargador">
							            	<div id="fileuploader">Cargar imágenes</div>
							            	<div class="col-xs-12 error-text" id="e_imagen_servicio"></div> 
							            	<p class="col-xs-12 text-info">Nota: Cada servicio debe tener almenos 1 imagen, para agregar más imágenes al servicio debe editarlo una vez creado.<br>Antes de cargar cualquier imagen verifique que no haya cargado una imagen con el mismo nombre.</p> 
							         	</div>
							     	</div> 							     
								    <div class="form-group">
								        <div class="col-xs-offset-3 col-xs-9">
								            <div id="btn-agregar-servicio-ajax" class="btn btn-success">
								            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crear Servicio
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