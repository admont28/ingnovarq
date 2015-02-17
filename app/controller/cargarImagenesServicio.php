<?php
	session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            print_r($_SESSION);
    }
    if(sizeof($_POST) == 1 && isset($_POST['idServicio'])){
	    require_once ("serviceModel.php");
	    $serviceModel = new ServiceModel();
	    $idServicio = htmlspecialchars($_POST['idServicio']);
	    $servicio = $serviceModel->view_db_service($idServicio);
     	$rutaServicio = "../../images/servicios/".$servicio['nombreServicio'];
	    $files = scandir($rutaServicio);
	    $ret= array('rutaServicio' => $rutaServicio);

	    echo str_replace('\\/', '/', json_encode($ret));
	    die();
    }
    else if(sizeof($_POST) == 1 && isset($_POST['rutaServicio'])){
    	$dir=htmlspecialchars($_POST['rutaServicio']);
		$files = scandir($dir);

		$ret= array();
		foreach($files as $file)
		{
			if($file == "." || $file == "..")
				continue;
			//$ruta = "../../images/servicios/Servicio/".$file;
			$ret[]=$file;
		}

		//echo str_replace('\\/', '/', json_encode($ret));
		echo json_encode($ret);
		die();
    }
    else if(isset($_FILES) && isset($_POST['idServicio'], $_POST['cargar'])){
    	print_r($_POST);
    	print_r($_FILES);
    }


?>