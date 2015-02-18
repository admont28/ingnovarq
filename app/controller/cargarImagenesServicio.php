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
    	require_once ("serviceModel.php");
        require_once ("imagenModel.php");
        $serviceModel = new ServiceModel();
        $idServicio = $_POST['idServicio'];        
        $consulta = $serviceModel->view_db_service($idServicio);
        if($consulta != null){
        	$imagenModel = new ImagenModel(); 
        	$ruta = "../../images/servicios/".$consulta['nombreServicio']."/";
        	if(is_dir($ruta)){
	            $fileName = $_FILES["myfile"]["name"];
	            if (move_uploaded_file($_FILES["myfile"]["tmp_name"],$ruta.$fileName)){
	                $respuesta = $imagenModel->insert_images_service($ruta.$fileName, $fileName, $idServicio);
	                echo $respuesta;
	                die();
	            }
	            else{
	                $mensaje = get_error_insert_image($fileName);
	                echo $mensaje;
	                die();
	            }
        	}
        }
    }


?>