<?php 
	
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once "../controller/userModel.php";

	getImportsUp();
	session_start();
?>

<body id="body">
		<div class="con" id="con">
			<div class="container" id="main">
				
					<?php 
						getHeader();
						getNavAdmin();
					?>
			</div>
			<div class="contenido">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel panel-default administrador">
							<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
								<div class="title-admin col-md-10 col-xs-12 col-sm-12">
									<h2>Gestión de Usuarios</h2>
								</div>
								<div class="col-md-2 admin-img">
									<a>
										<img src="../../images/administrador/user.png" class="img-responsive">
									</a>
								</div>
							</div>
							<div class="panel-body col-xs-12 col-sm-12 col-md-12 color-content-admin">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/add.png" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/search.png" class="img-responsive">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel panel-default administrador">
							<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
								<div class="title-admin col-md-10 col-xs-12 col-sm-12">
									<h2>Gestión de Clientes</h2>
								</div>
								<div class="col-md-2 admin-img">
									<a>
										<img src="../../images/administrador/users.png" class="img-responsive">
									</a>
								</div>
							</div>
							<div class="panel-body col-xs-12 col-sm-12 col-md-12 color-content-admin">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/add.png" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/search.png" class="img-responsive">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel panel-default administrador">
							<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
								<div class="title-admin col-md-10 col-xs-12 col-sm-12">
									<h2>Gestión de Proyectos</h2>
								</div>
								<div class="col-md-2 admin-img">
									<a>
										<img src="../../images/administrador/projects.png" class="img-responsive">
									</a>
								</div>
							</div>
							<div class="panel-body col-xs-12 col-sm-12 col-md-12 color-content-admin">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/add.png" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/search.png" class="img-responsive">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel panel-default administrador">
							<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
								<div class="title-admin col-md-10 col-xs-12 col-sm-12">
									<h2>Gestión de Servicios</h2>
								</div>
								<div class="col-md-2 admin-img">
									<a>
										<img src="../../images/administrador/services.png" class="img-responsive">
									</a>
								</div>
							</div>
							<div class="panel-body col-xs-12 col-sm-12 col-md-12 color-content-admin">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/add.png" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/search.png" class="img-responsive">
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel panel-default administrador">
							<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
								<div class="title-admin col-md-10 col-xs-12 col-sm-12">
									<h2>Gestión de Empresa</h2>
								</div>
								<div class="col-md-2 admin-img">
									<a>
										<img src="../../images/administrador/user.png" class="img-responsive">
									</a>
								</div>
							</div>
							<div class="panel-body col-xs-12 col-sm-12 col-md-12 color-content-admin">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/add.png" class="img-responsive">
									</a>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<a href="inicio">
										<img src="../../images/administrador/search.png" class="img-responsive">
									</a>
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