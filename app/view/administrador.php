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
											<form action="../controller/login" method="post">
												<div class="">
													<label> Usuario: </label>
												</div>
												<div class="">
													<input class=""type="text" name="idUsuario" required="required" />
												</div>
												<div class="">
													<label> Contraseña: </label>
												</div>
												<div class="">
													<input class="" type="password" name="password" required="required"/>
												</div>
												<div style="text-align: center;">
													<input type="submit" value="Ingresar" />
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