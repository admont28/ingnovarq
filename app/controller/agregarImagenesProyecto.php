<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            print_r($_SESSION);
    }
    if(sizeof($_POST) == 1 && isset($_POST['idProyecto'])){
        require_once ("projectModel.php");
        $projectModel = new ProjectModel();
        $idProyecto = htmlspecialchars($_POST['idProyecto']);
        $proyecto = $projectModel->view_db_project($idProyecto);
        $rutaProyecto = "../../images/proyectos/".$proyecto['nombreProyecto'];
        $files = scandir($rutaProyecto);
        $ret= array('rutaProyecto' => $rutaProyecto);

        echo str_replace('\\/', '/', json_encode($ret));
        die();
    }
    else if(sizeof($_POST) == 1 && isset($_POST['rutaProyecto'])){
        $dir=htmlspecialchars($_POST['rutaProyecto']);
        $files = scandir($dir);

        $ret= array();
        foreach($files as $file)
        {
            if($file == "." || $file == "..")
                continue;
            //$ruta = "../../images/servicios/Servicio/".$file;
            $ret[]=$file;
        }

        //echo str_replace('\\/', '/', json_encode($ret));
        echo json_encode($ret);
        die();
    }
    else if(isset($_FILES) && isset($_POST['idProyecto'], $_POST['cargar'])){
        require_once ("projectModel.php");
        require_once ("imagenModel.php");
        $projectModel = new ProjectModel();
        $idProyecto = $_POST['idProyecto'];        
        $consulta = $projectModel->view_db_project($idProyecto);
        if($consulta != null){
            $imagenModel = new ImagenModel(); 
            $ruta = "../../images/proyectos/".$consulta['nombreProyecto']."/";
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
    }


?>