<?php 
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
            header('location: error');
    }
    require_once ("notificaciones.php");
    require_once ("sliderModel.php");
    $mensaje = get_error_insert_image_slider();
    if(sizeof($_POST) == 1 && isset($_POST['tituloImagen'], $_FILES['myfile'])){
        
        $directorioDeGuardado = "../../images/slide/";
        $nombreArchivo = $_FILES['myfile']['name'];
        $fullPath = $directorioDeGuardado.$nombreArchivo; // construyo la ruta completa donde se guardará el archivo.
        if (! file_exists($fullPath)){ //verifico que no exista la imagen anterior
            $sliderModel = new SliderModel();
            $tituloImagen = $_POST['tituloImagen'];
            $tituloImagen = htmlspecialchars($tituloImagen, ENT_NOQUOTES); //evito ataques XS
            move_uploaded_file($_FILES["myfile"]["tmp_name"], $fullPath); //muevo el archivo cargado
            //move_uploaded_file($imagen_p, $fullPath); //muevo el archivo cargado
                    // El archivo
                    $nombre_Archivo = "".$fullPath."";
                    // Obtener nuevas dimensiones
                    list($ancho, $alto) = getimagesize($nombre_Archivo);
                    $nuevo_ancho = 1550;
                    $nuevo_alto = 600;
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

            $resultado = $sliderModel->insert_db_image_slider($tituloImagen, $fullPath);
            if($resultado){
                $mensaje = get_success_insert_image_slider($nombreArchivo); // obtengo el mensaje de que todo ha salido bien.
            }
        }
    }
echo $mensaje; 
?>