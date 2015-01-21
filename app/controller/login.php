<?php
	session_start();
	$mensaje = null;
	if (isset($_POST["ajax"], $_POST['idUsuario'], $_POST['password'])){
	    $idUsuario = htmlspecialchars($_POST["idUsuario"]);
	    $password = htmlspecialchars($_POST["password"]);

	    if ($idUsuario == ''){
        	$mensaje = "<script>document.getElementById('e_idUsuario').innerHTML='El campo usuario es requerido.';</script>";
    	}
    	else if($password == ''){
    		$mensaje = "<script>document.getElementById('e_password').innerHTML='El campo contraseña es requerido.';</script>";
    	}
    	else{ // si ha escito el id del usuario y el password, procedo a verificar en la base de datos.
    		require_once ("userModel.php");
    		require_once ("notificaciones.php");
			$usuarioModel = new UserModel(); // Conecto a la bd
			$salt = '$2a$07$CryptIngnovarqSASConstructora$';
			$password = crypt ($_POST['password'], $salt); // encripto la contraseña enviada
			
			$usuario = $usuarioModel->view_db_user($idUsuario); // consulto a la bd por la cedula del usuario
			/*
			 * hash_equals comparar crypt, comparo las dos contraseñas (escrita y consultada)
			 */
			if ($usuario != null && $password == $usuario['passwordUsuario']){
				$_SESSION['idUsuario']=$idUsuario;
				$_SESSION['nombreUsuario']=$usuario['nombreUsuario'];
				$_SESSION['apellidoUsuario']=$usuario['apellidoUsuario'];
				$_SESSION['superAdminUsuario']=$usuario['superAdminUsuario'];
				$_SESSION['primer_inicio'] = 1;
				$mensaje = "<script type='text/javascript'>
							document.location='perfil'; 
							</script>";						
			}
			else{
				 $mensaje = get_error_login(); // envio el mensaje de error de inicio de sesión.
			}
		}
	}
	echo $mensaje;
?>