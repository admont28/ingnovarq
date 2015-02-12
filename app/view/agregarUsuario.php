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
					<br>
					<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
						<div class="panel panel-default empresa">
							<div class="panel-heading">
								Crear usuario.
							</div>
							<div class="panel-body">
								<div id="mensaje"></div>
								<h2 style="color: #019841; text-align: center;">Formulario para crear un usuario de Ingnovarq S.A.S</h2>
								<br>								
								<form class="form-horizontal" id="form-usuario-ajax" method="post">
								     <div class="form-group">
								         <label for="inputName" class="control-label col-xs-4">Nombre:</label>
								         <div class="col-xs-8">
								            <input type="name" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
								         	<div class="col-xs-8 error-text" id="e_nombre"></div>
								         </div>
								     </div>
 								     <div class="form-group">
								        <label for="inputName" class="control-label col-xs-4">Apellido:</label>
								        <div class="col-xs-8">
								            <input type="name" id="apellido" name="apellido" class="form-control" placeholder="Apellido">
								        	<div class="col-xs-8 error-text" id="e_apellido"></div> 
								        </div>
								     </div>
								     <div class="form-group">
								        <label for="inputName" class="control-label col-xs-4">Cédula:</label>
								        <div class="col-xs-8">
								            <input type="text" id="cedula" name="cedula" class="form-control" placeholder="Cédula" >
								        	<div class="col-xs-8 error-text" id="e_cedula"></div>
								        </div>
								     </div>
								     <div class="form-group">
								        <label for="inputPassword" class="control-label col-xs-4">Contraseña:</label>
								        <div class="col-xs-8">
								            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
								        	<div class="col-xs-8 error-text" id="e_password"></div>
								        </div>
								     </div>
								     <div class="form-group">
								        <label for="inputPassword" class="control-label col-xs-4">Repetir Contraseña:</label>
								        <div class="col-xs-8">
								            <input type="password" id="repetir_password" name="repetir_password" class="form-control" placeholder="Repetir Contraseña" >
								        	<div class="col-xs-8 error-text" id="e_repetir_password"></div>
								        </div>
								     </div>
								     <div class="form-group">
								     	<label for="tipoUsuario" class="control-label col-xs-4">Tipo de usuario</label>
								     	<div class="col-xs-8">
									     	<select class="form-control" id="tipoUsuario" name="tipoUsuario"> 
												<option value="0">Administrador</option>
												<option value="1">Súper Administrador</option>
											</select>
										</div>
								     </div>
								     <div class="form-group">
								        <div class="col-xs-6 col-xs-offset-4">
								         	<input type="hidden" name="ajax">
								         	<button type="submit" id="btn-usuario-ajax" class="btn btn-success" style="margin-top: 5px;">
								            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Crear Usuario
								            </button> 
								            <button type="reset" class="btn btn-primary" value="Borrar" style="margin-top: 5px;">
								            	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Borrar
								            </button>
								        </div>
								     </div>
								</form>
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