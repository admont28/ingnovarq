<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }      
    require_once ("notificaciones.php");
    $mensaje =  "";
    if (sizeof($_POST) == 3 && isset($_POST['nombreServicio'], $_POST['descripcionServicio'], $_POST['fechaServicio'])) {
        $nombreServicio = htmlspecialchars($_POST["nombreServicio"]);
        $descripcionServicio = htmlspecialchars($_POST["descripcionServicio"]);
        $fechaServicio=$_POST['fechaServicio'];
         
        if ($nombreServicio == '' ){
            $mensaje = "<script>document.getElementById('e_nombre_servicio').innerHTML='El campo nombre es requerido.';</script>";
        }
        else if(!preg_match('/^[0-9a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombreServicio)){
            $mensaje = "<script>document.getElementById('e_nombre_servicio').innerHTML='Error, s&oacute;lo se permiten letras, n&uacute;meros y acentos latinos.';</script>";
        }
        else if(strlen($nombreServicio) < 3){
            $mensaje = "<script>document.getElementById('e_nombre_servicio').innerHTML='El m&iacute;nimo permitido son 3 caracteres.';</script>";
        }
        else if(strlen($nombreServicio) > 45){
            $mensaje = "<script>document.getElementById('e_nombre_servicio').innerHTML='El m&aacute;ximo permitido son 45 caracteres.';</script>";
        }
        else if ($descripcionServicio == null || $descripcionServicio == '' ){
            $mensaje = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El campo descripci&oacute;n es requerido.';</script>";
        }
        else if(strlen($descripcionServicio) < 5){
            $mensaje = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El m&iacute;nimo permitido son 5 caracteres.';</script>";
        }
        else if(strlen($descripcionServicio) > 65535){
            $mensaje = "<script>document.getElementById('e_descripcion_servicio').innerHTML='El m&aacute;ximo permitido son 65535 caracteres.';</script>";
        }
        else if ($fechaServicio == ''){
            $mensaje = "<script>document.getElementById('e_fecha_servicio').innerHTML='El campo Fecha es requerido.';</script>";
        }
        else if(!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fechaServicio)){
            $mensaje = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo fecha no cumple con el formato solicitado.';</script>";
        }
        else{ // Validaciones correctas.
            //Conectar a la base de datos y realizar la consulta para guardar el registro
            require_once ("serviceModel.php");
            require_once ("userModel.php");
            $usuarioModel = new UserModel();
            $serviceModel = new ServiceModel();
            $usuarioCompleto = $usuarioModel->view_db_user($_SESSION['idUsuario']);
            $serviceModel->insert_db_service($nombreServicio, $descripcionServicio, $fechaServicio, $usuarioCompleto['idUsuario']);
            $ultimoServicio = $serviceModel->view_db_last_service(); 
            $idServicio = $ultimoServicio['idServicio'];
            $ruta =  "../../images/servicios/".$ultimoServicio['nombreServicio']."/"; // ruta donde se almacenarán las imagenes del servicio
            if(mkdir($ruta, 0777)){ // creo el directorio para el servicio con permisos 0777
                $mensaje = get_success_insert_service($nombreServicio);
                $respuesta = array('mensaje' => $mensaje, 'estado' => 'success');
                echo json_encode($respuesta);
                die();
            }
        }
    }
    else if(isset($_FILES)){
        require_once ("imagenModel.php");
        require_once ("serviceModel.php");
        $imagenModel = new ImagenModel(); 
        $serviceModel = new ServiceModel();
        $ultimoServicio = $serviceModel->view_db_last_service(); 
        $idServicio = $ultimoServicio['idServicio'];
        $nombreServicio = $ultimoServicio['nombreServicio'];
        $ruta =  "../../images/servicios/".$ultimoServicio['nombreServicio']."/"; // ruta donde se almacenarán las imagenes del servicio
        if(is_dir($ruta)){
                $fileName = $_FILES["myfile"]["name"];
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"],$ruta.$fileName)){
                    $imagenModel->insert_images_service($ruta.$fileName, $fileName, $idServicio);
                    die();
                }
                else{
                    $mensaje = get_error_insert_image($fileName);
                    echo $mensaje;
                    die();
                }
        }
    }
$respuesta = array('mensaje' => $mensaje, 'estado' => 'fail');
echo json_encode($respuesta);
die();
?>