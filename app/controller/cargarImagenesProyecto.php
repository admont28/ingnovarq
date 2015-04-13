<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    if(sizeof($_POST) == 1 && isset($_POST['idProyecto'])){
        require_once ("projectModel.php");
        $projectModel = new ProjectModel();
        $idProyecto   = htmlspecialchars($_POST['idProyecto']);
        $proyecto     = $projectModel->view_db_project($idProyecto);
        $rutaProyecto = "../../images/proyectos/".$proyecto['nombreProyecto'];
        $ret          = array('rutaProyecto' => $rutaProyecto);
        echo str_replace('\\/', '/', json_encode($ret));
        die();
    }
    else if(sizeof($_POST) == 2 && isset($_POST['idProyecto'], $_POST['getUrls'])){
        require_once ("projectModel.php");
        $projectModel   = new ProjectModel();
        $idProyecto     = htmlspecialchars($_POST['idProyecto']);
        $proyectoActual = $projectModel->view_db_project($idProyecto);
        $rutas          = $projectModel->view_db_img_project($idProyecto);
        $tamañoNombre   = 24+strlen($proyectoActual['nombreProyecto']); // capturo el tamaño para extraer el nombre de la imagen solamente
        $ret            = array();
        foreach ($rutas as $fila) {
            $ret[] = substr($fila['rutaImagen'], $tamañoNombre); // extraigo el nombre de la imagen
        }
        echo json_encode($ret);
        die();
    }
    else if(isset($_FILES) && isset($_POST['idProyecto'], $_POST['cargar'])){
        require_once ("projectModel.php");
        require_once ("imagenModel.php");
        $projectModel = new ProjectModel();
        $idProyecto   = $_POST['idProyecto'];
        $consulta     = $projectModel->view_db_project($idProyecto); 
        if($consulta != null){
            $imagenModel = new ImagenModel(); 
            $ruta = "../../images/proyectos/".$consulta['nombreProyecto']."/";
            if(is_dir($ruta)){
                $fileName = $_FILES["myfile"]["name"];
                $fullPath = $ruta.$fileName;
                if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $fullPath)){
                    $respuesta = $imagenModel->insert_images_project($fullPath, $fileName, $idProyecto);
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
    }
?>