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
		*hash_equals comparar crypt
		*/
		if (hash_equals($password, $usuario['passwordUsuario'])){
			$_SESSION['idUsuario']=$idUsuario;
			$_SESSION['nombreUsuario']=$usuario['nombreUsuario'];
			$_SESSION['apellidoUsuario']=$usuario['apellidoUsuario'];
			header("location:../view/perfil");
		}
		else
		{
			echo "<script type='text/javascript'>
			alert('Parece ser que no est\u00E1s registrado en la base de datos'); 
			document.location.href='../view/administrador';
			</script>";
		}
	}
?>