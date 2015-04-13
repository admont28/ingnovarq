<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("notificaciones.php");
    $mensaje = get_error_insert_client();
    if(sizeof($_POST) == 1 && isset($_POST['nombreCliente'], $_FILES['myfile'])){
        $directorioDeGuardado = "../../images/clientes/";
        $nombreArchivo = $_FILES['myfile']['name'];
        $fullPath = $directorioDeGuardado.$nombreArchivo; // construyo la ruta completa donde se guardará el archivo.
        if (! file_exists($fullPath)){ //verifico que no exista la imagen anterior
            echo "No existe la imagen";
            require_once ("clientModel.php");
            require_once ("userModel.php");
            $clientModel = new ClientModel();
            $userModel = new UserModel();
            $usuario = $userModel->view_db_user($_SESSION['idUsuario']);
            print_r($usuario);
            $nombreCliente = htmlspecialchars($_POST['nombreCliente'], ENT_NOQUOTES); //evito ataques XSS
            $resultado = $clientModel->insert_db_client($nombreCliente, $usuario['idUsuario']);
            print_r($resultado);
            if($resultado){
                echo "Inserto en bd el cliente";
                $ultimoCliente = $clientModel->view_db_last_client();
                if($ultimoCliente != null){
                    echo "Ultimo cliente null";
                    require_once ("imagenModel.php");
                    $imagenModel = new ImagenModel();
                    $resultado = $imagenModel->insert_image_client($fullPath, $nombreCliente, $ultimoCliente['idCliente']);
                    if($resultado){
                        echo "inserto en bd la imagen";
                        move_uploaded_file($_FILES["myfile"]["tmp_name"], $fullPath); //muevo el archivo cargado
                             // El archivo
                            $nombre_Archivo = "".$fullPath."";
                            // Obtener nuevas dimensiones
                            list($ancho, $alto) = getimagesize($nombre_Archivo);
                            $nuevo_ancho = 180;
                            $nuevo_alto = 160;
                            // redimensionar
                            $imagen_p = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
                            // Tipo de contenido
                            if($_FILES['myfile']['type'] == 'image/jpeg'){
                                header('Content-Type: image/jpeg');
                                $imagen = imagecreatefromjpeg($nombre_Archivo);
                                imagecopyresampled($imagen_p, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                                ImageJPEG($imagen_p,$nombre_Archivo,90);
                            }
                            else if($_FILES['myfile']['type'] == 'image/png'){
                                header('Content-Type: image/png');
                                $imagen = imagecreatefrompng($nombre_Archivo);
                                imagecopyresampled($imagen_p, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);
                                Imagepng($imagen_p,$nombre_Archivo,0);
                            }
                        $mensaje = get_success_insert_client($nombreCliente); // obtengo el mensaje de que todo ha salido bien.
                        echo "se supone que moví la imagen";
                    }
                }
            }
        }
        else
            echo "Existe";
    }
echo $mensaje; 
?>