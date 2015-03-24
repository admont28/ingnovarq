<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) ||  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die('bad request');
    }
    require_once ("notificaciones.php");
    require_once ("clientModel.php");
    $mensaje = get_error_edit_client();
    if(sizeof($_POST) == 1 && isset($_POST['idCliente'])){
        $idCliente = $_POST['idCliente'];
        $clientModel = new ClientModel();
        $consulta = $clientModel->view_db_client($idCliente);
        if($consulta != null){
            $nombreCliente = $consulta['nombreCliente'];
            $mensaje = "<script> 
                            document.getElementById('nombreCliente').value='".$nombreCliente."';
                            document.getElementById('idCliente').value='".$idCliente."';
                        </script>";
        }
    }
    else if(sizeof($_POST) == 2 && isset($_POST['idCliente'], $_POST['nombreCliente'])){
        require_once ("imagenModel.php");
    	$idCliente = htmlspecialchars($_POST['idCliente']);
    	$clientModel = new ClientModel();
        $imagenModel = new ImagenModel();
    	$consulta = $clientModel->view_db_client($idCliente);
    	if($consulta != null){
	    	if (isset($_FILES["myfile"])) {
	    		$directorioDeGuardado = "../../images/clientes/";
				$error =$_FILES["myfile"]["error"];	
				if(!is_array($_FILES["myfile"]["name"])) //verifico si es un solo archivo.
				{
                    $imagenCliente = $imagenModel->view_image_db_client($consulta['idCliente']);
	        		$rutaImagenConsulta = $imagenCliente['rutaImagen'];
	        		if (file_exists($rutaImagenConsulta)){ //verifico que exista la imagen anterior
				        unlink($rutaImagenConsulta); // elimino la imagen anterior
				        $nombreArchivo = $_FILES["myfile"]["name"]; //capturo el nombre del archivo cargado
				        $fullPath = $directorioDeGuardado.$nombreArchivo; // construyo la ruta completa donde se guardará el archivo.
				        $resultado = $imagenModel->update_db_path_image($fullPath, $imagenCliente['idImagen']); //actualizo la ruta en la bd
				        if($resultado){ // si es exitosa la actualización, muevo el archivo cargado a la ruta completa
					 		move_uploaded_file($_FILES["myfile"]["tmp_name"], $fullPath); //muevo el archivo cargado
				        }
				    }
				}
	    	}
	    	$nombreCliente = $_POST['nombreCliente']; //nombre del cliente
        	$nombreCliente = htmlspecialchars($nombreCliente, ENT_NOQUOTES); //evito ataques XSS
        	$resultado = $clientModel->update_db_client($idCliente, $nombreCliente); //actualizo el nombre del cliente
        	if($resultado){
        		$mensaje = get_success_edit_client(); // obtengo el mensaje de que todo ha salido bien.
        	}
        }
    }

echo $mensaje; 
?>