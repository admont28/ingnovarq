<?php 
	session_start();
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once "../controller/userModel.php";

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
				<br>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
						<?php 
							if(isset($_SESSION['idUsuario'])){
						?>
							<div class="panel panel-default empresa">
							 	<div class="panel-heading">¡Bienvenido <? echo $_SESSION['nombreUsuario'] ?>!</div>
							  	<div class="panel-body">
									<p class="lead text-success">Se ha detectado una sesión activa. </p>
									
									<p class="lead">
										Para iniciar sesión con otro usuario porfavor cierre está sesión, de lo contrario, no podrá tener 2 sesiones activas.
									</p>
									<p class="lead">
										Puede dirigirse a administrar el sitio web de Ingnovarq S.A.S.
									</p>
									<br>
										<div class="col-md-12">
											<a id="cerrarSesion" class="col-md-5 col-md-offset-1 btn btn-success">Cerrar Sesión</a>
											<a class="col-md-5 col-md-offset-1 btn btn-success" href="perfil">Administrar Sitio WEB</a>
							  			</div>
							  	</div>
							</div>
						<?php
							}
							else{
								?>
									<div class="panel panel-default empresa">
									 	<div class="panel-heading">Inicio de sesión - ¡Bienvenido Administrador!</div>
									  	<div class="panel-body">
									  		<div id="mensaje"></div>
											<form class="form-horizontal" id="form-login-ajax" method="post">
												<div class="form-group">
											        <label for="inputIdUsuario" class="control-label col-xs-2">Usuario:</label>
											        <div class="col-xs-10">
											        	<input type="name" id="idUsuario" name="idUsuario" class="form-control" placeholder="Usuario">
											        	<div class="col-xs-10 error-text" id="e_idUsuario"></div>
											        </div>
											     </div>

											    <div class="form-group">
											        <label for="inputPassword" class="control-label col-xs-2">Contraseña:</label>
											        <div class="col-xs-10">
											            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
											        	<div class="col-xs-10 error-text" id="e_password"></div>
											        </div>
											    </div>
												<div class="form-group">
											        <div class="col-xs-offset-2 col-xs-10">
											         	<input type="hidden" name="ajax">
											            <button type="submit" id="btn-login-ajax" class="btn btn-success">Iniciar Sesión</button> 
											        </div>
											    </div>
											</form>
									  	</div>
									</div>
							<?php		
							}
							?>
					</div>
				</div>
				<br>
				<br>
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>