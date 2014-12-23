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
					<div class="col-xs-12 col-sm-8 col-md-8">
						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Misión</div>
						  <div class="panel-body">
							<p> 
								Ingnovarq S.A.S Es una empresa que tiene como finalidad proporcionar a la sociedad (región, país) soluciones innovadoras, sustentables y eficaces, 
								mediante la realización de servicios y proyectos de arquitectura, ingeniería y construcción.
							</p>
							<p>
								Ingnovarq S.A.S Está comprometida a lograr un incremento de valor suficiente para satisfacer a sus clientes, así como también contribuir al desarrollo e 
								impulso de la región.
							</p>
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Visión</div>
						  <div class="panel-body">
							<p>
								Ingnovarq S.A.S Busca ser reconocida como una empresa líder a nivel regional en la prestación de servicios de arquitectura ingeniería y construcción, que 
								generen mayor seguridad, satisfacción y lealtad por parte de nuestros clientes.
							</p>
						  </div>
						</div>

						<div class="panel panel-default empresa">
						  <div class="panel-heading">Nuestra Filosofía</div>
						  <div class="panel-body">
							<p> 
								La variedad de Servicios ofrecidas por la Constructora  ingnovarq sas abarcadesde la concepción del proyecto hasta que el mismo es finalizado.
								Esto significa que la constructora desarrolla cada etapa sucesiva de un Proyecto, desde la misma conceptualización de la idea del Cliente hasta su exitosa 
								ejecución de acuerdo a normas y especificaciones técnicas que cumplen con estándares nacionales e internacionales.
							</p>
							<p>
								Ingnovarq S.A.S desarrolla un sistema de seguimiento y supervisión para cada Proyecto considerando el espectro global de componentes individuales,
								asegurando como consecuencia su efectiva ejecución  en los rangos de los cronogramas y operación de Costos.
							</p>
							<p>
								Ingnovarq S.A.S se encuentra en capacidad de ejecutar disciplinas relacionadas las diferentes fases de un Proyecto, en las cuales la Constructora dispone 
								de la mayor parte del equipo de expertos que integran su propio banco de Recursos Humanos, evitando así cualquier inconveniente y garantizando a la 
								vez la continuidad en la prestación del Servicio.
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
		</body>
</html>