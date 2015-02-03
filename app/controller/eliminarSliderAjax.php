<?php
    session_start();
     if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("notificaciones.php");
    $mensaje = get_error_delete_image_slider(); // mensaje por defecto de error por si no se cumplen los if
    print_r($_POST);
    if(sizeof($_POST) == 1 && isset($_POST['idImagen'])) {
        require_once ("sliderModel.php");
        $idImagen = htmlspecialchars($_POST["idImagen"]);
        $sliderModel = new sliderModel();
        $existente = $sliderModel->view_db_image($idImagen); // consulto para saber si existe la imagen

        if($existente != null){ // si existe la elimino y notifico
            if(file_exists($existente['rutaImagen'])){ //Verifico si existe la imagen
                if(unlink($existente['rutaImagen'])) {  // elimino la imagen
                    $resultado = $sliderModel->delete_db_image_slider($idImagen); // elimino de la bd la imagen
                    if($resultado){
                    	$mensaje = get_success_delete_image_slider($existente['tituloImagen']); // envio el mensaje alojado en notificaciones
                    }
                }
            }
        }
    }
echo $mensaje;
?>