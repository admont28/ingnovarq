<?php
session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            print_r($_SESSION);
    }
    echo ("llego aca");
    if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']) && isset($_POST['idServicio'])){
	    require_once ("serviceModel.php");
		require_once ("imagenModel.php");
		require_once ("notificaciones.php");
		$serviceModel = new ServiceModel();
		$imagenModel = new ImagenModel();
		$idServicio = $_POST['idServicio'];
	    $servicio = $serviceModel->view_db_service($idServicio);
		$output_dir = "../../images/servicios/".$servicio['nombreServicio']."/";
		
			$fileName =$_POST['name'];
			$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
			$filePath = $output_dir. $fileName;
			if (file_exists($filePath)) 
			{
				$imagenModel->delete_db_image_service($idServicio, $filePath);
				echo ("llego aca");
		        unlink($filePath);
		        echo get_success_delete_image_service($fileName);
		        die();

		    }
			echo get_error_delete_image_service($fileName);
	}
?>