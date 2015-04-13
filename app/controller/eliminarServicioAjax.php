<?php
    session_start();
     if(!isset($_POST['idServicio'], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) ){
            header('location: error');
    }
    require_once ("notificaciones.php");
    $mensaje = get_error_delete_service(); // mensaje por defecto de error por si no se cumplen los if

    if(isset($_POST['idServicio'])){
        require_once ("serviceModel.php");
        require_once ("imagenModel.php");
        $idServicio = htmlspecialchars($_POST["idServicio"]);
        $serviceModel = new ServiceModel();
        $imagenModel = new ImagenModel();
        $existente = $serviceModel->view_db_service($idServicio); // consulto para saber si existe el Servicio

        if($existente != null){ // si existe lo elimino y notifico
            $imagenesServicio = $serviceModel->view_db_img_service($idServicio); // consulto las imagenes asociadas al Servicio
            // Recorro todas las imagenes para eliminarlas tanto de la bd como de la carpeta donde se encuentren.
            foreach ($imagenesServicio as $fila) {
                if(file_exists($fila['rutaImagen'])){ //Verifico si existe la imagen
                    if(unlink($fila['rutaImagen'])) // elimino la imagen
                        $imagenModel->delete_db_image_service($idServicio,$fila['rutaImagen']); // elimino de la bd la imagen
                }
            }
            $resultado = $serviceModel->delete_db_service($idServicio);
            if($resultado){
                rmdir("../../images/servicios/".$existente['nombreServicio']);
                $mensaje =  get_success_delete_service($existente['nombreServicio']); // envio el mensaje alojado en notificaciones
            }
        }
    }
echo $mensaje;
?>