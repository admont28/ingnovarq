<?php
    session_start();
     if(!isset($_POST["cedulaUsuario"], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }
    require_once ("notificaciones.php");
    $mensaje = get_error_delete_user(); // mensaje por defecto de error por si no se cumplen los if

    if(isset($_POST['cedulaUsuario'])){
        require_once ("userModel.php");
        $cedulaUsuario = htmlspecialchars($_POST["cedulaUsuario"]);
        $userModel = new UserModel();
        $existente = $userModel->view_db_user($cedulaUsuario); // consulto para saber si existe el usuario

        if($existente != null){ // si existe lo elimino y notifico
            $resultado = $userModel->delete_db_user($cedulaUsuario);
            if($resultado){
                $mensaje =  get_success_delete_user($cedulaUsuario); // envio el mensaje alojado en notificaciones
            }
        }
    }

echo $mensaje;
?>