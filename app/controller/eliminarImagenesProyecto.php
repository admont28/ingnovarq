<?php
	session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }
    if(isset($_POST["op"], $_POST['name'], $_POST['idProyecto']) && $_POST["op"] == "delete" && !empty($_POST['name']) && !empty($_POST['idProyecto'])){
	    require_once ("projectModel.php");
		require_once ("imagenModel.php");
		require_once ("notificaciones.php");
		$projectModel         = new ProjectModel();
		$imagenModel          = new ImagenModel();
		$idProyecto           = htmlspecialchars($_POST['idProyecto']);
		$proyecto             = $projectModel->view_db_project($idProyecto);
		$directorioDeGuardado = "../../images/proyectos/".$proyecto['nombreProyecto']."/";
		$nombreArchivo        = htmlspecialchars($_POST['name']);
		$nombreArchivo        = str_replace("..",".",$nombreArchivo); //required. if somebody is trying parent folder files	
		$fullPath             = $directorioDeGuardado. $nombreArchivo;
		if (file_exists($fullPath)){				
			$imagenModel->delete_db_image_project($idProyecto, $fullPath);
	        unlink($fullPath);
	        echo get_success_delete_image_project($nombreArchivo);
        	die();
	    }
		echo get_error_delete_image_service_or_project($nombreArchivo);
	}
?>