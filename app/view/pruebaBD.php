<?php 
	
	include_once ("imports.php");
	include_once ("header.php");
	include_once ("nav.php");
	include_once ("footer.php"); 
	require_once "../controller/userModel.php";

	getImportsUp();
	$userModel = new UserModel();
	$usuarios = $userModel->view_all_db_users();

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
						 <table >
		            <tr>
		                <td>
		                    Id
		                </td>
		                <td>
		                    Cédula ñ
		                </td>
		                <td >
		                    Nombre
		                </td>
		                <td>
		                    Apellido
		                </td>
		                <td>
		                    Fecha
		                </td>
		                <td>
		                    Super Admin
		                </td>
		            </tr><!-- /THEAD -->
		            <?php foreach ($usuarios as $row): ?>
		            <tr>
		                <td><?php echo $row['idUsuario']; ?></td>
		                <td><?php echo $row['cedulaUsuario']; ?></td>
		                <td><?php echo $row['nombreUsuario']; ?></td>
		                <td><?php echo $row['apellidoUsuario']; ?></td>
		                <td><?php echo $row['fechaCreacionUsuario']; ?></td>
		                <td><?php echo $row['superAdminUsuario']; ?></td>
		            </tr><!-- /TROW -->		        
		            <?php endforeach ?>        
		        </table>
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
