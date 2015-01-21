<?php 
	if(!isset($_POST['ajaxMail'], $_POST['asunto'], $_POST['nombre'], $_POST['email'], $_POST['ciudad'], $_POST['mensaje_usuario'])){
		header('location: inicio');
	}

	require_once ("notificaciones.php");

	$mensaje = get_error_send_email();
	$asuntoContacto = $_POST['asunto'];
	$nombreContacto = $_POST['nombre'];
	$emailContacto = $_POST['email'];
	$telefonoContacto = 'Ninguno';
	if(isset($_POST['telefono']) && $_POST['telefono'] != ''){
   		$telefonoContacto = $_POST['telefono'];
	}
    $ciudadContacto = $_POST['ciudad'];
    $mensajeContacto = $_POST['mensaje_usuario'];

    /*
	=====================================================================================================
    Validaciones
	=====================================================================================================
	*/
	if ($asuntoContacto == null || $asuntoContacto == '' ){
        $mensaje = "<script>document.getElementById('e_asunto').innerHTML='El campo asunto es requerido';</script>";
    }
    else if(!preg_match('/^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ,-_\s]+$/', $asuntoContacto)){
        $mensaje = "<script>document.getElementById('e_asunto').innerHTML='Error, caracteres inv&aacute;lidos';</script>";
    }
    else if(strlen($asuntoContacto) < 3){
        $mensaje = "<script>document.getElementById('e_asunto').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
    }
    else if(strlen($asuntoContacto) > 45){
        $mensaje = "<script>document.getElementById('e_asunto').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
    }
    else if ($nombreContacto == null || $nombreContacto == '' ){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo nombre es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombreContacto)){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if(strlen($nombreContacto) < 3){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&iacute;nimo permitido son 3 caracteres';</script>";
    }
    else if(strlen($nombreContacto) > 45){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El m&aacute;ximo permitido son 45 caracteres';</script>";
    }
    else if($emailContacto == null || $emailContacto == ''){
    	$mensaje = "<script>document.getElementById('e_email').innerHTML='Error, el campo email es requerido';</script>";
    }
    else if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $emailContacto)){
    	$mensaje = "<script>document.getElementById('e_email').innerHTML='Error, email inv&aacute;lido';</script>";
    }
    else if($ciudadContacto == null || $ciudadContacto == ''){
    	$mensaje = "<script>document.getElementById('e_ciudad').innerHTML='Error, el campo ciudad es requerido';</script>";
    }
    else if(!preg_match('/^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/', $ciudadContacto)){
    	$mensaje = "<script>document.getElementById('e_ciudad').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
    }
    else if($mensajeContacto == null || $mensajeContacto == ''){
    	$mensaje = "<script>document.getElementById('e_mensaje_usuario').innerHTML='Error, el campo mensaje es requerido';</script>";
    }
    else if($telefonoContacto != 'Ninguno'){
    	if(!preg_match('/^[0-9]+$/', $telefonoContacto)){
        	$mensaje = "<script>document.getElementById('e_telefono').innerHTML='Error, s&oacute;lo se permiten n&uacute;meros';</script>";
        }
        else{
        	$mensaje = enviarMail($asuntoContacto, $nombreContacto, $telefonoContacto, $ciudadContacto, $emailContacto, $mensajeContacto);
        }
    }
    else {
		$mensaje = enviarMail($asuntoContacto, $nombreContacto, $telefonoContacto, $ciudadContacto, $emailContacto, $mensajeContacto);
    }
    
echo $mensaje;

	function enviarMail($asuntoContacto, $nombreContacto, $telefonoContacto, $ciudadContacto, $emailContacto, $mensajeContacto){
		// evito ataques XSS
		$mensajeContacto = htmlentities($mensajeContacto, ENT_QUOTES, "UTF-8");
		// reemplazo saltos de línea por <br /> para que luego puedan ser reconocidos.
        $mensajeContacto = str_replace(array("\r\n", "\r", "\n"), "<br />", $mensajeContacto);
		/*
		=====================================================================================================
	    Destinatarios
		=====================================================================================================
		*/
	    $usuariosDestino= "ventas@ingnovarq.com.co".","."johanleon@ingnovarq.com.co";
		
	    /*
		=====================================================================================================
	    Titulo Email
		=====================================================================================================
		*/
	    $tituloEmail = "Contacto - Ingnovarq S.A.S";


		/*
		=====================================================================================================
	    Cuerpo mensaje
		=====================================================================================================
		*/
	    $contenidoEmail="
	     <html lang='es'>
			<head>
	                                
			</head>
			
			<body>
				<section style='width: 80%; margin: auto;'>
					<article >
						<header>
							<h2>Información del cliente</h2>
						</header>
						<section>
							<p>
								<table style='width: 80%; margin: auto;'>
									<tr>
										<td style='color: #555;'>Asunto: </td><td>".$asuntoContacto."</td>
									</tr>
									<tr>
										<td style='color: #555;'>Nombre: </td><td>".$nombreContacto."</td>
									</tr>
									<tr>
										<td style='color: #555;'>Telefono: </td><td>".$telefonoContacto."</td>
									</tr>
									<tr>
										<td style='color: #555;'>Ciudad: </td><td>".$ciudadContacto."</td>
									</tr>
									<tr>
										<td style='color: #555;'>Email: </td><td>".$emailContacto."</td>
									</tr>
									<tr>
										<td style='color: #555;'>Mensaje: </td><td>".$mensajeContacto."</td>
									</tr>
								</table>
							</p>
						</section>
						<footer>
							<h3>Ingnovarq S.A.S</h3>
						</footer>
					</article>
				</section>
			</body>
	    </html>
		";

	    /*
		=====================================================================================================
	    Fijar Parametros Encabezado
		=====================================================================================================
		*/
	    $encabezado  = "MIME-Version: 1.0" . "\r\n";
	    $encabezado.= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    
	    /*
		=====================================================================================================
	    Encabezado adicional
		=====================================================================================================
		*/
	    $encabezado .= "From: $nombreContacto <$emailContacto>" . "\r\n";

	    /*
		=====================================================================================================
	    Funcion para enviar el mail
		=====================================================================================================
		*/
	    $respuesta = mail($usuariosDestino, $tituloEmail, $contenidoEmail, $encabezado);
	    	
	    if ($respuesta){
	    	return $mensaje = get_success_send_email();
		}
	}
?>