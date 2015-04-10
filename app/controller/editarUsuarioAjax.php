<?php
    session_start();
    if(!isset($_POST["cedula"], $_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario']) || $_SESSION['superAdminUsuario'] == 0){
            header('location: error');
    }
    require_once ("notificaciones.php");
    require_once ("userModel.php");
    $mensaje = get_error_edit_user();

    if(sizeof($_POST) == 1){
        $cedulaUsuario = $_POST['cedula'];
        $userModel = new UserModel();
        $consulta = $userModel->view_db_user($cedulaUsuario);
        if($consulta != null){
            $idUsuario = $consulta['idUsuario'];
            $nombreUsuario = $consulta['nombreUsuario'];
            $apellidoUsuario = $consulta['apellidoUsuario'];
            $passwordUsuario = $consulta['passwordUsuario'];
            $superAdminUsuario = 1;
            if($consulta['superAdminUsuario'] == 0)
                $superAdminUsuario = 0;

            $mensaje = "<script> 
                            document.getElementById('myModalLabel').innerHTML='Editar usuario: ".$nombreUsuario."';
                            document.getElementById('nombre').value='".$nombreUsuario."';
                            document.getElementById('apellido').value='".$apellidoUsuario."';
                            document.getElementById('cedula').value='".$cedulaUsuario."';
                            document.getElementById('password').value='".$passwordUsuario."';
                            document.getElementById('repetir_password').value='".$passwordUsuario."';
                            document.getElementById('tipoUsuario').value='".$superAdminUsuario."';
                            document.getElementById('idUsuario').value='".$idUsuario."';
                        </script>";
        }
    }
    else if(sizeof($_POST) == 8 && isset($_POST['ajax'],$_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['password'], $_POST['repetir_password'], $_POST['idUsuario'])){
        
    $nombre = htmlspecialchars($_POST["nombre"]);
    $apellido = htmlspecialchars($_POST["apellido"]);
    $cedula = htmlspecialchars($_POST["cedula"]);
    $password = htmlspecialchars($_POST["password"]);
    $repetir_password = htmlspecialchars($_POST["repetir_password"]);
    
    if ($nombre == null || $nombre == '' ){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo nombre es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre)){
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
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido)){
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
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Obligatorio, solo letras y n&uacute;meros';</script>";
    }
    else if(strlen($password) < 6){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&iacute;nimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password) > 100){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El m&aacute;ximo permitido 100 caracteres';</script>";
    }
    else if ($repetir_password != $password){
        $mensaje = "<script>document.getElementById('e_repetir_password').innerHTML='Las contraseñas no coinciden';</script>";
    }
    else{
        //Conectar a la base de datos y realizar la consulta para guardar el registro
        $idUsuario = $_POST['idUsuario'];
        $tipoUsuario = $_POST['tipoUsuario'];

        // incluyo los archivos necesarios para generar las consultas y las notificaciones
        require_once ("userModel.php");
        require_once ("notificaciones.php");
        $userModel = new UserModel();
        // verifico si hay un usuario con la misma cedula en la bd
        $respuesta = $userModel->view_id_user_db_user($idUsuario);
        //Finalmente, si no existe un usuairo en la bd registrado, se ingresará, de lo contrario lanzará un error.
        if($respuesta != null ){
            if($password != $respuesta['passwordUsuario'] ){
                $salt = '$2a$07$CryptIngnovarqSASConstructora$';
                $password = crypt ($password, $salt);
            }
            
            $respuesta = $userModel->update_db_user($idUsuario, $cedula, $nombre, $apellido, $password, $tipoUsuario); // Inserto en la bd
            
            if($respuesta)
                $mensaje = get_success_edit_user($cedula); // envio el mensaje 
        }
    }
}
echo $mensaje;
?>