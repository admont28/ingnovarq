<?php
    session_start();
    if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
           header('location: error');
            
    }       
        $nombreProyecto = htmlspecialchars($_POST["nombreProyecto"]);
        $descripcionProyecto = htmlspecialchars($_POST["descripcionProyecto"]);
        $fechaProyecto=$_POST['fechaProyecto'];
        
        
        
        if ($nombreProyecto == '' ){
            $mensaje = "<script>document.getElementById('e_nombre_proyecto').innerHTML='El campo nombre es requerido';</script>";
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
        else if ($descripcionProyecto == null || $descripcionProyecto == '' ){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El campo Descripción es requerido';</script>";
        }
        else if(strlen($descripcionProyecto) < 5){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&iacute;nimo permitido son 5 caracteres';</script>";
        }
        else if(strlen($descripcionProyecto) > 140){
            $mensaje = "<script>document.getElementById('e_descripcion_proyecto').innerHTML='El m&aacute;ximo permitido son 140 caracteres';</script>";
        }
        else if ($fechaProyecto == ''){
            $mensaje = "<script>document.getElementById('e_fecha_proyecto').innerHTML='El campo Fecha es requerido';</script>";
        }
        else if(!isset($_FILES)){
           $mensaje = "<script>document.getElementById('e_imagenes_proyecto').innerHTML='Debe seleccionar como minimo una imagen';</script>";
        }
        else{
            //Conectar a la base de datos y realizar la consulta para guardar el registro
            require_once ("projectModel.php");
            require_once ("imagenModel.php");
            require_once ("userModel.php");

            $usuarioModel = new UserModel();
            $projectModel = new ProjectModel();
            $imagenModel = new ImagenModel(); 
            $usuarioCompleto = $usuarioModel->view_db_user($_SESSION['idUsuario']);

            $projectModel->insert_db_project($nombreProyecto, $descripcionProyecto, $fechaProyecto, $usuarioCompleto['idUsuario']);
            $ultimoProyecto = $projectModel->view_db_last_project(); 
            $idProyecto = $ultimoProyecto['idProyecto'];
            $fileCount = count($_FILES["myfile"]["name"]);  
            
            $ruta =  "../../images/proyectos/";         

            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$ruta.$fileName)){
                    $imagenModel->insert_images_project($ruta.$fileName, $fileName, $idProyecto);
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
                    $ret[]= $fileName;
                }
                else{
                    $mensaje = "<script type='text/javascript'>
                                PNotify.prototype.options.styling = 'bootstrap3';
                                PNotify.prototype.options.styling = 'jqueryui';
                                
                                $(function(){
                                    new PNotify({
                                        title: 'Acción No Exitosa :(',
                                        text: 'No se ha podido agregar la imagen $fileName con éxito, por favor los requerimientos e inténtelo de nuevo.',
                                        type: 'error',
                                        delay: 6000,
                                        animation: 'show',
                                    });
                                });
                                
                                </script>";
                }  
            }
            else  //Multiple files, file[]
            {

              $fileCount = count($_FILES["myfile"]["name"]);
              for($i=0; $i < $fileCount; $i++)
              {
                 
                $fileName = $_FILES["myfile"]["name"][$i];
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$ruta.$fileName)){
                    $imagenModel->insert_images_project($ruta.$fileName, $fileName, $idProyecto);
                    $ret[]= $fileName;
                }
                else{
                $mensaje = "<script type='text/javascript'>
                            PNotify.prototype.options.styling = 'bootstrap3';
                            PNotify.prototype.options.styling = 'jqueryui';
                            
                            $(function(){
                                new PNotify({
                                    title: 'Acción No Exitosa :(',
                                    text: 'No se ha podido agregar la imagen $fileName con éxito, por favor revisa los requerimientos datos e inténtelo de nuevo.',
                                    type: 'error',
                                    delay: 6000,
                                    animation: 'show',
                                });
                            });
                            
                            </script>";
                }   
              }
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

        }
    
echo $mensaje;

?>

