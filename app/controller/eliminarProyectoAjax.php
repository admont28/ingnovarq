<?php
    session_start();
     if(!isset($_POST['idProyecto'], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("notificaciones.php");
    $mensaje = get_error_delete_project(); // mensaje por defecto de error por si no se cumplen los if

    if(isset($_POST['idProyecto'])){
        require_once ("projectModel.php");
        require_once ("imagenModel.php");
        $idProyecto = htmlspecialchars($_POST["idProyecto"]);
        $projectModel = new ProjectModel();
        $imagenModel = new ImagenModel();
        $existente = $projectModel->view_db_project($idProyecto); // consulto para saber si existe el proyecto

        if($existente != null){ // si existe lo elimino y notifico
            $imagenesProyecto = $projectModel->view_db_img_project($idProyecto); // consulto las imagenes asociadas al proyecto
            // Recorro todas las imagenes para eliminarlas tanto de la bd como de la carpeta donde se encuentren.

            foreach ($imagenesProyecto as $fila) {
                if(file_exists($fila['rutaImagen'])){ //Verifico si existe la imagen
                    if(unlink($fila['rutaImagen'])){  // elimino la imagen
                        $imagenModel->delete_db_image_project($idProyecto,$fila['rutaImagen']); // elimino de la bd la imagen
                    }
                }
            }
            $resultado = $projectModel->delete_db_project($idProyecto);
            
            if($resultado){
                rmdir("../../images/proyectos/".$existente['nombreProyecto']);
                $mensaje =  get_success_delete_project($existente['nombreProyecto']); // envio el mensaje alojado en notificaciones
            }
        }
    }
echo $mensaje;
?>