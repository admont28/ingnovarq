<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }      
    require_once ("notificaciones.php");
    $mensaje =  "";
    if (sizeof($_POST) == 3 && isset($_POST['nombreProyecto'], $_POST['descripcionProyecto'], $_POST['fechaProyecto'])) {
        $nombreProyecto = htmlspecialchars($_POST["nombreProyecto"]);
        $descripcionProyecto = htmlspecialchars($_POST["descripcionProyecto"]);
        $fechaProyecto=$_POST['fechaProyecto'];
         
        if ($nombreProyecto == '' ){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El campo nombre es requerido';</script>";
        }
        else if(!preg_match('/^[0-9a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombreProyecto)){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='Error, s&oacute;lo se permiten letras, n&uacute;meros y acentos latinos';</script>";
        }
        else if(strlen($nombreProyecto) < 3){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
        }
        else if(strlen($nombreProyecto) > 45){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
        }
        else if ($descripcionProyecto == null || $descripcionProyecto == '' ){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo Descripción es requerido';</script>";
        }
        else if(strlen($descripcionProyecto) < 5){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&iacute;nimo permitido son 5 caracteres';</script>";
        }
        else if(strlen($descripcionProyecto) > 65535){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&aacute;ximo permitido son 65535 caracteres';</script>";
        }
        else if ($fechaProyecto == ''){
            $mensaje = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo Fecha es requerido';</script>";
        }
        else{ // Validaciones correctas.
            //Conectar a la base de datos y realizar la consulta para guardar el registro
            require_once ("projectModel.php");
            require_once ("userModel.php");
            $usuarioModel = new UserModel();
            $projectModel = new ProjectModel();
            $usuarioCompleto = $usuarioModel->view_db_user($_SESSION['idUsuario']);
            $projectModel->insert_db_project($nombreProyecto, $descripcionProyecto, $fechaProyecto, $usuarioCompleto['idUsuario']);
            $ultimoProyecto = $projectModel->view_db_last_project(); 
            $idProyecto = $ultimoProyecto['idProyecto'];
            $ruta =  "../../images/proyectos/".$ultimoProyecto['nombreProyecto']."/"; // ruta donde se almacenarán las imagenes del proyecto
            if(mkdir($ruta, 0777)){ // creo el directorio para el proyecto con permisos 0777
                $mensaje = get_success_insert_project($nombreProyecto);
                $respuesta = array('mensaje' => $mensaje, 'estado' => 'success');
                echo json_encode($respuesta);
                die();
            }
        }
    }
    else if(isset($_FILES)){
        require_once ("imagenModel.php");
        require_once ("projectModel.php");
        $imagenModel = new ImagenModel(); 
        $projectModel = new ProjectModel();
        $ultimoProyecto = $projectModel->view_db_last_project(); 
        $idProyecto = $ultimoProyecto['idProyecto'];
        $ruta =  "../../images/proyectos/".$ultimoProyecto['nombreProyecto']."/"; // ruta donde se almacenarán las imagenes del proyecto
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
$respuesta = array('mensaje' => $mensaje, 'estado' => 'fail');
echo json_encode($respuesta);
die();
?>