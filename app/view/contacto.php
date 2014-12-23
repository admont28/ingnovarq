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
				<div id="formulario">
					<div class="contenido">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="panel panel-default empresa">
							  <div class="panel-heading">Formulario de contacto</div>
							  <div class="panel-body">
								<form class="form-inline" role="form" action="php/contacto.php" method="POST" id="contacto" title="Nombre">
							        <label for="nombre">Nombre</label>
							        <input class="form-control name=" name="nombre" type="text" required="required" id="nombre" placeholder="Luis Esteban" tabindex="1" title="Nombre">
							        <br>
							        <label for="email">Email</label>
							        <input class="form-control name=" name="email" type="email" required="required" id="email" placeholder="luis@gmail.com" tabindex="2" title="Email">
							        <br>
							        <label for="telefono">Teléfono</label>
							        <input class="form-control name=" name="telefono" type="text" id="telefono" placeholder="(6) 7373737" tabindex="3" title="Telefono">
							        <br>
							        <label for="ciudad">Ciudad</label>
							        <input class="form-control name=" name="ciudad" type="text" id="ciudad" placeholder="Armenia Quindío" tabindex="4" title="ciudad">
							        <br>
							        <label for="pais">País</label>
							        <input class="form-control name=" name="pais" type="pais" id="pais" placeholder="Colombia" tabindex="5" title="pais">
							        <br>
							        <label for="Mensaje">Mensaje</label>
							        <textarea class="form-control name=" name="mensaje" rows="4" id="mensaje" placeholder="Este es un mensaje de prueba" tabindex="6"></textarea>
							        <br>
							        <br>
							        <input class="boton" type="submit" name="enviar" tabindex="7" value="Enviar">
							        <input type="reset" tabindex="8" class="boton" value="Borrar">
							        <input type="hidden" name="estado" value="1">
			       				 </form>
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
		</body>
</html>