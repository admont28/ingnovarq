<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }

    if(!(isset($_POST["ajaxMision"])) && !(isset($_POST['ajaxVision'])) && !(isset($_POST['ajaxFilosofia'])) ){
        header('location: error');
    }
    require_once ("notificaciones.php");
    require_once ("empresaModel.php");

    $mensaje = get_error_edit_user();
    $empresaModel = new EmpresaModel();

    if(isset($_POST['ajaxMision'])){
        $mision = htmlentities($_POST["mision"], ENT_QUOTES, "UTF-8");
        $mision = str_replace(array("\r\n", "\r", "\n"), "<br />", $mision);
        $respuesta = $empresaModel->update_mision($mision);
        if($respuesta)
            $mensaje = get_success_edit_empresa('misión');
        else
            $mensaje = get_error_edit_empresa('misión');
    }
    
    else if(isset($_POST['ajaxVision'])){
        $vision = htmlentities($_POST["vision"], ENT_QUOTES, "UTF-8");
        $vision = str_replace(array("\r\n", "\r", "\n"), "<br />", $vision);
        $respuesta = $empresaModel->update_vision($vision);
        if($respuesta)
            $mensaje = get_success_edit_empresa('visión');
        else
            $mensaje = get_error_edit_empresa('visión');
    }

    else if(isset($_POST['ajaxFilosofia'])){
        $filosofia = htmlentities($_POST["filosofia"], ENT_QUOTES, "UTF-8");
        $filosofia = str_replace(array("\r\n", "\r", "\n"), "<br />", $filosofia);
        $respuesta = $empresaModel->update_filosofia($filosofia);
        if($respuesta)
            $mensaje = get_success_edit_empresa('filosofía');
        else
            $mensaje = get_error_edit_empresa('filosofía');
    }

echo $mensaje;
?>