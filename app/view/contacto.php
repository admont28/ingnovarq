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
			<div id="formularioContacto">
				<div class="etiqueta"><label>Nombre:</label></div>
				<div class="componente"><input class="textField" type="text" name="nombre" required="required"/></div>
				
				<div class="etiqueta"><label>Telefono:</label></div>
				<div class="componente"><input class="textField" type="text" name="telefono" required="required"/></div>
				
				<div class="etiqueta"><label>Email:</label></div>
				<div class="componente"><input class="textField" type="text" name="email" required="required"/></div>
				
				<div class="etiqueta"><label>Mensaje:</label></div>
				<div class="componente"><textarea class="textField" name="descripcionProducto" required="required"></textarea></div>
				
				<div style="text-align: center;">
					<input type="submit" value="Enviar" />
				</div>
			</div>
			</div>
		<?php
			getFooter(); 
			getImportsDown();
		?>
		</body>
</html>