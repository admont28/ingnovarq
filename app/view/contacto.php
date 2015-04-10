<?php 
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
					getNav();
				?>
			</div>
			<div class="contenido">
				<div class="row">
					<br>
					<div class="col-xs-12 col-sm-7 col-md-7">
						<div class="panel panel-default empresa">
							<div class="panel-heading">Formulario de contacto</div>
							<div class="panel-body">
								<div id="mensaje"></div>
								<form class="form-horizontal" id="form-contacto-ajax" method="post">
								     <div class="form-group">
								        <label for="asunto" class="control-label col-xs-3">Asunto*</label>
								        <div class="col-xs-9">
								            <input type="name" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
								        	<div class="col-xs-9 error-text" id="e_asunto"></div> 
								        </div>
								    </div>
									<div class="form-group">
								        <label for="nombre" class="control-label col-xs-3">Nombre*</label>
								        <div class="col-xs-9">
								            <input type="name" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
								        	<div class="col-xs-9 error-text" id="e_nombre"></div> 
								        </div>
								    </div>
							     <div class="form-group">
							        <label for="email" class="control-label col-xs-3">Email*</label>
							        <div class="col-xs-9">
							            <input type="text" id="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" >
							        	<div class="col-xs-9 error-text" id="e_email"></div>
							        </div>
							     </div>
							     <div class="form-group">
							        <label for="telefono" class="control-label col-xs-3">Teléfono (opcional)</label>
							        <div class="col-xs-9">
							            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ejemplo: 330 676 7399">
							        	<div class="col-xs-9 error-text" id="e_telefono"></div>
							        </div>
							     </div>
							     <div class="form-group">
							        <label for="ciudad" class="control-label col-xs-3">Ciudad*</label>
							        <div class="col-xs-9">
							            <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Armenia Quindío" >
							        	<div class="col-xs-9 error-text" id="e_ciudad"></div>
							        </div>
							     </div>
							     <div class="form-group">
							     	<label for="mensaje_usuario" class="control-label col-xs-3">Mensaje*</label>
							     	<div class="col-xs-9">
						            	<textarea id="mensaje_usuario" name="mensaje_usuario" class="form-control" rows="7"></textarea>
						         		<div class="col-xs-9 error-text" id="e_mensaje_usuario"></div>
						        	</div>
							     </div>
							     <div class="form-group">
							        <div class="col-xs-offset-3 col-xs-10">
							         	<input type="hidden" name="ajaxMail">
							            <button type="submit" id="btn-contacto-ajax" class="btn btn-success" style="margin-top: 5px;">
							            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enviar formulario
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
		        	<div class="col-xs-12 col-sm-5 col-md-5">
		        		<div class="panel panel-default empresa">
							<div class="panel-heading">Datos de contacto</div>
							<div class="panel-body">
								<h2 style="color: #019831;">Oficina</h2>
								<p>
									<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
									<strong>Dirección:</strong> Cra. 13 No 21 N-52 Oficina 202 Edificio Torreyana B/ Alameda Armenia-Quindío
								</p>
								<p>
									<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
									<strong>E-mail:</strong> <a href="mailto:ventas@ingnovarq.com.co">ventas@ingnovarq.com.co</a>
								</p>
								<p>
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
									<strong>Tel-Oficina:</strong> (6) 7497519
								</p>
								<p>
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
									<strong>Móvil:</strong> 320 676 7399
								</p>
								<p>
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
									<strong>Móvil:</strong> 311 7174393
								</p>
								<p>
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
									<strong>Móvil:</strong> 312 8666938
								</p>
								<h2 style="color: #019831;">Horarios de Atención</h2>
								<p>
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									<strong>Lunes a Viernes:</strong> 8:00am a 12:00pm y 2:00pm a 6:00pm
								</p>
								<p>
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									<strong>Sábados, Domingos y Festivos:</strong>
									<a href="mailto:ventas@ingnovarq.com.co">ventas@ingnovarq.com.co</a>
								</p>
						  </div>
						</div>
		        	</div>
		        	<div class="col-md-12 text-center">
		        		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3977.1957580155276!2d-75.65453699999999!3d4.558788!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f4e866c0aceb%3A0x50f45a0430b58847!2sINGNOVARQ+S.A.S!5e0!3m2!1ses!2s!4v1428092628404" width="1000" height="450" frameborder="0" style="border:0"></iframe>
		        	</div>
		    	</div>
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>