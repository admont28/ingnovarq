<?php
    session_start();
    if(!isset($_POST["ajax"], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }

    $mensaje = null;
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $cedula = htmlspecialchars($_POST["cedula"]);
    $password = htmlspecialchars($_POST["password"]);
    $repetir_password = htmlspecialchars($_POST["repetir_password"]);
    
    if ($nombre == null || $nombre == '' ){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo nombre es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéíóúÁÉÍÓÚàèìòùäëïöüñ\s]+$/i', $nombre)){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($nombre) < 3){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
    }
    else if(strlen($nombre) > 45){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
    }
    else if ($apellido == null || $apellido == '' ){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El campo apellido es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéíóúÁÉÍÓÚàèìòùäëïöüñ\s]+$/i', $apellido)){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($apellido) < 3){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
    }
    else if(strlen($apellido) > 45){
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
    }
    else if ($cedula == ''){
        $mensaje = "<script>document.getElementById('e_cedula').innerHTML='El campo cedula es requerido';</script>";
    }
    else if(!preg_match('/^[0-9]+$/', $cedula)){
        $mensaje = "<script>document.getElementById('e_cedula').innerHTML='Error, s&oacute;lo se permiten n&uacute;meros';</script>";
    }
    else if(strlen($cedula) < 8){
        $mensaje = "<script>document.getElementById('e_cedula').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
    }
    else if(strlen($cedula) > 11){
        $mensaje = "<script>document.getElementById('e_cedula').innerHTML='El m&aacute;ximo permitido 11 caracteres';</script>";
    }
    else if ($password == ''){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
    }// el password ha de tener letras y números, o números y letras.
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $password)){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Obligatorio, letras y n&uacute;meros';</script>";
    }
    else if(strlen($password) < 6){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&iacute;nimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password) > 16){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&aacute;ximo permitido 16 caracteres';</script>";
    }
    else if ($repetir_password != $password){
        $mensaje = "<script>document.getElementById('e_repetir_password').innerHTML='Los password no coinciden';</script>";
    }
    else{
        //Conectar a la base de datos y realizar la consulta para guardar el registro
        $tipoUsuario = $_POST['tipoUsuario'];
        require_once ("userModel.php");
        require_once ("notificaciones.php");
        $userModel = new UserModel();
        // verifico si existe el usuario en la bd
        $respuesta = $userModel->view_db_user($cedula);
        //Finalmente, si no existe un usuairo en la bd registrado, se ingresará, de lo contrario lanzará un error.
        if($respuesta == null ){
            echo $cedula;
            $respuesta = $userModel->insert_db_user($cedula, $nombre, $apellido, $password, $tipoUsuario); // Inserto en la bd
            if($respuesta == true) 
                $mensaje = get_success_insert_user(); // envio el mensaje 
            else
                $mensaje = get_error_insert_user();
        }
        else{
            $mensaje = get_error_insert_user();
        }
    }
echo $mensaje;
?>