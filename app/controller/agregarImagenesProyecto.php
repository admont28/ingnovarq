<?php
 session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }      
    require_once ("notificaciones.php");
    $mensaje =  "";
    
    if(sizeof($_POST) == 1 && isset($_POST['idProyecto'])){
    	
    	 $idProyecto = $_POST['idProyecto'];
    	 $mensaje = "<script>                              
                            document.getElementById('idProyectoImg').value='".$idProyecto."';            
                     </script>";
         echo $mensaje;
         die();
    }else if(sizeof($_POST) == 1 && isset($_POST['idProyectoImag']) && sizeof($_FILES)==0){
    	
    	 $mensaje = get_success_insert_images_project();
         $respuesta = array('mensaje' => $mensaje, 'estado' => 'success');
         echo json_encode($respuesta);
         die();
    }else if(isset($_FILES)){
    	echo "lo que paso paso";
		require_once ("projectModel.php");
        require_once ("imagenModel.php");
        $projectModel = new ProjectModel();
        $idProyecto = $_POST['idProyectoImag'];        
        $consulta = $projectModel->view_db_project($idProyecto);
        if($consulta != null){
        	$imagenModel = new ImagenModel(); 
        	$ruta = "../../images/proyectos/".$consulta['nombreProyecto']."/";
        	if(is_dir($ruta)){
	            $fileName = $_FILES["myfile"]["name"];
	            if (move_uploaded_file($_FILES["myfile"]["tmp_name"],$ruta.$fileName)){
	                $respuesta = $imagenModel->insert_images_project($ruta.$fileName, $fileName, $idProyecto);
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
$mensaje = get_error_insert_image($fileName);
$respuesta = array('mensaje' => $mensaje, 'estado' => 'fail');
echo json_encode($respuesta);
die();
?>