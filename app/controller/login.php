<?php
   require_once "userModel.php";
   //metodo php
   session_start();
	
	if (isset($_POST['idUsuario'], $_POST['password'])){
		$usuarioModel = new UserModel();

		$idUsuario=$_POST['idUsuario'];
		$salt = '$2a$07$CryptIngnovarqSASConstructora$';
		$password = crypt ($_POST['password'], $salt);
		
		$usuario = $usuarioModel->view_db_user($idUsuario);
		/*
		 * hash_equals comparar crypt
		 */
		if ($usuario!= null && hash_equals($password, $usuario['passwordUsuario'])){
			$_SESSION['idUsuario']=$idUsuario;
			$_SESSION['nombreUsuario']=$usuario['nombreUsuario'];
			$_SESSION['apellidoUsuario']=$usuario['apellidoUsuario'];
			$_SESSION['superAdminUsuario']=$usuario['superAdminUsuario'];
				header("location:../view/perfil");
		}
		else
		{
			?>
				<!DOCTYPE html>
				<html>
				<head>
					<link href="../../css/jquery.alerts.css" rel="StyleSheet" type="text/css" />
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
					<script src="../../js/jquery.ui.draggable.js" type="text/javascript"></script>
					<script src="../../js/jquery.alerts.mod.js" type="text/javascript"></script>
				</head>
				<body>
					<script type="text/javascript">
						jMessage('Parece ser que no estás registrado en la base de datos. :(', 'Error :(', function(r) {
							window.location="../view/administrador"
						});
					</script>
				</body>
				</html>

			<?php
		}
	}
	else
		header("location:../view/error");
?>