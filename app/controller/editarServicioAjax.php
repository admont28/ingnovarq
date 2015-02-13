<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("serviceModel.php");
    $mensajes = array();
    if(sizeof($_POST) == 1 && isset($_POST['idServicio'])){
        $idServicio = $_POST['idServicio'];
        $serviceModel = new ServiceModel();
        $consulta = $serviceModel->view_db_service($idServicio);
        if($consulta != null){
            $nombreServicio = $consulta['nombreServicio'];
            $descripcionServicio = $consulta['descripcionServicio'];
            $fechaServicio = $consulta['fechaCreacionServicio'];
            $mensaje = "<script> 
                            document.getElementById('nombreServicio').value='".$nombreServicio."';
                            document.getElementById('idServicio').value='".$idServicio."';
                            document.getElementById('descripcionServicio').value='".$descripcionServicio."';  
                            document.getElementById('fecha').value='".$fechaServicio."';            
                        </script>";
            echo $mensaje;
            die();
        }
    }
    else if(sizeof($_POST) == 4 && isset($_POST['idServicio'], $_POST['nombreServicio'], $_POST['descripcionServicio'], $_POST['fecha']) ){
        require_once ("notificaciones.php");
        $idServicio = htmlspecialchars($_POST['idServicio']);
        $nombreServicio = htmlspecialchars($_POST['nombreServicio']);
        $descripcionServicio = htmlspecialchars($_POST['descripcionServicio']);
        $fechaServicio = htmlspecialchars($_POST['fecha']);
        $error = false;
        if($nombreServicio == ''){
            $mensajes[] = "<script>document.getElementById('e_nombre_servicio').innerHTML='El campo nombre es requerido.';</script>";
            $error = true;
        }
        else if(strlen($nombreServicio) < 3){
            $mensajes[] = "<script>document.getElementById('e_nombre_servicio').innerHTML='El m&iacute;nimo permitido son 3 caracteres.';</script>";
            $error = true;
        }
        else if(strlen($nombreServicio) > 45){
            $mensajes[] = "<script>document.getElementById('e_nombre_servicio').innerHTML='El m&aacute;ximo permitido son 45 caracteres.';</script>";
            $error = true;
        }
        if($descripcionServicio == ''){
            $mensajes[] = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El campo descripción es requerido.';</script>";
            $error = true;
        }
        else if(strlen($descripcionServicio) < 5){
            $mensajes[] = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El m&iacute;nimo permitido son 5 caracteres.';</script>";
            $error = true;
        }
        else if(strlen($descripcionServicio) > 65535){
            $mensajes[] = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El m&aacute;ximo permitido son 65535 caracteres.';</script>";
            $error = true;
        }
        if($fechaServicio == null || $fechaServicio == ''){
            $mensajes[] = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha es requerido.';</script>";
            $error = true;
        }
        else if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaServicio)){
            $mensajes[] = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha no cumple con el formato solicitado.';</script>";
            $error = true;
        }
        if(!$error){ 
            $serviceModel = new ServiceModel();
            $servicioActual = $serviceModel->view_db_service($idServicio);
            $consulta = $serviceModel->update_db_service($nombreServicio, $descripcionServicio, $fechaServicio, $idServicio);
            if($servicioActual['nombreServicio'] != $nombreServicio){
                require_once ("imagenModel.php");
                $rutaAntiguaServicio = "../../images/servicios/".$servicioActual['nombreServicio']."/";
                $rutaNuevaServicio = "../../images/servicios/".$nombreServicio."/";
                rename($rutaAntiguaServicio, $rutaNuevaServicio); // renombro el directorio del proyecto
                $imagenModel = new ImagenModel();
                $imagenesServicio = $imagenModel->view_images_db_service($idServicio);
                $tamañoNombre = 24+strlen($servicioActual['nombreServicio']); // capturo el tamaño para extraer el nombre de la imagen solamente
                foreach ($imagenesServicio as $fila) {
                    $nombreImagen = substr($fila['rutaImagen'], $tamañoNombre); // extraigo el nombre de la imagen
                    $nuevaRutaImagen = $rutaNuevaServicio.$nombreImagen; // creo la nueva ruta de la imagen
                    $imagenModel->update_db_path_image($nuevaRutaImagen, $fila['idImagen']); // actualizo la ruta de la imagen segun el nuevo nombre del proyecto
                }
            }
            if($consulta)
                $mensajes[] = get_success_edit_service(); // obtengo el mensaje de que todo ha salido bien.
            else
                $mensajes[] = get_error_edit_service(); // mensaje de error
        }
        echo json_encode($mensajes);
        die();
    }
?>