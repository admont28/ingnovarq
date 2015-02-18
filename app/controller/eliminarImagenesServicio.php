<?php
session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            print_r($_SESSION);
    }
    if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']) && isset($_POST['idServicio'])){
	    require_once ("serviceModel.php");
		require_once ("imagenModel.php");
		$serviceModel = new ServiceModel();
		$imagenModel = new ImagenModel();
		$idServicio = $_POST['idServicio'];
	    $servicio = $serviceModel->view_db_service($idServicio);
		$output_dir = "../../images/servicios/".$servicio['nombreServicio']."/";
		
			$fileName =$_POST['name'];
			$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
			$filePath = $output_dir. $fileName;
			echo $filePath;
			if (file_exists($filePath)) 
			{
				echo $filePath;
				$imagenModel->delete_db_image_service($idServicio, $filePath);
		        unlink($filePath);
		    }
			echo "Deleted File ".$fileName."<br>";
	}
?>