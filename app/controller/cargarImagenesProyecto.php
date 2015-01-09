<?php
    session_start();
    if(!isset($_POST["ajax"], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }

    $mensaje = null;

    $nombreProyecto = htmlspecialchars($_POST["nombreProyecto"]);
    $descripcionProyecto = htmlspecialchars($_POST["descripcionProyecto"]);
    $fechaProyecto=$_POST['fecha_proyecto'];
    $imagenProyecto = $_FILES['img_proyecto']['name'];
    $ruta =  "";
    
    if ($nombreProyecto == null ){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo nombre es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombreProyecto)){
        $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($nombreProyecto) < 3){
        $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
    }
    else if(strlen($nombreProyecto) > 45){
        $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
    }
    else if ($descripciónProyecto == null || $descripciónProyecto == '' ){
        $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo Descripción es requerido';</script>";
    }
    else if(strlen($descripciónProyecto) < 5){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&iacute;nimo permitido son 5 caracteres';</script>";
    }
    else if(strlen($descripciónProyecto) > 140){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&aacute;ximo permitido son 140 caracteres';</script>";
    }
    else if ($fechaProyecto == ''){
        $mensaje = "<script>document.getElementById('e_cedula').innerHTML='El campo Fecha es requerido';</script>";
    }
    else if($imagenProyecto == ""){
       $mensaje = "<script>document.getElementById('e_password').innerHTML='Debe seleccionar una imagen';</script>";
    }
    else{
        //Conectar a la base de datos y realizar la consulta para guardar el registro
        require_once "projectModel.php";
        require_once "imagenModel.php"

        $ProjecModel = new projectModel();
        // guardamos el archivo a la carpeta files
		$ruta =  "../../images/productos/".$imagenProyecto;
		if (move_uploaded_file($_FILES['imagenProducto']['tmp_name'], $ruta)) {
    		$projectModel->insert_db_project($nombreProyecto, $descripcionProyecto, $fechaProyecto, $_SESSION['idUsuario']);
    		$mensaje = "<script type='text/javascript'>
                PNotify.prototype.options.styling = 'bootstrap3';
                PNotify.prototype.options.styling = 'jqueryui';
                
                $(function(){
                    new PNotify({
                        title: 'Acción Exitosa',
                        text: 'Se ha agregado el Proyecto con éxito.',
                        type: 'success',
                        delay: 6000,
                        animation: 'show',
                        before_close: function() {
                            document.location='perfil';
                        }
                    });
                });
                </script>";
		}
				
        // verifico si hay un usuario con la misma cedula en la bd
       
        //Finalmente, si no existe un usuairo en la bd registrado, se ingresará, de lo contrario lanzará un error.
        
           
        
        else{
            $mensaje = "<script type='text/javascript'>
                        PNotify.prototype.options.styling = 'bootstrap3';
                        PNotify.prototype.options.styling = 'jqueryui';
                        
                        $(function(){
                            new PNotify({
                                title: 'Acción No Exitosa :(',
                                text: 'No se ha podido agregar el Producto con éxito, por favor revisa todos los datos e inténtelo de nuevo.',
                                type: 'error',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
                        
                        </script>";
        }
    }


echo $mensaje;

?>

