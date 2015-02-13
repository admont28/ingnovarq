<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("projectModel.php");
    $mensajes = array();
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
            echo $mensaje;
            die();
        }
    }
    else if(sizeof($_POST) == 4 && isset($_POST['idProyecto'], $_POST['nombreProyecto'], $_POST['descripcionProyecto'], $_POST['fecha']) ){
        require_once ("notificaciones.php");
        $idProyecto = htmlspecialchars($_POST['idProyecto']);
        $nombreProyecto = htmlspecialchars($_POST['nombreProyecto']);
        $descripcionProyecto = htmlspecialchars($_POST['descripcionProyecto']);
        $fechaProyecto = htmlspecialchars($_POST['fecha']);
        $error = false;
        if($nombreProyecto == ''){
            $mensajes[] = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El campo nombre es requerido.';</script>";
            $error = true;
        }
        else if(strlen($nombreProyecto) < 3){
            $mensajes[] = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
            $error = true;
        }
        else if(strlen($nombreProyecto) > 45){
            $mensajes[] = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
            $error = true;
        }
        if($descripcionProyecto == ''){
            $mensajes[] = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo descripción es requerido.';</script>";
            $error = true;
        }
        else if(strlen($descripcionProyecto) < 5){
            $mensajes[] = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&iacute;nimo permitido son 5 caracteres';</script>";
            $error = true;
        }
        else if(strlen($descripcionProyecto) > 140){
            $mensajes[] = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&aacute;ximo permitido son 140 caracteres';</script>";
            $error = true;
        }
        if($fechaProyecto == null || $fechaProyecto == ''){
            $mensajes[] = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha es requerido.';</script>";
            $error = true;
        }
        else if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaProyecto)){
            $mensajes[] = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha no cumple con el formato solicitado.';</script>";
            $error = true;
        }
        if(!$error){ 
            $projectModel = new ProjectModel();
            $proyectoActual = $projectModel->view_db_project($idProyecto);
            $consulta = $projectModel->update_db_project($nombreProyecto, $descripcionProyecto, $fechaProyecto, $idProyecto);
            if($proyectoActual['nombreProyecto'] != $nombreProyecto){
                require_once ("imagenModel.php");
                $rutaAntiguaProyecto = "../../images/proyectos/".$proyectoActual['nombreProyecto']."/";
                $rutaNuevaProyecto = "../../images/proyectos/".$nombreProyecto."/";
                rename($rutaAntiguaProyecto, $rutaNuevaProyecto); // renombro el directorio del proyecto
                $imagenModel = new ImagenModel();
                $imagenesProyecto = $imagenModel->view_images_db_project($idProyecto);
                $tamañoNombre = 24+strlen($proyectoActual['nombreProyecto']); // capturo el tamaño para extraer el nombre de la imagen solamente
                foreach ($imagenesProyecto as $fila) {
                    $nombreImagen = substr($fila['rutaImagen'], $tamañoNombre); // extraigo el nombre de la imagen
                    $nuevaRutaImagen = $rutaNuevaProyecto.$nombreImagen; // creo la nueva ruta de la imagen
                    $imagenModel->update_db_path_image($nuevaRutaImagen, $fila['idImagen']); // actualizo la ruta de la imagen segun el nuevo nombre del proyecto
                }
            }
            if($consulta){
                $mensajes[] = get_success_edit_project(); // obtengo el mensaje de que todo ha salido bien.
            }
            else
                $mensajes[] = get_error_edit_project(); // mensaje de error
        }
        echo json_encode($mensajes);
        die();
    }
?>