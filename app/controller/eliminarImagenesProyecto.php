<?php
session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }
    if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']) && isset($_POST['idProyecto'])){
	    require_once ("projectModel.php");
		require_once ("imagenModel.php");
		require_once ("notificaciones.php");
		$projectModel = new ProjectModel();
		$imagenModel = new ImagenModel();
		$idProyecto = $_POST['idProyecto'];
	    $proyecto = $projectModel->view_db_project($idProyecto);
		$output_dir = "../../images/proyectos/".$proyecto['nombreProyecto']."/";
		
			$fileName =$_POST['name'];
			$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
			$filePath = $output_dir. $fileName;
			echo $filePath;
			if (file_exists($filePath)) 
			{				
				$imagenModel->delete_db_image_project($idProyecto, $filePath);
		        unlink($filePath);
		        echo get_success_delete_image_project($fileName);
	        	die();
		    }
			echo "Deleted File ".$fileName."<br>";
	}
?>