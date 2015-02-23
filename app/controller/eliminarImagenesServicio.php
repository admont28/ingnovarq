<?php
session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }
    if(isset($_POST["op"], $_POST['name'], $_POST['idServicio']) && $_POST["op"] == "delete" && !empty($_POST['name']) && !empty($_POST['idServicio'])){
	    require_once ("serviceModel.php");
		require_once ("imagenModel.php");
		require_once ("notificaciones.php");
		$serviceModel = new ServiceModel();
		$imagenModel = new ImagenModel();
		$
		$idServicio = htmlspecialchars($_POST['idServicio']);
	    $servicio = $serviceModel->view_db_service($idServicio);
		$directorioDeGuardado = "../../images/servicios/".$servicio['nombreServicio']."/";
		$nombreArchivo = htmlspecialchars($_POST['name']);
		$nombreArchivo = str_replace("..",".",$nombreArchivo); //required. if somebody is trying parent folder files	
		$fullPath = $directorioDeGuardado.$nombreArchivo;
		if (file_exists($fullPath)){
			$imagenModel->delete_db_image_service($idServicio, $fullPath);
	        unlink($fullPath);
	        echo get_success_delete_image_service($nombreArchivo);
	        die();
	    }
		echo get_error_delete_image_service($nombreArchivo);
	}
?>