<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
		header('location: error');
	}
			include_once ("imports.php");
			include_once ("header.php");
			include_once ("nav.php");
			include_once ("footer.php"); 
			require_once "../controller/projectModel.php";

			getImportsUp();
			$proyectoModel = new projectModel();
			?>

			<body id="body">
				<div class="con" id="con">
					<div class="container" id="main">
							<?php 
								getHeader();
								getNavAdmin();
								//$direccion = "../controlador/cargarImagenesProductos?idproducto=".$_GET['idproducto'];
							?>
					</div>
					<div class="contenido">
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-8">
								<div id="mensaje"></div>
								<form class="form-horizontal" id="form-ajax" action="" method="post">
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
								            <textarea id="descripcionProyecto" name="descripcionProyecto" class="form-control" placeholder="Descripción del Proyecto">
								            </textarea>
								        	<div class="col-xs-10 error-text" id="e_descripcion_proyecto"></div> 
								        </div>
								     </div>
								     <div class="form-group">
								         <label for="inputName" class="control-label col-xs-2">Fecha:</label>
								         <div class="col-xs-10">
								            <input type="date" id="fecha_proyecto" name="fecha_proyecto" min="2005-01-01" class="form-control" placeholder="dd/mm/aaaa">
								         	<div class="col-xs-10 error-text" id="e_fecha_proyecto"></div>
								         </div>
								     </div>	
								     <div class="form-group">
								         <label for="inputName" class="control-label col-xs-2">Imagen:</label>
								         <div class="col-xs-10">
								            <input type="file" id="img_proyecto" name="img_proyecto" class="form-control" maxlength="5" placeholder="imagen inicial proyecto">
								         	<div class="col-xs-10 error-text" id="e_fecha_proyecto"></div>
								         </div>
								     </div>	
								     <div class="form-group">
								        <div class="col-xs-offset-2 col-xs-10">
								         	<input type="hidden" name="ajaxProducto">
								            <button type="submit" id="btn-producto-ajax" class="btn btn-success">Crear Proyecto</button> 
								        </div>
								    </div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<?php
					getFooter(); 
					getImportsDown();
?>