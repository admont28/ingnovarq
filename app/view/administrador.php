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
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
						<?php 
							if(isset($_SESSION['idUsuario'])){
						?>
							<div class="panel panel-default empresa">
							 	<div class="panel-heading">¡Bienvenido <? echo $_SESSION['nombreUsuario'] ?>!</div>
							  	<div class="panel-body">
									<p> Usted ya tiene una sesión activa, para iniciar sesión con otro usuario porfavor cierre está sesión,
									 lo puede hacer dando click <a href="../controller/logout">aquí</a>,
									 de lo contrario puede dirigirse a administrar su sitio web <a href="perfil"> aquí</a></p>
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
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>