<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("notificaciones.php");
    require_once ("sliderModel.php");
    $mensaje = get_error_edit_image_slider();
    print_r($_POST);
    print_r($_FILES);
    if(sizeof($_POST) == 1 && isset($_POST['idImagen'])){
        $idImagen = $_POST['idImagen'];
        $sliderModel = new SliderModel();
        $consulta = $sliderModel->view_db_image($idImagen);
        if($consulta != null){
            $tituloImagen = $consulta['tituloImagen'];
            $mensaje = "<script> 
                            document.getElementById('tituloImagen').value='".$tituloImagen."';
                            document.getElementById('idImagen').value='".$idImagen."';
                        </script>";
        }
    }
    else if(sizeof($_POST) == 2 && isset($_POST['idImagen'], $_POST['tituloImagen'])){
    	$idImagen = $_POST['idImagen'];
    	$sliderModel = new SliderModel();
    	$consulta = $sliderModel->view_db_image($idImagen);
    	if($consulta != null){
	    	if (isset($_FILES["myfile"])) {
	    		$directorioDeGuardado = "../../images/slide/";
				$ret = array();
			//	This is for custom errors;	
			/*	$custom_error= array();
				$custom_error['jquery-upload-file-error']="File already exists";
				echo json_encode($custom_error);
				die();
			*/
				$error =$_FILES["myfile"]["error"];
				//You need to handle  both cases
				//If Any browser does not support serializing of multiple files using FormData() 
				if(!is_array($_FILES["myfile"]["name"])) //verifico si es un solo archivo.
				{
	        		$rutaImagenConsulta = $consulta['rutaImagen'];
	        		if (file_exists($rutaImagenConsulta)){ //verifico que exista la imagen anterior
				        unlink($rutaImagenConsulta); // elimino la imagen anterior
				        $nombreArchivo = $_FILES["myfile"]["name"]; //capturo el nombre del archivo cargado
				        $fullPath = $directorioDeGuardado.$nombreArchivo; // construyo la ruta completa donde se guardará el archivo.
				        $resultado = $sliderModel->update_db_dir_image_slider($idImagen, $fullPath); //actualizo la ruta en la bd
				        if($resultado){ // si es exitosa la actualización, muevo el archivo cargado a la ruta completa
					 	 	/*if (!is_dir($uploaddir)) {
				   				mkdir($uploaddir);
							}*/
					 		move_uploaded_file($_FILES["myfile"]["tmp_name"], $fullPath); //muevo el archivo cargado
					    	$ret[]= $nombreArchivo;
				        }
				    }
				}
	    	}
	    	$tituloImagen = $_POST['tituloImagen']; //titulo de la imagen cargada
        	$tituloImagen = htmlspecialchars($tituloImagen, ENT_NOQUOTES); //evito ataques XSS
        	$resultado = $sliderModel->update_db_title_image_slider($idImagen, $tituloImagen); //actualizo el titulo de la imagen
        	if($resultado){
        		$mensaje = get_success_edit_image_slider(); // obtengo el mensaje de que todo ha salido bien.
        	}
        }
    }

echo $mensaje; 
?>