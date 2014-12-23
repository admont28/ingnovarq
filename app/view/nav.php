<?php 
	function getNav(){
		?>

		<nav class="clearfix paralelogramo">
			<ul class="clearfix">
				<li class="cuadrado">
					<a href="inicio" id="<?php if(strstr($_SERVER['REQUEST_URI'], 'inicio')){
						echo 'seleccionado';
					}?>">Inicio</a>
				</li>
				<li class="cuadrado">
					<a href="nosotros" id="<?php if(strstr($_SERVER['REQUEST_URI'], 'nosotros')){
						echo 'seleccionado';
					}?>">Nosotros</a>
				</li>
				<li class="cuadrado" >
					<a href="servicios" id="<?php if(strstr($_SERVER['REQUEST_URI'], 'servicios')){
						echo 'seleccionado';
					}?>">Servicios</a>
				</li>
				<li class="cuadrado" >
					<a href="proyectos" id="<?php if(strstr($_SERVER['REQUEST_URI'], 'proyectos')){
						echo 'seleccionado';
					}?>">Proyectos</a>
				</li>
				<li class="cuadrado" >
					<a href="contacto" id="<?php if(strstr($_SERVER['REQUEST_URI'], 'contacto')){
						echo 'seleccionado';
					}?>">Contáctenos</a>
				</li>	
			</ul>
			<a href="#" id="pull">Menu</a>
		</nav>

		<?php
	}
?>