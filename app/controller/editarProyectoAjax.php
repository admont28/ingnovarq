<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }

    if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) ||  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die('bad request');
    }

    require_once ("notificaciones.php");
    require_once ("projectModel.php");
    if(!(sizeof($_POST) == 1 && isset($_POST['idProyecto']))  && ($_POST['idProyecto'] == '' || $_POST['nombreProyecto'] == '' || $_POST['descripcionProyecto'] == '' || $_POST['fecha'] == '')){
        $mensaje = get_error_edit_project();
        $nombreProyecto = htmlspecialchars($_POST['nombreProyecto']);
        $descripcionProyecto = htmlspecialchars($_POST['descripcionProyecto']);
        $fechaProyecto = $_POST['fecha'];
        if($nombreProyecto == ''){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El campo nombre es requerido.';</script>";
        }
        if($descripcionProyecto == ''){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo descripción es requerido.';</script>";
        }
        if($fechaProyecto == null){
            $mensaje = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha es requerido.';</script>";
        }
    }else{

        if(sizeof($_POST) == 1 && isset($_POST['idProyecto'])){
            $idProyecto = $_POST['idProyecto'];
            $projectModel = new ProjectModel();
            $consulta = $projectModel->view_db_project($idProyecto);
            if($consulta != null){
                $nombreProyecto = $consulta['nombreProyecto'];
                $descripcionProyecto = $consulta['descripcionProyecto'];
                $fechaProyecto = $consulta['fechaCreacionProyecto'];
                $mensaje = "<script> 
                                document.getElementById('nombreProyecto').value='".$nombreProyecto."';
                                document.getElementById('idProyecto').value='".$idProyecto."';
                                document.getElementById('descripcionProyecto').value='".$descripcionProyecto."';  
                                document.getElementById('fecha').value='".$fechaProyecto."';            
                            </script>";
            }
        }
        else if(sizeof($_POST) > 1 && isset($_POST['idProyecto'], $_POST['nombreProyecto'], $_POST['descripcionProyecto'], $_POST['fecha'])){
        	
            $idProyecto = $_POST['idProyecto'];
            $nombreProyecto = $_POST['nombreProyecto'];
            $descripcionProyecto = $_POST['descripcionProyecto'];
            $fechaProyecto = $_POST['fecha'];
            $projectModel = new ProjectModel();
        	$consulta = $projectModel->update_db_project($nombreProyecto, $descripcionProyecto, $fechaProyecto, $idProyecto);
        	if($consulta){
    	    	
            		$mensaje = get_success_edit_project(); // obtengo el mensaje de que todo ha salido bien.
            	
            }
        }
        else{
            $nombreProyecto = htmlspecialchars($_POST['nombreProyecto']);
            $descripcionProyecto = htmlspecialchars($_POST['descripcionProyecto']);
            $fechaProyecto = $_POST['fecha'];
            if($nombreProyecto == ''){
                $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El campo nombre es requerido.';</script>";
            }
            if($descripcionProyecto == ''){
                $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo descripción es requerido.';</script>";
            }
            if($fechaProyecto == null){
                $mensaje = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha es requerido.';</script>";
            }
        }
    }

echo $mensaje; 
?>