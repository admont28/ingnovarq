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
								        <label for="asunto" class="control-label col-xs-2">Asunto*</label>
								        <div class="col-xs-10">
								            <input type="name" id="asunto" name="asunto" class="form-control" placeholder="Asunto">
								        	<div class="col-xs-10 error-text" id="e_asunto"></div> 
								        </div>
								    </div>
									<div class="form-group">
								        <label for="nombre" class="control-label col-xs-2">Nombre*</label>
								        <div class="col-xs-10">
								            <input type="name" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
								        	<div class="col-xs-10 error-text" id="e_nombre"></div> 
								        </div>
								    </div>
							     <div class="form-group">
							        <label for="email" class="control-label col-xs-2">Email*</label>
							        <div class="col-xs-10">
							            <input type="text" id="email" name="email" class="form-control" placeholder="ejemplo@ejemplo.com" >
							        	<div class="col-xs-10 error-text" id="e_email"></div>
							        </div>
							     </div>
							     <div class="form-group">
							        <label for="telefono" class="control-label col-xs-2">Teléfono (opcional)</label>
							        <div class="col-xs-10">
							            <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ejemplo: 320 676 7399">
							        	<div class="col-xs-10 error-text" id="e_telefono"></div>
							        </div>
							     </div>
							     <div class="form-group">
							        <label for="ciudad" class="control-label col-xs-2">Ciudad*</label>
							        <div class="col-xs-10">
							            <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Armenia Quindío" >
							        	<div class="col-xs-10 error-text" id="e_ciudad"></div>
							        </div>
							     </div>
							     <div class="form-group">
							     	<label for="mensaje_usuario" class="control-label col-xs-2">Mensaje*</label>
							     	<div class="col-xs-10">
						            	<textarea id="mensaje_usuario" name="mensaje_usuario" class="form-control" rows="7"></textarea>
						         		<div class="col-xs-10 error-text" id="e_mensaje_usuario"></div>
						        	</div>
							     </div>
							     <div class="form-group">
							        <div class="col-xs-offset-2 col-xs-10">
							         	<input type="hidden" name="ajaxMail">
							            <button type="submit" id="btn-contacto-ajax" class="btn btn-success">
							            	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enviar formulario
							            </button> 
							            <button type="reset" class="btn btn-primary" value="Borrar">
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
		    	</div>
			</div>
		</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>