<?php
	session_start();
	 
	// Desconfigura todos los valores de sesión.
	$_SESSION = array();
	 
	// Obtiene los parámetros de sesión.
	$params = session_get_cookie_params();
	 
	// Borra el cookie actual.
	setcookie(session_name(),
	        '', time() - 42000, 
	        $params["path"], 
	        $params["domain"], 
	        $params["secure"], 
	        $params["httponly"]);
	 
	// Destruye sesión. 
	session_destroy();
	// Redirige hacia el inicio del sitio web
	header('Location: ../view/inicio');

?>