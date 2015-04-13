<?php
	session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    if(sizeof($_POST) == 1 && isset($_POST['idServicio'])){
	    require_once ("serviceModel.php");
		$serviceModel = new ServiceModel();
		$idServicio   = htmlspecialchars($_POST['idServicio']);
		$servicio     = $serviceModel->view_db_service($idServicio);
		$rutaServicio = "../../images/servicios/".$servicio['nombreServicio'];
		$ret          = array('rutaServicio' => $rutaServicio);
	    echo str_replace('\\/', '/', json_encode($ret));
	    die();
    }
    else if(sizeof($_POST) == 2 && isset($_POST['idServicio'], $_POST['getUrls'])){
    	require_once ("serviceModel.php");
        $serviceModel   = new ServiceModel();
        $idServicio     = htmlspecialchars($_POST['idServicio']);
        $servicioActual = $serviceModel->view_db_service($idServicio);
        $rutas          = $serviceModel->view_db_img_service($idServicio);
        $tamañoNombre   = 24+strlen($servicioActual['nombreServicio']); // capturo el tamaño para extraer el nombre de la imagen solamente
        $ret            = array();
        foreach ($rutas as $fila) {
            $ret[] = substr($fila['rutaImagen'], $tamañoNombre); // extraigo el nombre de la imagen
        }
        echo json_encode($ret);
        die();
    }
    else if(isset($_FILES) && isset($_POST['idServicio'], $_POST['cargar'])){
    	require_once ("serviceModel.php");
        require_once ("imagenModel.php");
		$serviceModel = new ServiceModel();
		$idServicio   = $_POST['idServicio'];        
		$consulta     = $serviceModel->view_db_service($idServicio);
        if($consulta != null){
        	$imagenModel = new ImagenModel(); 
        	$ruta = "../../images/servicios/".$consulta['nombreServicio']."/";
        	if(is_dir($ruta)){
	            $fileName = $_FILES["myfile"]["name"];
	            $fullPath = $ruta.$fileName;
	            if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$fullPath)){
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